<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MovieController extends AbstractController
{
    #[Route('/movie', name: 'app_movie', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }

    // #[Route('/catalogue', name: 'app_movie_index', methods: ['GET'])]
    // public function showCatalogue(Request $request): Response
    // {
    //     $tag = $request->query->get('tag', 'general');
    //     return 
    // }

    #[Route('/catalogue/{id}', name: 'app_movie_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showMovie(int $id): Response
    {
        return new Response('Affichage du film : ' . $id);
    }

    #[Route('/api/catalogue', name: 'api_movie_list', methods: ['GET'])]
    public function APICatalogue(): Response
    {
        return $this->json(["Film1", "Film2", "Film3"]);
    }
}
