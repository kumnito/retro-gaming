<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Jeux;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        $allJeux = $this->getDoctrine()->getRepository(Jeux::class)->test();

        $titre='Retro-Gaming';

        return $this->render('annonce/accueil.html.twig', [
            'allJeux' => $allJeux,
            'titre'=> $titre,
        ]);
    }

    /**
     * @Route("/conditions-générales", name="conditions")
     */
    public function lesCG()
    {
        $titre='conditions Generales';

        return $this->render('footer/conditions.html.twig', [
            'titre' => $titre,
        ]);
    }

    /**
     * @Route("/echanges-et-retours", name="echangesRetours")
     */
    public function echanges()
    {

        $titre='Echanges / Retour';

        return $this->render('footer/echangesRetours.html.twig', [
            'titre' => $titre,
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {

        $titre='contact';

        return $this->render('footer/contact.html.twig', [
            'titre' => $titre,
        ]);
    }
}

  