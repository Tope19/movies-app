<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MoviesController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    #[Route('/movies', name: 'app_movies', methods: ['GET'])]
    public function index(): Response
    {
        // $movies = $movieRepository->findAll();
        // dd($movies); 
        $repository = $this->em->getRepository(Movie::class);
        $movies = $repository->findAll();
        dd($movies);
        return $this->render("index.html.twig");
    }

    #[Route('/contact-us', name: 'contact-us', methods: ['GET'])]
    public function contactUs(): Response
    {
        $movies = ["Avengers: EndGame", "Inception", "Loki", "Black Widow"];
        return $this->render("contact-us.html.twig", array(
            'movies' => $movies,
        ));
    }
}
