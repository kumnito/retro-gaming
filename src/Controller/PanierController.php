<?php

namespace App\Controller;

use App\Repository\JeuxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierController extends AbstractController
{

    /**
     * @Route("/annonce/panier", name="panier")
     */
    public function voirPanier(SessionInterface $session, JeuxRepository $jeuRepos)
    {
        $titre = 'Mon Panier';
        $panier = $session->get('panier', []);
        $monPanier = [];

        foreach($panier as $id => $quantity)
        {
            $monPanier[] = [
                'jeu' => $jeuRepos->find($id),
                'quantity' => $quantity
            ];
        }

        $total = 0;
        foreach($monPanier as $item )
        {
            $totalItem = $item['jeu']->getPrix() * $item['quantity'];
            $total += $totalItem;
        }

        return $this->render('annonce/panier.html.twig', [
            'panier' => $monPanier,
            'titre' => $titre,
            'total' => $total
        ]);
    }


    /**
     * @Route("annonce/panier/add/{id}", name="ajouter_panier")
     */
    public function ajouterPanier($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        // if(!empty($panier[$id])) 
        // {
        //     $panier[$id]++;
        // } else 
        // {
        //     $panier[$id] = 1;
        // }

        $panier[$id] = 1;
        
        $session->set('panier', $panier);

        dump($session);

        return $this->redirectToRoute("panier");
    }
    
    /**
     * @Route("annonce/panier/sup/{id}", name="supprimer_panier")
     */
    public function supprimerPanier($id, SessionInterface $session)
    {
        $panier = $session->get('panier', []);

        if(!empty($panier[$id]))
        {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute("panier");
    }

    /**
     * @Route("/panier/commande", name="commande")
     */
    public function commander(SessionInterface $session, JeuxRepository $jeuRepos)
    {
        $titre = 'Ma Commande';
        $panier = $session->get('panier', []);
        $monPanier = [];

        foreach($panier as $id => $quantity)
        {
            $monPanier[] = [
                'jeu' => $jeuRepos->find($id),
                'quantity' => $quantity
            ];
        }

        $total = 0;
        $totalJeux = count($monPanier);
        foreach($monPanier as $item )
        {
            $totalItem = $item['jeu']->getPrix() * $item['quantity'];
            $total += $totalItem;
        }

        return $this->render('/panier/commande.html.twig', [
            'panier' => $monPanier,
            'titre' => $titre,
            'total' => $total,
            'totalJeux' => $totalJeux
        ]);
    }
}

  