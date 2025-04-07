<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CarController extends AbstractController
{
    public function __construct(
        private readonly CarRepository $carRepository,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Ajoute une voiture à la base de données
     * @param Request $request
     * @return Response
     */
    #[Route('/car/add', name: 'app_add_car')]
    public function addCar(Request $request) : Response
    {
        $form = $this->createForm(CarType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $car = $form->getData();

            $this->entityManager->persist($car);
            $this->entityManager->flush();

            $this->addFlash('success', 'Voiture ajouté avec succès !');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('pages/car/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

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

    /**
     * Supprime une voiture de la base de données
     * @param int $id
     * @return Response
     */
    #[Route('/car/{id}/delete', name: 'app_delete_car')]
    public function deleteCar(int $id) : Response
    {
        $car = $this->carRepository->find($id);

        if (!$car) {
            throw $this->createNotFoundException('Impossible de trouver la voiture correspondante.');
        }

        $this->entityManager->remove($car);
        $this->entityManager->flush();

        $this->addFlash('success', 'Voiture supprimé avec succès.');
        return $this->redirectToRoute('app_home');
    }
}
