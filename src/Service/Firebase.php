<?php

namespace App\Service;

use Morrislaptop\Firestore\Factory;
use Kreait\Firebase\ServiceAccount;

/**
 * Firebase service
 * @package App\Service
 */
class Firebase
{
  /**
   * @var object アカウント情報
   */
  private $serviceAccount;

  /**
   * Firebase constructor.
   */
  public function __construct()
  {
    $this->serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase-service-account.json');
  }

  /**
   * Firestoreを作成する
   *
   * @return mixed
   */
  public function createFirestore()
  {
    return (new Factory)->withServiceAccount($this->serviceAccount)->createFirestore();
  }
}