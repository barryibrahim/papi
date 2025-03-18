<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\TypeBatterieType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\TypeBatterie;
use Doctrine\ORM\EntityManagerInterface;

final class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
            
        ]);
    }
    #[Route('/batterie', name: 'app_batterie')]
    public function batterie(Request $request,EntityManagerInterface $em): Response
    {
        $batterie = new TypeBatterie();
        $form = $this->createForm(TypeBatterieType::class,$batterie);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em->persist($batterie);
                $em->flush();
                $this->addFlash('notice','Message envoyé');
                return $this->redirectToRoute('app_batterie');
                $capacite = (int) $request->request->get('capacite'); // Forcer l'entier

           
            }
            }
           
        return $this->render('base/batterie.html.twig', [
            
            'form' => $form->createView()
        ]);
    }
}
