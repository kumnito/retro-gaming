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
         // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('security/connexion.html.twig', [
        'last_username' => $lastUsername,
        'error'         => $error,
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
    public function nouveauUser(Request $request) 
    {
        $user = new User
        $form = $this->
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // On peut aussi utiliser l'autowiring :
            // create(EntityManagerInterface $entityManager)
            $entityManager = $this->getDoctrine()->getManager();

            // On demande à Doctrine de mettre l'objet en attente
            $entityManager->persist($user);

            // Exécute la(es) requête(s) (INSERT...)
			$entityManager->flush();

            return $this->redirectToRoute('Administration');
        }

        return $this->render('admin/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}