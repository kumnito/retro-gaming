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

        return $this->render('accueil/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
