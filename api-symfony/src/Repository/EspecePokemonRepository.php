<?php

namespace App\Repository;

use App\Entity\EspecePokemon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EspecePokemon>
 *
 * @method EspecePokemon|null find($id, $lockMode = null, $lockVersion = null)
 * @method EspecePokemon|null findOneBy(array $criteria, array $orderBy = null)
 * @method EspecePokemon[]    findAll()
 * @method EspecePokemon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspecePokemonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EspecePokemon::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(EspecePokemon $entity, bool $flush = false): void
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
    public function remove(EspecePokemon $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getEspeceById($id){

        return $this->createQueryBuilder('e')
        ->andWhere('e.id = :id')
        ->setParameter('id', $id)
                   ->getQuery()
                    ->getResult()
                ;
    } 

    public function getAllEspece(){
        
        return $this->createQueryBuilder('e')
                   ->getQuery()
                    ->getResult();
    }

   /* public function getAllEspece(){

        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT * FROM espece_pokemon
            ";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    } */

//    /**
//     * @return EspecePokemon[] Returns an array of EspecePokemon objects
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

//    public function findOneBySomeField($value): ?EspecePokemon
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
