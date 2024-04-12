<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request , EntityManagerInterface $manager , MailerInterface $mailer): Response
    {

        $contact = new Contact();
        

        if ($this->getUser()) {
            $user = $this->getUser();
            if ($user instanceof User) {
                $contact->setNom($user->getNom());
                
                $prenom = $user->getPrenom();
                if ($prenom === null) {
                    $prenom = '';
                }
                $contact->setPrenom($prenom);
                $contact->setEmail($user->getEmail());
            }
        }
        
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();

            $manager->persist($contact);

            $manager->flush();

            //Email
            $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('gestiontms8@gmail.com')
                ->subject($contact->getSujet())
                ->htmlTemplate('emails/contact.html.twig')

            
                // pass variables (name => value) to the template
                ->context([
                    'contact' => $contact
                    
                ]);

            $mailer->send($email);

            $this->addFlash(
                'success',
                'Votre demande a été envoyé avec succès !'
            );
            #return $this->redirectToRoute('');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
          
        ]);
    }
}