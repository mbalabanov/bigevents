<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchFilterController extends AbstractController
{
    /**
    * @Route("/search", name="search_filter")
    */
    public function search_filter(Request $request, EventRepository $eventRepository): Response
    {
        $searchterm = dump($request->query->get('term'));

        return $this->render('publicview/index.html.twig', [
            'searchterm' => $searchterm,
            'events' => $eventRepository->findBy(['type' => $searchterm], ['name' => 'ASC']),
        ]);

    }
}
