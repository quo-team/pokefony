<?php

namespace App\Controller;

use App\Entity\EspecePokemon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Pokemon;
use App\Entity\Localisation;
use App\Entity\TypeLocalisation;
use DateTime;

class CaptureController extends AbstractController
{
    #[Route('/capture', name: 'app_capture')]
    public function choixPokemon(EntityManagerInterface $em): Response
    {
          $id_user = $this->getUser("security.token_storage")->getId();
          date_default_timezone_set('Europe/Paris');
        $current_date = date('Y-m-d H:i:s');
  
        $pokemons = $em->getRepository(Pokemon::class)->getPokemonDresseur($id_user);
        $nbPokemons  = count($pokemons);

        $tableauGoChasse = array();

        foreach($pokemons as $key){
            $ecartEntrainement = $key -> getEntrainement() != null ? strtotime($current_date) - strtotime($key -> getEntrainement() ->format('Y-m-d H:i:s')) : 3601;
            $ecartChasse = $key -> getDateChasse() != null ? strtotime($current_date) - strtotime($key -> getDateChasse() ->format('Y-m-d H:i:s')) : 3601;

            if($ecartEntrainement > 3600 && $ecartChasse > 3600){
                $tableauGoChasse[$key -> getId()] = "submit";
            }else{
                $tableauGoChasse[$key -> getId()] = "";
            }
   
        }
        
        return $this->render('capture/choixPokemon.html.twig', [
            'controller_name' => 'CaptureController',
            'pokemons' => $pokemons,
            'nbPokemons' => $nbPokemons,
            'goChasse' => $tableauGoChasse,
        ]);
    }

    #[Route('/capture/choixLocalisation', name: 'choixLocalisation_capture')]
    public function choixLocalisation(EntityManagerInterface $em): Response
    {
        $localisations = $em->getRepository(Localisation::class)->getAllLocalisation();
 
        if(count($_POST) == 0){
            return $this -> redirectToRoute("app_capture");
        }

        return $this->render('capture/choixLocalisation.html.twig', [
            'controller_name' => 'CaptureController',
            'localisations' => $localisations,
            'id_pokemon' => $_POST["id_pokemon"],
        ]);
    }

    #[Route('/capture/resultat', name: 'resultat_capture')]
    public function resultatCapture(EntityManagerInterface $em): Response
    {
        

        $user = $this->getUser("security.token_storage");
        if(count($_POST) == 0){
            return $this -> redirectToRoute("app_capture");
        }

        date_default_timezone_set('Europe/Paris');
        $current_date = date('Y-m-d H:i:s');
        $pokemonChasse =   $em->getRepository(Pokemon::class)->getPokemonById($_POST['id_pokemon'])[0];
       
        $ecartChasse = $pokemonChasse -> getDateChasse() != null ? strtotime($current_date) - strtotime($pokemonChasse -> getDateChasse() ->format('Y-m-d H:i:s')) : 3601;

        if($ecartChasse < 3600){
          return  $this->redirectToRoute("app_capture");
        }

        $types = $em->getRepository(TypeLocalisation::class)->getTypeLocalisationByIdLocalisation($_POST["id_localisation"]);
        $tableau_type = array();
        foreach ($types as $key) {
            array_push($tableau_type,$key -> getType() -> getId());
        }
        $allEspece=  $em->getRepository(EspecePokemon::class)->getAllEspece();
        $tableauEspece = array();
        foreach ($allEspece as $key) {
            if(in_array($key -> getType1() -> getId(),$tableau_type) or in_array($key -> getType2() -> getId(),$tableau_type)){
                array_push($tableauEspece,$key);
            }
        }

        date_default_timezone_set('Europe/Paris');
        $current_date = date('Y-m-d H:i:s');
        $pokemonChasse =   $em->getRepository(Pokemon::class)->getPokemonById($_POST['id_pokemon'])[0];
        $pokemonChasse -> setDateChasse(new DateTime($current_date));
        $tableauSexe = ["mâle","femelle"];
        $especeChoisie = $tableauEspece[rand (5, count($tableauEspece) - 1)];
        $newPokemon = new Pokemon();
        $newPokemon -> setEspece($especeChoisie);
        $newPokemon -> setNom($especeChoisie -> getLibelle());
        $newPokemon -> setXp(0);
        $newPokemon -> setSexe($tableauSexe[rand(0,1)]);
        $newPokemon -> setDresseur($user);
        $newPokemon -> setNiveau(0);
        $em->getRepository(Pokemon::class)->add($newPokemon,true);

        $pokemonChasse -> setDateChasse(new DateTime($current_date));
        $em->getRepository(Pokemon::class)->add($pokemonChasse,true);
    
        return $this->render('capture/resultatCapture.html.twig', [
            'newPokemon' => $newPokemon,
        ]);
    }
}
