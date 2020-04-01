<?php

namespace App\DataFixtures;

use App\Entity\Console;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadConsoData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $super = new Console();
        $super->setNom('Super Nintendo');
        $manager->persist($super);

        $mega = new Console();
        $mega->setNom('Mega Drive');
        $manager->persist($mega);

        $manager->flush();

        $this->addReference('conSuper', $super);
        $this->addReference('conMega', $mega);
    }
    public function getOrder()
    {
        return 1;
    }

}