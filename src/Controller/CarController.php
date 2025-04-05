<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CarController extends AbstractController
{
    public function __construct(private CarRepository $carRepository)
    {}

    /**
     * Affiche le détail d'une voiture
     * @param int $id
     * @return Response
     */
    #[Route('/car/{id}', name: 'app_show_car')]
    public function showCar(int $id) : Response
    {
        $car = $this->carRepository->find($id);

        if (!$car) {
            throw $this->createNotFoundException('Impossible de trouver la voiture correspondante.');
        }

        return $this->render('pages/car/show.html.twig', [
            'car' => $car,
        ]);
    }

}
