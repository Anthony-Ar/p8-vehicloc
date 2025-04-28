<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/car')]
final class CarController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Ajoute une voiture à la base de données
     * @param Request $request
     * @return Response
     */
    #[Route('/add', name: 'app_add_car')]
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
     * @param Car $id
     * @return Response
     */
    #[Route('/{id}', name: 'app_show_car')]
    public function showCar(Car $id) : Response
    {
        return $this->render('pages/car/show.html.twig', [
            'car' => $id,
        ]);
    }

    /**
     * Supprime une voiture de la base de données
     * @param Car $id
     * @return Response
     */
    #[Route('/{id}/delete', name: 'app_delete_car')]
    public function deleteCar(Car $id) : Response
    {
        $this->entityManager->remove($id);
        $this->entityManager->flush();

        $this->addFlash('success', 'Voiture supprimé avec succès.');
        return $this->redirectToRoute('app_home');
    }
}
