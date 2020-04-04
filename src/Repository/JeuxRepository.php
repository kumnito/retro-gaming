<?php

namespace App\Repository;

use App\Entity\Jeux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Jeux|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jeux|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jeux[]    findAll()
 * @method Jeux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JeuxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jeux::class);
    }

    public function findAllNintendo()
    {
        $queryBuilder = $this->createQueryBuilder('jeuNin')
            ->where('jeuNin.console_id = 1')
            ->orderBy('jeuNin.titre', 'ASC')
            ->getQuery();

        return $queryBuilder->getResult();
    }

    public function findAllMegaDrive()
    {
        $queryBuilder = $this->createQueryBuilder('jeuNin')
            ->where('jeuNin.console_id = 2')
            ->orderBy('jeuNin.titre', 'ASC')
            ->getQuery();

        return $queryBuilder->getResult();
    }

    public function test()
    {
        $queryBuilder = $this->createQueryBuilder('test')
            ->orderBy('test.compteur', 'desc')
            ->setMaxResults(4)
            ->getQuery();

        return $queryBuilder->getResult();
    }

    public function findAll()
    {
        $queryBuilder = $this->createQueryBuilder('allJeux')
            ->orderBy('allJeux.id', 'desc')
            ->innerJoin('allJeux.categorie', 'ca')
            ->innerJoin('allJeux.console_id', 'co')
            ->addSelect('ca', 'co')
            ->getQuery();

        return $queryBuilder->getResult();
    
    }
}
