<?php

namespace App\Controller;


use App\Repository\DemandeInterventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends AbstractController
{
    /**
     * @Route("/calendar", name="calendar")
     */
    public function index(DemandeInterventionRepository $repository)
    {
        $events = $repository->findAll();

        $demandes = [];

        foreach($events as $event){
            $demandes[] = [
                'id' => $event->getIdDemandeIntervention(),
                'start' => $event->getDateDebutIntervention()->format('Y-m-d H:i:s'),
                'end' => $event->getDateFinIntervention()->format('Y-m-d H:i:s'),
                'title' => $event->getInterventionDemandee(),
                'backgroundColor' => $event->getBackgroundColor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
                'allDay' => $event->getAllDay(),
            ];
        }

        $data = json_encode($demandes);

        return $this->render('calendar.html.twig', compact('data'));
    }
}
