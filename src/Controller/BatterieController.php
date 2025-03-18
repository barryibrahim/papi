<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\TypeRepository;

final class BatterieController extends AbstractController
{
    #[Route('/liste-batteries', name: 'app_batteries')]
    public function listeBatteries(): Response
    {
        return $this->render('batterie/index.html.twig', [
            'controller_name' => 'BatterieController',
        ]);
    }
}
