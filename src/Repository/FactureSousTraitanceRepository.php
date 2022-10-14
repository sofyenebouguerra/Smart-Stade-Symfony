<?php

namespace App\Repository;

use App\Entity\FactureSousTraitance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FactureSousTraitance|null find($id, $lockMode = null, $lockVersion = null)
 * @method FactureSousTraitance|null findOneBy(array $criteria, array $orderBy = null)
 * @method FactureSousTraitance[]    findAll()
 * @method FactureSousTraitance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactureSousTraitanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FactureSousTraitance::class);
    }

    public function listFactureByDemande($idDemandeIntervention)
    {
        return $this->createQueryBuilder('s')
            ->join('s.idDemandeIntervention', 'c')
            ->addSelect('c')
            ->where('c.idDemandeIntervention=:idDemandeIntervention')
            ->setParameter('idDemandeIntervention',$idDemandeIntervention)
            ->getQuery()
            ->getResult();
    }
    
    
}
