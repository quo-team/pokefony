<?php

namespace App\Repository;

use App\Entity\EspecePokemon;
use App\Entity\Pokemon;
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

    public function getVenteByid($id){

        return $this->createQueryBuilder('v')
        ->andWhere('v.id = :id')
        ->setParameter('id', $id)
                   ->getQuery()
                    ->getResult()
                ;
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

    public function getAllVentePokemon($id_dresseur,$em){

        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT p.id as id_pokemon, ep.id as id_espece, vp.id as id_vente FROM vente_pokemon vp, pokemon p, espece_pokemon ep WHERE vp.pokemon_id NOT IN (SELECT id FROM pokemon WHERE
            dresseur_id = '$id_dresseur') AND vp.pokemon_id = p.id AND p.espece_id = ep.id;
            ";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        $tabPokemon = array();
        $repositoryPokemon =   $em->getRepository(Pokemon::class);
        $repositoryEspece =   $em->getRepository(EspecePokemon::class);
        foreach ($resultSet -> fetchAllAssociative() as $key) {
            $vente = $this -> getVenteByid($key["id_vente"])[0];
            $pokemon = $repositoryPokemon->getPokemonById($key["id_pokemon"])[0];
            $pokemon -> setEspece($repositoryEspece -> getEspeceById($pokemon -> getEspece() -> getId())[0]);
            $vente -> setPokemon($pokemon);
            array_push($tabPokemon,$vente);
        }
        return $tabPokemon; 
    }

    
    public function getNonVentePokemonDresseur($id_dresseur, $em){

   
        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT p.id as id_pokemon, es.id as id_espece FROM pokemon p, espece_pokemon es WHERE
            p.dresseur_id = '$id_dresseur' AND p.id NOT IN (SELECT pokemon_id FROM vente_pokemon) AND es.id = p.espece_id ;
            ";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        $tabPokemon = array();
        $repositoryPokemon =   $em->getRepository(Pokemon::class);
        $repositoryEspece =   $em->getRepository(EspecePokemon::class);
        foreach ($resultSet -> fetchAllAssociative() as $key) {
            $pokemon = $repositoryPokemon->getPokemonById($key["id_pokemon"])[0];
            $pokemon -> setEspece($repositoryEspece -> getEspeceById($pokemon -> getEspece() -> getId())[0]);
            array_push($tabPokemon,$pokemon);
        }

        // returns an array of arrays (i.e. a raw data set)
        return $tabPokemon; 
    }

    public function getVentePokemonDresseur($id_dresseur,$em){

        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT p.id as id_pokemon, es.id as id_espece, vp.id as id_vente FROM pokemon p, espece_pokemon es, vente_pokemon vp WHERE
            p.dresseur_id = '$id_dresseur' AND p.id IN (SELECT pokemon_id FROM vente_pokemon) AND es.id = p.espece_id AND p.id = vp.pokemon_id;
            ";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();

        $tabPokemon = array();
        $repositoryPokemon =   $em->getRepository(Pokemon::class);
        $repositoryEspece =   $em->getRepository(EspecePokemon::class);
        foreach ($resultSet -> fetchAllAssociative() as $key) {
            $vente = $this -> getVenteByid($key["id_vente"])[0];
            $pokemon = $repositoryPokemon->getPokemonById($key["id_pokemon"])[0];
            $pokemon -> setEspece($repositoryEspece -> getEspeceById($pokemon -> getEspece() -> getId())[0]);
            $vente -> setPokemon($pokemon);
            array_push($tabPokemon,$vente);
        }
        return $tabPokemon; 

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
