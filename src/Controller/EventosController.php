<?php

namespace App\Controller;

use App\Repository\EventosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EventosController extends AbstractController
{
    #[Route('/eventos', name: 'app_eventos')]
    public function index(EventosRepository $eventosRepository): Response
    {
        $eventos = $eventosRepository->findAll();

        return $this->render('eventos/index.html.twig', [
            'eventos' => $eventos,
        ]);
    }
}
