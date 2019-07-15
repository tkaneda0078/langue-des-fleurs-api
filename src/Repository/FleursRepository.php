<?php

namespace App\Repository;

use App\Service\Firebase;

class FleursRepository
{
  /**
   * @var mixed
   */
  private $firestore;

  /**
   * FleursRepository constructor.
   * @param Firebase $firebase
   */
  public function __construct(Firebase $firebase)
  {
    $this->firestore = $firebase->createFirestore();
  }

  /**
   * 全花の情報を取得する
   */
  public function getAllFleurs()
  {
    $fleursRef = $this->firestore->collection('fleurs');
    $documents = $fleursRef->documents();

    $fleurData = [];
    foreach ($documents as $document) {
      if ($document->exists()) {
        $fleurData[] = $document->data();
      }
    }

    return $fleurData;
  }
}