<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'index')]
    public function index(): Response
    {
        return $this->render('etudiant/index.html.twig');
    }
    
    #[Route('/correction/base', name: 'correction_base')]
    public function accueillir(): Response
    {
       return $this->render('correction/base.html.twig');
      //  return $this->redirectToRoute('/personne');
    }

    #[Route('/correction/tableau', name: 'correction_list')]
    public function ajouter(EtudiantRepository $etudiantRepository): Response
    {
        $etudiant=$etudiantRepository->findAll();
       return $this->render('correction/list.html.twig',[
        'etudiant'=>$etudiant
    ]);
    }

    #[Route('/correction/formulaire', name: 'correction_form')]
    public function affichage(): Response
    {
        return $this->render('correction/formulaire.html.twig');
    }
    #[Route('/correction/ajouter', name: 'correction_app_add_etudiant')]
    public function add(Request $request, EntityManagerInterface $entityManager ,SluggerInterface $slugger):Response
    {
        // //on crée un nouveau etudiant
        // $etudiant = new Etudiant();
        // //on crée un formulaire
        // $etudiantform = $this->createForm(EtudiantType::class, $etudiant);
        // //on traite le formulaire
        // $etudiantform->handleRequest($request);
        // // on verifie le formulaire
        // if ($etudiantform->isSubmitted() && $etudiantform->isValid()){
        //     //   dump($etudiant);die;
        //     $entityManager->persist($etudiant);
        //     $entityManager->flush();
        //     $this->addFlash('Succès','etudiant ajouté avec succès');
        //     return $this->redirectToRoute('app_add_etudiant');
        // }

        //creons un nouveau etudiant
        $etudiant = new Etudiant();
        $etudiant->setNom($request->request->get('nom'));
        $etudiant->setPrenom($request->request->get('prenom'));
        $etudiant->setDateNaissance(new \DateTime($request->request->get('date_naissance')));
        $etudiant->setNiveauScolaire(($request->request->get('niveau_scolaire')));
        $etudiant->setModuleChoisir(($request->request->get('module_choisir')));
        $etudiant->setMotifInscription(($request->request->get('motif_inscription')));
        $etudiant->setDateCreated(new \DateTime() );
        $entityManager->persist($etudiant);
        $entityManager->flush();
        $this->addFlash('Succès','etudiant ajouté avec succès');
        $etudiant = $request->request->all();
        return $this->redirectToRoute('correction_form');
    }

    #[Route('/save', name: 'app_save_etudiant_')]
    public function saved(): Response
    {
         return $this->render('correction/list.html.twig');
    }

    // #[Route('/tableau', name: 'app_tableau')]
    // public function savetableau(): Response
    // {
    //      return $this->render('etudiant/index.html.twig');
    // }
}
