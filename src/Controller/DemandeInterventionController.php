<?php

namespace App\Controller;

use App\Entity\DemandeIntervention;
use App\Form\DemandeInterventionType;
use App\Repository\DemandeInterventionRepository;
use App\Repository\FactureSousTraitanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandeInterventionController extends AbstractController
{
    /**
     * @Route("/demande/intervention", name="demande_intervention")
     */
    public function index(): Response
    {
        return $this->render('demande_intervention/index.html.twig', [
            'controller_name' => 'DemandeInterventionController',
        ]);
    }
    /**
     * @Route("/addDemande", name="addDemande")
     */
    public function addDemande(Request $request)
    {
        $demande = new DemandeIntervention();
        $form = $this->createForm(DemandeInterventionType::class,$demande);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();
            return $this->redirectToRoute('listDemandeIntervention');
        }
        return $this->render("demande_intervention/add.html.twig",array('form'=>$form->createView()));
    }

    /**
     * @Route("/listDemandeIntervention", name="listDemandeIntervention")
     */
    public function listDemande()
    {
        $demande = $this->getDoctrine()->getRepository(DemandeIntervention::class)->findAll();
        return $this->render('demande_intervention/list.html.twig', array("demandes" => $demande));
    }
    /**
     * @Route("/listDemandeInterventione", name="listDemandeInterventione")
     */
    public function listDemandee()
    {
        $demande = $this->getDoctrine()->getRepository(DemandeIntervention::class)->findAll();
        return $this->render('demande_intervention/shown.html.twig', array("demandes" => $demande));
    }
    /**
     * @Route("/listDemandeInterventionee", name="listDemandeInterventionee")
     */
    public function listDemandeee()
    {
        $demande = $this->getDoctrine()->getRepository(DemandeIntervention::class)->findAll();
        return $this->render('demande_intervention/shownn.html.twig', array("demandes" => $demande));
    }
    /**
     * @Route("/listDemandeInterventioneee", name="listDemandeInterventioneee")
     */
    public function listDemandeeee()
    {
        $demande = $this->getDoctrine()->getRepository(DemandeIntervention::class)->findAll();
        return $this->render('demande_intervention/shownnn.html.twig', array("demandes" => $demande));
    }

    /**
     * @Route("/deleteDemande/{idDemandeIntervention}", name="deleteDemande")
     */
    public function deleteDemande($idDemandeIntervention)
    {
        $demande = $this->getDoctrine()->getRepository(DemandeIntervention::class)->find($idDemandeIntervention);
        $em = $this->getDoctrine()->getManager();
        $em->remove($demande);
        $em->flush();
        return $this->redirectToRoute("listDemandeIntervention");
    }
    /**
     * @Route("/updateDemande/{idDemandeIntervention}", name="updateDemande")
     */
    public function updateDemande(Request $request,$idDemandeIntervention)
    {
        $demande = $this->getDoctrine()->getRepository(DemandeIntervention::class)->find($idDemandeIntervention);
        $form = $this->createForm(DemandeInterventionType::class, $demande);
        $form->add('modifier',SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('listDemandeIntervention');
        }
        return $this->render("demande_intervention/update.html.twig",array('form'=>$form->createView()));
    }
    /**
     * @Route("rechercher", name="rechercher")
     */
    public function RechercheDemande(Request $request ,DemandeInterventionRepository $repository)
    {
        $data=$request->get('search');
        $demande = $repository->findBy(['idDemandeIntervention'=>$data]);
        return $this->render('demande_intervention/list.html.twig', array("demandes" => $demande));
    }
    /**
     * @Route("/orderByDegre", name="orderByDegre")
     */
    public function orderByDegre(DemandeInterventionRepository $repository)
    {

      $demande=$repository->orderByDegre();
        return $this->render('demande_intervention/list.html.twig', [
            "demandes"=>$demande,
        ]);
    }
    /**
     * @Route("/orderByType", name="orderByType")
     */
    public function orderByType(DemandeInterventionRepository $repository)
    {

        $demande=$repository->orderByType();
        return $this->render('demande_intervention/list.html.twig', [
            "demandes"=>$demande,
        ]);
    }

    /**
     * @param DemandeInterventionRepository $repoDem
     * @param FactureSousTraitanceRepository $repFac
     * @param $idDemandeIntervention
     * @return Response
     * @Route("/listFactureByDemande/{idDemandeIntervention}",name="listFactureByDemande")
     */
    public function listFactureByDemande(DemandeInterventionRepository $repoDem,FactureSousTraitanceRepository $repFac,$idDemandeIntervention)
    {

        $demande=$repoDem->find($idDemandeIntervention);
        $facture=$repFac->listFactureByDemande($demande->getIdDemandeIntervention());
        return $this->render('demande_intervention/show.html.twig', [
            "demandes"=>$demande,"factures"=>$facture]);
    }
    /**
     * @Route("rechercherdeg", name="rechercherdeg")
     */
    public function RechercheDemandeDeg(Request $request ,DemandeInterventionRepository $repository)
    {
        $degreUrgence=$request->get('search');
        $demande = $repository->RechercheDemandeDeg($degreUrgence );

        return $this->render('demande_intervention/list.html.twig', array("demandes" => $demande));
    }
    /**
     * @Route("rechercherInt", name="rechercherInt")
     */
    public function RechercheDemandeInt(Request $request ,DemandeInterventionRepository $repository)
    {
        $interventionDemandee=$request->get('search');
        $demande = $repository->RechercheDemandeInt($interventionDemandee );

        return $this->render('demande_intervention/shown.html.twig', array("demandes" => $demande));
    }
    /**
     * @Route("rechercherType", name="rechercherType")
     */
    public function RechercheDemandeType(Request $request ,DemandeInterventionRepository $repository)
    {
        $interventionDemandee=$request->get('search');
        $demande = $repository->RechercheDemandeType($interventionDemandee );

        return $this->render('demande_intervention/shown.html.twig', array("demandes" => $demande));
    }


    /**
     * @param DemandeInterventionRepository $repository
     * @return Response
     * @Route("rechercherdatedeb", name="rechercherdatedeb")
     */
    public function AfficherParDate(DemandeInterventionRepository $repository)
    {
        $demande = $repository->orderByDatedebut();
        return $this->render('demande_intervention/list.html.twig', ['demandes' => $demande]);
    }
    /**
     * @param DemandeInterventionRepository $repository
     * @return Response
     * @Route("rechercherdatefin", name="rechercherdatefin")
     */
    public function AfficherParDateFin(DemandeInterventionRepository $repository)
    {
        $demande = $repository->orderByDatefin();
        return $this->render('demande_intervention/list.html.twig', ['demandes' => $demande]);
    }
    /**
     * @param DemandeInterventionRepository $repository
     * @return Response
     * @Route("rechercherallday", name="rechercherallday")
     */
    public function findAllDayDemande(DemandeInterventionRepository $repository)
    {
        $demande = $repository->findAllDayDemande();
        return $this->render('demande_intervention/list.html.twig', ['demandes' => $demande]);
    }


}
