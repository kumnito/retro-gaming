<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\UserAdminType;

class UserController extends AbstractController
{

    /**
     * @Route("/admin_user/suppression/{id}", name="admin_user_suppression")
     */
    public function supprimer(User $user)
    {
        // Je supprimer le produit de la BDD
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush(); // DELETE en SQL

        return $this->redirectToRoute('Administration_user');
    }
    
    /**
     * @Route("/admin_user/modification{id}", name="admin_user_modification")
     */
    public function modifier(Request $request, User $user)
    {
        $titre='Administration';
        $form = $this->createForm(UserAdminType::class , $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Administration_user');
        }

        return $this->render('admin/userEdit.html.twig', [
            'form' => $form->createView(),
            'titre'=> $titre,
        ]);
    }

    /**
     * @Route("/admin_user/creation", name="admin_user_creation")
     */
    public function creation(Request $request) 
    {
        $titre='Administration';
        $user = new User();
        $form = $this->createForm(UserAdminType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
			$entityManager->flush();

            return $this->redirectToRoute('Administration_user');
        }

        return $this->render('admin/userCreate.html.twig', [
            'form' => $form->createView(),
            'titre'=> $titre,
        ]);
    }

}
