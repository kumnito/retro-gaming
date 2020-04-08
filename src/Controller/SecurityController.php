<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Form\UserType;

class SecurityController extends AbstractController
{

     /**
     * @Route("/connexion", name="connexion")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils): Response
    {
        $titre = 'CONNEXION';
         // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('security/connexion.html.twig', [
        'last_username' => $lastUsername,
        'error'         => $error,
        'titre'         => $titre,
    ]);
    }

     /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout()
    {
        return $this->redirectToRoute('accueil');
    }

    /**
     * @Route("/security/inscription", name="inscription")
     */
}