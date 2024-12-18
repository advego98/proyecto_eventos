<?php

namespace App\Repository;

use App\Entity\Eventos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<Eventos>
 */
class EventosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Eventos::class);
    }


    // Metodo para guardar o actualizar eventos
    public function save(Eventos $eventos): void
    {

        $em = $this->getEntityManager();

        $em->persist($eventos);
        $em->flush();
    }

        public function isSalaOcupada($sala,$fecha,$hora_inicio,$hora_fin): ?Eventos
        {
            return $this->createQueryBuilder('e')
                ->andWhere('e.sala = :sala')
                ->andWhere('e.fecha = :fecha')
                ->andWhere(
                    $this->expr()->andX(
                        $this->expr()->lt('e.hora_inicio',':hora_inicio'),
                        $this->expr()->gt('e.hora_fin',':hora_fin')
                    )
                )
                ->setParameter('sala', $sala)
                ->getQuery()
                ->getOneOrNullResult()
            ;
        }


    //    /**
    //     * @return Eventos[] Returns an array of Eventos objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Eventos
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
