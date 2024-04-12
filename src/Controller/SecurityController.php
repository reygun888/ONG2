<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ResetPasswordType;
use App\Form\ResetMdpRequestType;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/connexion.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

        private $tokenGenerator;
        private $mailer;
        private $passwordHasher;

        public function __construct(TokenGeneratorInterface $tokenGenerator, MailerInterface $mailer, UserPasswordHasherInterface $passwordHasher)
        {
            $this->tokenGenerator = $tokenGenerator;
            $this->mailer = $mailer;
            $this->passwordHasher = $passwordHasher;
        }
        
        #[Route('/mdp_oublie', name:'mdp_oublie')]
    public function mdpOublie(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager, MailerInterface $mailer) : Response
    {
    $form = $this->createForm(ResetMdpRequestType::class);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $email = $form->get('email')->getData();
        $user = $userRepository->findOneByEmail($email);

        if($user){
            $token = $this->tokenGenerator->generateToken();

            if ($user) {
                $user->setResetPasswordToken($token);
                $entityManager->flush();
                $url = $this->generateUrl('mdp_reset', ['token'=>$token], UrlGeneratorInterface::ABSOLUTE_URL);
            }
                $context['url'] = $url;

                $email = (new TemplatedEmail())
                    ->from('gestiontms8@gmail.com')
                    ->to ($user->getEmail())
                    ->subject('Réinitialisation de mot de passe')
                    ->htmlTemplate('reset_password/email.html.twig')
                    ->context([
                        'url' => $url
                    ]);        
            $mailer->send($email);
            $this->addFlash('succes', 'Un Email vous a été envoyé');
            return $this->redirectToRoute('mdp_oublie');
        } else {
            //Si $user et $entreprise sont null
            $this->addFlash('danger', 'Un problème est survenu');
            return $this->redirectToRoute('mdp_oublie');
        }
    }

    return $this->render('security/reset_mdp_request.html.twig',[
        'requestMdpForm'=> $form->createView()
    ]);
}

    #[Route('/mdp_oublie/{token}', name:'mdp_reset')]
    public function mdpReset(Request $request, string $token, EntityManagerInterface $entityManager): Response
    {
        $user = $entityManager->getRepository(User::class)->findOneBy(['resetPasswordToken' => $token]);
        
        if (!$user) {
            $this->addFlash('error', 'Token invalide ou expiré.');
            return $this->redirectToRoute('mdp_oublie');
        }

        $form = $this->createForm(ResetPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $form->get('plainPassword')->getData();
    
            if ($user) {
                $hashedPassword = $this->passwordHasher->hashPassword($user, $password);
                $user->setPassword($hashedPassword);
                if ($user->getResetPasswordToken() !== null) {
                    $user->setResetPasswordToken('');
                }    
                $entityManager->flush();
            }

            $this->addFlash('success', 'Votre mot de passe a été réinitialisé avec succès.');
            return $this->redirectToRoute('app_login');
    }
    return $this->render('security/reset_mdp_confirm.html.twig', [
        'resetPassword' => $form->createView(),
    ]);
}
}