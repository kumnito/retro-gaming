<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Entity\Jeux;
use App\Entity\User;
use App\Form\AnnonceType;
use App\Form\FindByCatType;

class AnnonceController extends AbstractController
{

    

    /**
     * @Route("/liste_des_jeux_Super-Nintendo", name="listeAllNintendo")
     */
    public function listeAllNintendo(Request $request)
    {
        $titre='Super Nintendo';
        $allJeux = $this->getDoctrine()->getRepository(Jeux::class)->findAllNintendo();
        //$allCat = $this->getDoctrine()->getRepository(Categorie::class)->findAll();

        return $this->render('annonce/listeNintendo.html.twig', [
            'allJeux' => $allJeux,
            //'allCat' => $allCat,
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
            'titre' => $titre,
        ]);
    }

    /**
     * @Route("/Administration/user", name="Administration_user")
     */
    public function user()
    {
        $titre='Administration';
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('admin/userAdmin.html.twig', [
            'users' => $users,
            'titre' => $titre,
        ]);
    }


    /**
     * @Route("/annonce/jeu{id}", name="jeu_show")
     */
    public function show($id)
    {
        $titre='details';
        // On va chercher le produit en BDD
        $jeu = $this->getDoctrine()->getRepository(Jeux::class)->findOneBy(['id' => $id]);

        // Si le produit n'existe pas, 404
        if (!$jeu) {
            throw $this->createNotFoundException();
        }

        // Pour récupérer le vendeur
        // dump($jeu->getUser()->getUsername());

        // On affiche le produit
        return $this->render('annonce/jeu.html.twig', [
            'jeu' => $jeu,
            'titre'=> $titre,
        ]);
    }

}
