<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Pokemon;
use App\Entity\VentePokemon;
use App\Controller\TrainingController;
use DateTime;
use LogicException;

use function PHPUnit\Framework\isEmpty;

class DetailController extends AbstractController
{
    #[Route('/training/detail', name: 'app_detail')]
    public function index(EntityManagerInterface $em): Response
    {
   
        date_default_timezone_set('Europe/Paris');
        $current_date = date('Y-m-d H:i:s');
        $repositoryPokemon =   $em->getRepository(Pokemon::class);
        $repositoryVente =   $em->getRepository(VentePokemon::class);

        if(count($_POST) == 0){
            return $this->redirectToRoute('app_training');
        }
     
        $idPokemon = $_POST['id_du_pokemon'];
        $_SESSION["id_pokemon_detail"] = $idPokemon;
        $vente =  $repositoryVente -> getVenteByidPokemon($idPokemon);

        $ventePokemon = 1; 

        if(count($vente) == 0){
            $ventePokemon = 0;
        }
        $entrainement = isset($_REQUEST['entrainement'])? true : false;
        $lePokemon =  $repositoryPokemon->getPokemonById($idPokemon)[0];
        $xpPokemon = $lePokemon -> getXp(); 
        $type_courbe_niveau = $lePokemon -> getEspece() -> getTypeCourbeNiveau();
        $niveauPokemon = $lePokemon -> getNiveau(); 
        $entrainementPokemon =  $lePokemon -> getEntrainement();

        $ecart = $entrainementPokemon != null ? strtotime($current_date) - strtotime($entrainementPokemon ->format('Y-m-d H:i:s')) : 3601;

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

            $lePokemon -> setNiveau($niveauPokemon);
            $lePokemon -> setEntrainement(new DateTime($current_date));
            $lePokemon -> setXp($xpPokemon);

            $repositoryPokemon->add($lePokemon,true);
      
        }

        $entrainementPossible = true;
        $ecart = $lePokemon -> getEntrainement() != null ? strtotime($current_date) - strtotime($lePokemon -> getEntrainement() ->format('Y-m-d H:i:s')) : 3601;
        if($ecart < 3600){
            $entrainementPossible = false;
        }

        $entrainement = $lePokemon -> getEntrainement() != null ? $lePokemon -> getEntrainement() -> format('Y-m-d H:i:s') : "jamais" ;
        $dateChasse = $lePokemon -> getDateChasse() != null ? $lePokemon -> getDateChasse() -> format('Y-m-d H:i:s') : "jamais";
        $tempsRestant =  gmdate("H:i:s", 3600 - $ecart);

        return $this->render('training/detail.html.twig', [
            'lePokemon' => $lePokemon,
            'niveauPokemon' => $niveauPokemon,
            'entrainementPokemon' => $entrainement,
            'ventePokemon' => $ventePokemon,
            'entrainementPossible' => $entrainementPossible,
            'tempsRestant' => $tempsRestant,
            'dateChasse' => $dateChasse,
        ]);
    }
}
