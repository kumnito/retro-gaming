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

    /**
     * @Route("/Administration", name="Administration")
     */
    public function Administration()
    {
        $allJeux = $this->getDoctrine()->getRepository(Jeux::class)->findAll();

        return $this->render('admin/admin.html.twig', [
            'allJeux' => $allJeux,
        ]);
    }

}
