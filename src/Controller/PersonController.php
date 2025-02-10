<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PersonRepository;

final class PersonController extends AbstractController
{
    #[Route('/person', name: 'app_person')]
    public function index(PersonRepository $personRepository): Response
    {
        $persons = $personRepository->findAll();

        return $this->render('person/index.html.twig', [
            'persons' => $persons,
        ]);
    }
}
