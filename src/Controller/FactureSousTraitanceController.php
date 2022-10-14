<?php

namespace App\Controller;


use App\Entity\FactureSousTraitance;
use App\Form\DemandeInterventionType;
use App\Form\FactureSousTraitanceType;
use App\Repository\FactureSousTraitanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactureSousTraitanceController extends AbstractController
{
    /**
     * @Route("/facture/sous/traitance", name="facture_sous_traitance")
     */
    public function index(): Response
    {
        return $this->render('facture_sous_traitance/index.html.twig', [
            'controller_name' => 'FactureSousTraitanceController',
        ]);
    }
    /**
     * @Route("/addFacture", name="addFacture")
     */
    public function addFacture(Request $request)
    {
        $facture = new FactureSousTraitance();
        $form = $this->createForm(FactureSousTraitanceType::class,$facture);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($facture);
            $em->flush();
            return $this->redirectToRoute('listFacture');
        }
        return $this->render("facture_sous_traitance/add.html.twig",array('form'=>$form->createView()));
    }

    /**
     * @Route("/listFacture", name="listFacture")
     */
    public function listFacture()
    {
        $facture = $this->getDoctrine()->getRepository(FactureSousTraitance::class)->findAll();
        return $this->render('facture_sous_traitance/list.html.twig', array("factures" => $facture));
    }
    /**
     * @Route("/deleteFacture/{codeFacture}", name="deleteFacture")
     */
    public function deleteFacture($codeFacture)
    {
        $facture = $this->getDoctrine()->getRepository(FactureSousTraitance::class)->find($codeFacture);
        $em = $this->getDoctrine()->getManager();
        $em->remove($facture);
        $em->flush();
        return $this->redirectToRoute("listFacture");
    }
    /**
     * @Route("/updateFacture/{codeFacture}", name="updateFacture")
     */
    public function updateFacture(Request $request,$codeFacture)
    {
        $facture = $this->getDoctrine()->getRepository(FactureSousTraitance::class)->find($codeFacture);
        $form = $this->createForm(FactureSousTraitanceType::class, $facture);
        $form->add('modifier',SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('listFacture');
        }
        return $this->render("facture_sous_traitance/update.html.twig",array('form'=>$form->createView()));
    }
    /**
     * @Route("/recherche", name="recherche")
     */
    public function RechercheFacture(Request $request ,FactureSousTraitanceRepository $repository)
    {
        $data=$request->get('search');
        $facture = $repository->findBy(['codeFacture'=>$data]);
        return $this->render('facture_sous_traitance/list.html.twig', array("factures" => $facture));
    }

}
