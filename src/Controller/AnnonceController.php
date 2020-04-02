<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Entity\Jeux;
use App\Form\AnnonceType;

class AnnonceController extends AbstractController
{

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Request $request, Jeux $jeu)
    {
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

            return $this->redirectToRoute('accueil');
        }

        return $this->render('annonce/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request) 
    {
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

            return $this->redirectToRoute('accueil');
        }

        return $this->render('annonce/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
