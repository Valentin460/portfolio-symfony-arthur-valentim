<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ReCaptcha\ReCaptcha;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET', 'POST'])]
    public function index(ProjectRepository $projectRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recaptcha = new ReCaptcha('6LeCRUkoAAAAAK1VsGFs-qVPSZFYJewZA6g1onOB');
            $resp = $recaptcha->verify($request->request->get('g-recaptcha-response'), $request->getClientIp());

            if ($resp->isSuccess()) {
                $entityManager->persist($contact);
                $entityManager->flush();

                $this->addFlash('success', 'Votre message a été envoyé avec succès.');
                return $this->redirectToRoute('index', ['_fragment' => 'contact']);
            } else {
                $this->addFlash('error', 'Le CAPTCHA n\'a pas été validé. Veuillez essayer à nouveau.');
                return $this->redirectToRoute('index', ['_fragment' => 'contact']);
            }
        }
        return $this->render('home/index.html.twig', [
            'projects' => $projectRepository->findAll(),
            'contact' => $contact,
            'form' => $form,
        ]);
    }
}
