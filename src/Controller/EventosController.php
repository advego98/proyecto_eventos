<?php

namespace App\Controller;

use App\Entity\Eventos;
use App\Form\EventosType;
use App\Repository\EventosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EventosController extends AbstractController
{

    /**
     * @param EventosRepository $eventosRepository
     * @return Response
     */
    #[Route('/eventos', name: 'app_eventos')]
    public function index(EventosRepository $eventosRepository): Response
    {
        $eventos = $eventosRepository->findAll();

        return $this->render('eventos/index.html.twig', [
            'eventos' => $eventos,
        ]);
    }


    /**
     * @param Eventos $eventos
     * @param EventosRepository $eventosRepository
     * @param Request $request
     * @return Response
     */
    #[Route('/eventos/nuevo', name: 'app_eventos_nuevo')]
    public function nuevoEvento(EventosRepository $eventosRepository, Request $request): Response
    {
        $eventos = new Eventos();

        $form = $this->createForm(EventosType::class, $eventos);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $eventosRepository->save($eventos);

            return $this->redirectToRoute('app_eventos');
        }

        return $this->render('eventos/form.html.twig', [
            'form' => $form->createView(),
            'titulo_form' => 'Crear Evento',
        ]);

    }

    #[Route('/eventos/{id}/editar', name: 'app_eventos_editar')]
    public function editarEvento(Eventos $eventos,EventosRepository $eventosRepository, Request $request): Response
    {

        $form = $this->createForm(EventosType::class, $eventos);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $eventosRepository->save($eventos);

            return $this->redirectToRoute('app_eventos');
        }

        return $this->render('eventos/form.html.twig', [
            'form' => $form->createView(),
            'titulo_form' => 'Editar Evento',
        ]);

    }
}
