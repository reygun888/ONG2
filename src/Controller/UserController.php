<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\UserEditType;
use App\Repository\NewzRepository;
use App\Repository\UserRepository;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/tab', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository, NewzRepository $newzRepository, ArticleRepository $articleRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
            'newzs' => $newzRepository->findAll(),
            'articles' => $articleRepository->findAll(),
        ]);
    }

    #[Route('/', name: 'app_recap_index', methods: ['GET'])]
    public function tabBord(UserRepository $userRepository): Response
    {
        return $this->render('user/tabBord.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

     #[Route('/search', name: 'app_search', methods: ['GET'])]
public function search(Request $request, UserRepository $userRepository, NewzRepository $newzRepository, ArticleRepository $articleRepository): Response
{
    $q = $request->query->get('q');
    $type = $request->query->get('type');
    $users = $userRepository->findBySearchQueryAndType($q, $type);
    $newzs = $newzRepository->findBySearchQuery($q);
    $articles = $articleRepository->findBySearchQuery($q);

// Passer les variables à la vue
return $this->render('user/index.html.twig', [
    'users' => $users,
    'newzs' => $newzs,
    'q' => $q,
    'type' => $type,
    'articles'=> $articles,
]);
}

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user, [
            'validation_groups' => function (FormInterface $form) {
                $data = $form->getData();
                if ($data->getType() === 'adherent') {
                    return ['Default', 'adherent'];
                } elseif ($data->getType() === 'entreprise') {
                    return ['Default', 'entreprise'];
                }
    
                return ['Default'];
            },
        ]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $pays = $user->getPays();
            try {
                $this->entityManager->beginTransaction();

                $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);
                if ($existingUser !== null) {
                    throw new \Exception('User with this email already exists');
                }

                // Hacher le mot de passe
                $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPassword());
                $user->setPassword($hashedPassword);

                $this->entityManager->persist($user);
                $this->entityManager->flush();
                $this->entityManager->commit();

                $this->addFlash('success', 'Utilisateur créé avec succès');

                return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
            } catch (\Exception $e) {
                $this->entityManager->rollback();
                $this->addFlash('error', $e->getMessage());
                dump('Exception: ', $e->getMessage());
            }
        }

        return $this->render('user/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

#[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
public function edit(Request $request, User $user, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
{
    $form = $this->createForm(UserEditType::class, $user);
    if ($user->getType() === 'adherent') {
        $form->remove('siren');
        $form->remove('formeJuridique');
    } elseif ($user->getType() === 'entreprise') {
        $form->remove('civilite');
        $form->remove('prenom');
    }

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $oldPassword = $form->get('oldPassword')->getData();
        $newPassword = $form->get('plainPassword')->getData();

        if (!empty($newPassword)) {
            if (!$passwordHasher->isPasswordValid($user, $oldPassword)) {
                $this->addFlash('error', 'L\'ancien mot de passe est incorrect.');
                return $this->redirectToRoute('app_user_edit', ['id' => $user->getId()]);
            }

            $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
            $user->setPassword($hashedPassword);
        }

        $entityManager->flush();

        $this->addFlash('success', 'Le profil a été mis à jour avec succès.');
        return $this->redirectToRoute('app_user_show', ['id' => $user->getId()]);
    }

    return $this->render('user/edit.html.twig', [
        'user' => $user,
        'form' => $form->createView(),
    ]);
}

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_adhesion', [], Response::HTTP_SEE_OTHER);
    }
}