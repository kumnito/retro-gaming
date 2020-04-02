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

        return $this->render('annonce/accueil.html.twig', [
            'allJeux' => $allJeux,
        ]);
    }

    /**
     * @Route("/liste_des_jeux_Super-Nintendo", name="listeAllNintendo")
     */
    public function listeAllNintendo()
    {
        $allJeux = $this->getDoctrine()->getRepository(Jeux::class)->findAllNintendo();

        return $this->render('annonce/listeNintendo.html.twig', [
            'allJeux' => $allJeux,
        ]);
    }

    /**
     * @Route("/liste_des_jeux_Mega-drive", name="listeAllMegaDrive")
     */
    public function listeAllMegaDrive()
    {
        $allJeux = $this->getDoctrine()->getRepository(Jeux::class)->findAllMegaDrive();

        return $this->render('annonce/listeMegaDrive.html.twig', [
            'allJeux' => $allJeux,
        ]);
    }
}
