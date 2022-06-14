<?php

namespace App\Repository;

use App\Entity\TypeLocalisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeLocalisation>
 *
 * @method TypeLocalisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeLocalisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeLocalisation[]    findAll()
 * @method TypeLocalisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeLocalisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeLocalisation::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(TypeLocalisation $entity, bool $flush = false): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(TypeLocalisation $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getTypeLocalisationByIdLocalisation($id_localisation){

        return $this->createQueryBuilder('t')
        ->andWhere('t.localisation = :id')
        ->setParameter('id', $id_localisation)
                   ->getQuery()
                    ->getResult()
                ;
    }

//    /**
//     * @return TypeLocalisation[] Returns an array of TypeLocalisation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeLocalisation
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
