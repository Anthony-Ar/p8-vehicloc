<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    /**
     * Affiche la page d'accueil de l'application
     * @param CarRepository $carRepository
     * @return Response
     */
    #[Route('/', name: 'app_home')]
    public function index(CarRepository $carRepository): Response
    {
        return $this->render('pages/home/index.html.twig', [
            'cars' => $carRepository->findAll(),
        ]);
    }
}
