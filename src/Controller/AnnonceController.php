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
        $titre='Super Nintendo';
        $allJeux = $this->getDoctrine()->getRepository(Jeux::class)->findAllNintendo();

        return $this->render('annonce/listeNintendo.html.twig', [
            'allJeux' => $allJeux,
            'titre'=> $titre,
        ]);
    }

    /**
     * @Route("/liste_des_jeux_Mega-drive", name="listeAllMegaDrive")
     */
    public function listeAllMegaDrive()
    {
        $titre='Mega Drive';
        $allJeux = $this->getDoctrine()->getRepository(Jeux::class)->findAllMegaDrive();

        return $this->render('annonce/listeMegaDrive.html.twig', [
            'allJeux' => $allJeux,
            'titre'=> $titre,
        ]);
    }

    /**
     * @Route("/Administration", name="Administration")
     */
    public function Administration()
    {
        $titre='Administration';
        $allJeux = $this->getDoctrine()->getRepository(Jeux::class)->findAll();

        return $this->render('admin/admin.html.twig', [
            'allJeux' => $allJeux,
            'titre'=> $titre,
        ]);
    }

}
