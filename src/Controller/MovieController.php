<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MovieController extends AbstractController
{
    private $entityManager;
    private $security;

    public function __construct(EntityManagerInterface $entityManager, Security $security)
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    #[Route('/home', name: 'home')]
    public function index(): Response
    {
        // Check if the user is logged in
        if (!$this->security->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_login');
        }else{
            $movies = $this->entityManager->getRepository(Movie::class)->findAll();

            return $this->render('movie/index.html.twig', [
                'movies' => $movies,
            ]);
        }
        
    }

    #[Route('/add', name: 'add')]
    public function add(): Response
    {
        // Check if the user is logged in
        $moviesData = [
            [
                'name' => 'Aventures Galactiques',
                'description' => 'Une épopée spatiale où un groupe de rebelles lutte contre un empire tyrannique pour sauver la galaxie.',
            ],
            [
                'name' => 'Romance de Printemps',
                'description' => 'Une histoire d\'amour émouvante entre deux jeunes qui se rencontrent par hasard et découvrent leurs passions communes.',
            ],
            [
                'name' => 'Terreur en Mer',
                'description' => 'Un film d\'horreur où un groupe de vacanciers doit survivre à une créature marine terrifiante.',
            ],
            [
                'name' => 'L\'Héritage Perdu',
                'description' => 'Un aventurier part à la recherche d\'un trésor légendaire perdu depuis des siècles.',
            ],
            
        ];

        foreach ($moviesData as $movieData) {
            $movie = new Movie();
            $movie->setName($movieData['name']);
            // Assuming description needs to be set to one of the existing properties, or a new property should be created
            $movie->setPoster("movie.jpeg"); // Uncomment if you have a description field in your entity
            $this->entityManager->persist($movie);
        }

        $this->entityManager->flush();
        

       return new JsonResponse('done!');
    }


}
