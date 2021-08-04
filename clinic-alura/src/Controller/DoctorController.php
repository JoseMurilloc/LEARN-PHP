<?php

namespace App\Controller;

use App\Entity\Doctor;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DoctorController
{
  private $entityManager;
  public function __construct(EntityManager $entityManager) 
  {
    $this->entityManager = $entityManager;
  }

  /**
   * @Route("/doctors", methods=("POST"))
   */
  public function create(Request $request): Response 
  {
    $body = $request->getContent();

    $data_json = json_decode($body);

    $doctor = new Doctor();
    $doctor->name = $data_json->name;
    $doctor->crm = $data_json->crm;

    $this->entityManager->persist($doctor);
    $this->entityManager->flush();

    return new JsonResponse($body);
  }
}