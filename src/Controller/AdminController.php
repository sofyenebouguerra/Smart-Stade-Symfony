<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\EditUserType;
use App\Form\RegistrationFormType;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Repository\TournoiRepository;
use App\Repository\UsersRepository;
use App\Security\UsersAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use http\Client\Curl\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * Liste des utilisateurs du site
     *
     *  @Route("/ListeUtilisateurs",name="ListeUtilisateurs")
     */
    public function UsersList(UsersRepository $users){
        return $this->render('admin/Affiche.html.twig', [
            'users'=>$users->findAll()
        ]);
    }
    /**
     * Modifier un utilisateur
     * @IsGranted("ROLE_USER",message="No access! Get out!")
     *
     *  @Route("/utilisateur/Update{id}",name="update_user")
     */
    public function Update(Users $user,Request $request){
        $form=$this->createForm(EditUserType::class,$user);
        $form->add('Valider',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('message','Utilisateur est modifié avec succèes');
            return $this->redirectToRoute("ListeUtilisateurs");
        }
        return $this->render('admin/Update.html.twig',
            [
                'userForm'=>$form->createView()
            ]);

    }

    /**
     * Supprimer un utilisateur
     *  @Route("/utilisateur/Delet{id}",name="delet_user")
     */
    public function Delete($id,UsersRepository $repository){
        $user=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('ListeUtilisateurs');
    }

    /**
     * Ajouter un utilisateur
     *  @Route("/add_user",name="add_user")
     */
    public function Add(Request $request, UserPasswordEncoderInterface $userPasswordEncoder, GuardAuthenticatorHandler $guardHandler, UsersAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new Users();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'info',
                'Added succesfuly!'
            );


            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
            return $this->redirectToRoute('ListeUtilisateurs');
        }
        return $this->render('admin\Add.html.twig',
            [
                'userForm'=>$form->createView()
            ]);
    }
    /**
     * @Route("recherchermail", name="recherchermail")
     */
    public function RechercheEmail(Request $request ,UsersRepository $repository)
    {
        $email=$request->get('search');
        $users = $repository->RechercheEmail($email );

        return $this->render('admin/Affiche.html.twig', array("users" => $users));
    }
    /**
     * @Route("/orderByAge", name="orderByAge")
     */
    public function orderByAge(UsersRepository $repository)
    {

        $users=$repository->orderByAge();
        return $this->render('admin/Affiche.html.twig', [
            "users"=>$users,
        ]);
    }
    /**
     * @param UsersRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/listpdfU", name="listpdfU", methods={"GET"})
     */ public function listepdf(UsersRepository $repository): Response
{
    $pdfOptions = new Options();
    $pdfOptions->set('defaultFont', 'Arial');

    // Instantiate Dompdf with our options
    $dompdf = new Dompdf($pdfOptions);
    $users = $repository->findAll();

    // Retrieve the HTML generated in our twig file
    $html = $this->renderView('admin/pdfusers.html.twig', [
        'users' => $users,
    ]);

    // Load HTML to Dompdf
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser (inline view)
    $dompdf->stream("mypdf.pdf", [
        "Attachment" => true
    ]);
}

}
