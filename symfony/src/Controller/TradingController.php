<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Pokemon;
use App\Entity\VentePokemon;
use App\Entity\EspecePokemon;
use App\Entity\User;


class TradingController extends AbstractController
{
    #[Route('/trading', name: 'app_trading')]
    public function index(EntityManagerInterface $em): Response
    {  
        $user  = $this->getUser("security.token_storage");

        if(isset($_POST['id_vente_pokemon'])){
            $id_vente_pokemon = $_POST['id_vente_pokemon'];
            $getVente = $em->getRepository(VentePokemon::class)->getVenteByid($id_vente_pokemon);
            if(!empty($getVente)){
                $getVente = $getVente[0];
                $lePokemon = $em->getRepository(Pokemon::class)->getPokemonById($getVente -> getPokemon() -> getId())[0];
                $lePokemon -> setDresseur($this->getUser("security.token_storage"));
                if(($user -> getPieces()) - ($getVente -> getPrix()) >= 0){
                    $em->getRepository(VentePokemon::class)->remove($getVente,true); //remove de la vente
                    $em->getRepository(Pokemon::class)->add($lePokemon,true); //remove de la vente
                    $user -> setPieces(($user -> getPieces()) - ($getVente -> getPrix()));
                    $em->getRepository(User::class)->add($user,true); //remove de la vente
                }
            }
        }


        if(isset($_POST['valider_user'])){ //enregistrement des changement utilisateurs
      
            foreach ($_POST as $key => $value) {
                if(str_contains($key, "vendre_")){
                    $id_pokemon = str_replace("vendre_","",$key);
                    $prix = $_POST['prix_'.$id_pokemon];
                    $vente = new VentePokemon();
                    $lePokemon = $em->getRepository(Pokemon::class)->getPokemonById($id_pokemon)[0];
                    $vente -> setPokemon($lePokemon);
                    $vente -> setPrix($prix);
                    $em->getRepository(VentePokemon::class)->add($vente,true);
                }


                if(str_contains($key, "retirer_")){
                    $id_vente_pokemon = str_replace("retirer_","",$key);
                    $getVente = $em->getRepository(VentePokemon::class)->getVenteByid($id_vente_pokemon)[0];
                    $getVente -> setPokemon(null);
                     $em->getRepository(VentePokemon::class)->remove($getVente,true); //àcorriger
                }
            }
        }



        $pokemonsNonVente = $em->getRepository(VentePokemon::class)->getNonVentePokemonDresseur($user -> getId(),$em);
        $pokemonsVente = $em->getRepository(VentePokemon::class)->getVentePokemonDresseur($user -> getId(),$em);
        $pokemonsAllVente = $em->getRepository(VentePokemon::class)->getAllVentePokemon($user -> getId(),$em);
      
        return $this->render('trading/index.html.twig', [
            'controller_name' => 'TradingController',      
            'pokemonsNonVente' => $pokemonsNonVente, 
            'pokemonsVente' => $pokemonsVente, 
            'pokemonsAllVente' => $pokemonsAllVente,
 
        ]);
    }
}
