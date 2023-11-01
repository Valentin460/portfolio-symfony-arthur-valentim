<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class CustomLogoutController extends AbstractController
{
    /**
     * @Route("/custom_logout", name="custom_logout")
     */
    public function logout(AuthenticationUtils $authenticationUtils)
    {
        return $this->redirectToRoute('login');
    }
}