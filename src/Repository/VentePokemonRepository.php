<?php

namespace App\Repository;

use App\Entity\VentePokemon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VentePokemon>
 *
 * @method VentePokemon|null find($id, $lockMode = null, $lockVersion = null)
 * @method VentePokemon|null findOneBy(array $criteria, array $orderBy = null)
 * @method VentePokemon[]    findAll()
 * @method VentePokemon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VentePokemonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VentePokemon::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(VentePokemon $entity, bool $flush = false): void
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
    public function remove(VentePokemon $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getVenteByidPokemon($id){
        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT * FROM vente_pokemon WHERE pokemon_id='$id'
            ";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

//    /**
//     * @return VentePokemon[] Returns an array of VentePokemon objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VentePokemon
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
