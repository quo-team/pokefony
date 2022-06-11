<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Entity\User;
use App\Repository\PokemonRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class TrainingController extends AbstractController
{
    #[Route('/training', name: 'app_training')]
    public function index(EntityManagerInterface $em): Response
    {  
       
        $id_user = $this->getUser("security.token_storage")->getId();
  
        $pokemons = $em->getRepository(Pokemon::class)->getPokemonDresseur($id_user);
        $nbPokemons  = count($pokemons);
  
        return $this->render('training/listePokemon.html.twig', [
            'controller_name' => 'TrainingController',
            'pokemons' => $pokemons,
            'nbPokemons' => $nbPokemons,
        ]);
    }


}
