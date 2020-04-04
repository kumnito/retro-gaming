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
}
