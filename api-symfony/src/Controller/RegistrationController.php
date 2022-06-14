<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Entity\EspecePokemon;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\AppCustomAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppCustomAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $user->setPieces(5000);
              //get pokemon starter aléatoire
            $starter=  $entityManager->getRepository(EspecePokemon::class)->getStarter();
            $lestarter =  $starter[rand (0, count($starter) - 1)];
            $tableauSexe = ["mâle","femelle"];
            $newPokemon = new Pokemon();
            $newPokemon -> setEspece($lestarter);
            $newPokemon -> setNom($lestarter -> getLibelle());
            $newPokemon -> setXp(0);
            $newPokemon -> setSexe($tableauSexe[rand(0,1)]);
            $newPokemon -> setDresseur($user);
            $newPokemon -> setNiveau(1);
            
            $entityManager->persist($user);

            $entityManager->flush();
            $entityManager->getRepository(Pokemon::class)->add($newPokemon,true);
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
