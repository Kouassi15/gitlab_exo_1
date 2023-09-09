<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    #[Route('/personne', name: 'app_personnes')]
    public function index(): Response
    {
       return $this->render('correction/formulaire.html.twig');
    }

    #[Route('/tableau', name: 'app_personne')]
    public function ajouter(): Response
    {
       return $this->render('tableau.html.twig');
    }

    #[Route('/base', name: 'app_personn')]
    public function accueillir(): Response
    {
       return $this->render('correction/base.html.twig');
      //  return $this->redirectToRoute('/personne');
    }

    #[Route('/save', name: "app_save_formulaire", methods:['POST'])]
    public function saveformulaire(Request $request)
     {
      //  dd('ok');
      $request = Request::createFromGlobals();
      // dd($request->request->get('nom'));
      // dd($request->request->all());
      $data = $request->request->all();
   //    return $this->render('correction/list.html.twig', [
   //        'data' => $data
   //   ]);

      return $this->redirectToRoute('app_personne',['data'=>$data]);
   }
   
}
