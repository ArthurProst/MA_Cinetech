<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

final class MovieController extends AbstractController
{
    private const MOVIES = [
        [
            'id' => 1,
            'title' => 'Inception',
            'category' => 'Science-fiction',
            'releaseYear' => 2010,
            'synopsis' => 'Un voleur capable de s\'introduire dans les rêves doit implanter une idée dans l\'esprit d\'un héritier.',
            'rating' => 8.8,
        ],
        [
            'id' => 2,
            'title' => 'Le Parrain',
            'category' => 'Drame',
            'releaseYear' => 1972,
            'synopsis' => 'Le patriarche d\'une famille mafieuse new-yorkaise transmet son empire à son fils réticent.',
            'rating' => 9.2,
        ],
        [
            'id' => 3,
            'title' => 'Le Voyage de Chihiro',
            'category' => 'Animation',
            'releaseYear' => 2001,
            'synopsis' => 'Une fillette se retrouve piégée dans un monde d\'esprits et doit travailler dans des bains publics pour sauver ses parents.',
            'rating' => 8.6,
        ],
        [
            'id' => 4,
            'title' => 'Parasite',
            'category' => 'Thriller',
            'releaseYear' => 2019,
            'synopsis' => 'Une famille pauvre s\'infiltre peu à peu dans la vie d\'une riche famille, avec des conséquences imprévues.',
            'rating' => 8.5,
        ],
        [
            'id' => 5,
            'title' => 'Mad Max: Fury Road',
            'category' => 'Action',
            'releaseYear' => 2015,
            'synopsis' => 'Dans un désert post-apocalyptique, Furiosa tente de fuir un tyran avec des captives, poursuivie par ses hordes.',
            'rating' => 8.1,
        ],
    ];


    #[Route('/movie', name: 'app_movie', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('movie/index.html.twig', [
            'arrayMovies' => self::MOVIES,
        ]);
    }

    #[Route('/catalogue', name: 'app_movie_index', methods: ['GET'])]
    public function showCatalogue(Request $request): Response
    {
        $tag = $request->query->get('search', 'general');
        return $this->render('movie/index.html.twig', ['tag' => $tag]);
    }

    #[Route('/catalogue/{id}', name: 'app_movie_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showMovieDetail(int $id): Response
    {
        return new Response('Affichage du film : ' . $id);
    }

    #[Route('/api/catalogue', name: 'api_movie_list', methods: ['GET'])]
    public function APICatalogueShow(): Response
    {
        return $this->json(["Film1", "Film2", "Film3"]);
    }
}
