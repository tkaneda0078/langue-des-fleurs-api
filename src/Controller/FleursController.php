<?php

namespace App\Controller;

use App\Repository\FleursRepository;
use Symfony\Component\Routing\Annotation\Route;

class FleursController extends ApiController
{
  /**
   * @Route("/fleurs", methods="GET")
   */
  public function index(FleursRepository $fleursRepository)
  {
    $fleurs = $fleursRepository->getAllFleurs();
    return $this->respond($fleurs);
  }
}
