<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadCatedata extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $aventure = new Categorie();
        $aventure->setNom('Aventure');
        $manager->persist($aventure);

        $flipper = new Categorie();
        $flipper->setNom('Flipper');
        $manager->persist($flipper);

        $plateForme = new Categorie();
        $plateForme->setNom('Plate-forme');
        $manager->persist($plateForme);

        $action = new Categorie();
        $action->setNom('Action');
        $manager->persist($action);

        $sport = new Categorie();
        $sport->setNom('Sport');
        $manager->persist($sport);

        $reflexion = new Categorie();
        $reflexion->setNom('Réflexion');
        $manager->persist($reflexion);

        $tir = new Categorie();
        $tir->setNom('Tir');
        $manager->persist($tir);

        $combat = new Categorie();
        $combat->setNom('Combat');
        $manager->persist($combat);

        $fantastic = new Categorie();
        $fantastic->setNom('Fantastique');
        $manager->persist($fantastic);

        $manager->flush();

        $this->addReference('catAventure', $aventure);
        $this->addReference('catFlipper', $flipper);
        $this->addReference('catPlateForme', $plateForme);
        $this->addReference('catAction', $action);
        $this->addReference('catSport', $sport);
        $this->addReference('catReflexion', $reflexion);
        $this->addReference('catTir', $tir);
        $this->addReference('catCombat', $combat);
        $this->addReference('catFanta', $fantastic);
    }

    public function getOrder()
    {
        return 2;
    }

}