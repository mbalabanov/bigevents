<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicviewController extends AbstractController
{
    /**
     * @Route("/", name="publicview", methods={"GET"})
     */
    public function index(EventRepository $eventRepository): Response
    {
        $searchterm = '';
        return $this->render('publicview/index.html.twig', [
            'searchterm' => $searchterm,
            'events' => $eventRepository->findBy([], ['name' => 'ASC']),
        ]);
    }

    /**
    * @Route("/{id}/show", name="event_show", methods={"GET"})
    */
    public function show(Event $event): Response
    {
        return $this->render('publicview/show.html.twig', [
            'event' => $event,
        ]);
    }
}
