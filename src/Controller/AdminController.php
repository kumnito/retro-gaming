<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Entity\Jeux;
use App\Form\AnnonceType;

class AdminController extends AbstractController
{

    /**
     * @Route("/admin/suppression/{id}", name="admin_suppression")
     */
    public function supprimer(Jeux $jeu)
    {
        // Je supprimer le produit de la BDD
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($jeu);
        $entityManager->flush(); // DELETE en SQL

        return $this->redirectToRoute('Administration');
    }
    
    /**
     * @Route("/admin/modification{id}", name="admin_modification")
     */
    public function modifier(Request $request, Jeux $jeu)
    {
        $titre='Administration';
        $form = $this->createForm(AnnonceType::class, $jeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $photo = $form->get('photo')->getData();

            if ($photo) {
                // création d'un nom de fichier sécurisé
                $randomBytes = random_bytes(128/8);
                $safeFilename = bin2hex($randomBytes);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$photo->guessExtension();

                try {
                    $photo->move(
                        $this->getParameter('dossierPhotos'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... il y a eu une erreur !!!
                }
                $jeu->setPhoto($newFilename);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Administration');
        }

        return $this->render('admin/edit.html.twig', [
            'form' => $form->createView(),
            'titre'=> $titre,
        ]);
    }

    /**
     * @Route("/admin/creation", name="admin_creation")
     */
    public function creation(Request $request) 
    {
        $titre='Administration';
        $jeu = new Jeux();
        $form = $this->createForm(AnnonceType::class, $jeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $photo = $form->get('photo')->getData();

            if ($photo) {
                // création d'un nom de fichier sécurisé
                $randomBytes = random_bytes(128/8);
                $safeFilename = bin2hex($randomBytes);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$photo->guessExtension();

                try {
                    $photo->move(
                        $this->getParameter('dossierPhotos'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... il y a eu une erreur !!!
                }
                $jeu->setPhoto($newFilename);
            }

            // On peut aussi utiliser l'autowiring :
            // create(EntityManagerInterface $entityManager)
            $entityManager = $this->getDoctrine()->getManager();

            // On demande à Doctrine de mettre l'objet en attente
            $entityManager->persist($jeu);

            // Exécute la(es) requête(s) (INSERT...)
			$entityManager->flush();

            return $this->redirectToRoute('Administration');
        }

        return $this->render('admin/create.html.twig', [
            'form' => $form->createView(),
            'titre'=> $titre,
        ]);
    }

}
