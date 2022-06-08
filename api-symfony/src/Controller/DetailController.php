<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Pokemon;
use App\Entity\EspecePokemon;
use App\Entity\VentePokemon;

class DetailController extends AbstractController
{
    #[Route('/training/detail', name: 'app_detail')]
    public function index(EntityManagerInterface $em): Response
    {
        date_default_timezone_set('Europe/Paris');
        $current_date = date('Y-m-d H:i:s');
        $repositoryPokemon =   $em->getRepository(Pokemon::class);
        $repositoryEspece =   $em->getRepository(EspecePokemon::class);
        $repositoryVente =   $em->getRepository(VentePokemon::class);
      
        
        $idPokemon = $_REQUEST['id_pokemon'];
        $vente =  $repositoryVente -> getVenteByidPokemon($idPokemon);

        $ventePokemon = 1; 

        if(count($vente) == 0){
            $ventePokemon = 0;
        }
        $entrainement = isset($_REQUEST['entrainement'])? true : false;
        $lePokemon =  $repositoryPokemon->getPokemonById($idPokemon);
        $espece = $repositoryEspece -> getEspeceById($lePokemon["espece_id"]);
        $xpPokemon = $lePokemon["xp"]; 
        $type_courbe_niveau = $espece["type_courbe_niveau"];
        $niveauPokemon = $lePokemon["niveau"]; 
        
        $entrainementPokemon =  $lePokemon["entrainement"];

        $ecart = strtotime($current_date) - strtotime($entrainementPokemon);

        if($entrainement && $ecart > 3600 && $ventePokemon == 0){
            //update de la date d'entrainement
            $xpGain = rand(10, 30);
            $xpPokemon += $xpGain;

            switch($type_courbe_niveau){
                case "R":
                    while($xpPokemon > 0.8  * ($niveauPokemon*$niveauPokemon*$niveauPokemon)){
                        $niveauPokemon++;
                    }
                    break;
                case "M":

                    while($xpPokemon > ($niveauPokemon*$niveauPokemon*$niveauPokemon)){
                        $niveauPokemon++;
                    }

                    break;
                case "P":

                    while($xpPokemon > 1.2 * ($niveauPokemon*$niveauPokemon*$niveauPokemon) - 15 * ($niveauPokemon*$niveauPokemon) + 100 * $niveauPokemon - 140){
  
                        $niveauPokemon++;
                    }

                    break;
                case "L":

                    while($xpPokemon > 1.25  * ($niveauPokemon*$niveauPokemon*$niveauPokemon)){
                        $niveauPokemon++;
                    }

                    break;
            }

            $repositoryPokemon->updatePokemonEntrainement($idPokemon,$current_date,$niveauPokemon,$xpPokemon);
            $entrainementPokemon = $current_date;
        }


        
        $nomPokemon = $lePokemon["nom"]; 
        $chassePokemon = $lePokemon["date_chasse"]; 
        $sexePokemon = $lePokemon["sexe"]; 

        $entrainementPossible = true;

        if($ecart < 3600){
            $entrainementPossible = false;
        }

        return $this->render('detail/index.html.twig', [
            'idPokemon' => $idPokemon,
            'nomPokemon' => $nomPokemon,
            'xpPokemon' => $xpPokemon,
            'niveauPokemon' => $niveauPokemon,
            'entrainementPokemon' => $entrainementPokemon,
            'chassePokemon' => $chassePokemon,
            'ventePokemon' => $ventePokemon,
            'sexePokemon' => $sexePokemon,
            'entrainementPossible' => $entrainementPossible,
        ]);
    }
}
