<?php

namespace App\Controller;

use App\Repository\FleursRepository;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class FleursController
 * @Route("/api", name="api_")
 */
class FleursController extends ApiController
{
  /**
   * @Rest\Get("/fleurs")
   * @return Response
   */
  public function index(FleursRepository $fleursRepository)
  {
    $fleurs = $fleursRepository->getAllFleurs();
    return $this->respond($fleurs);
  }
}
