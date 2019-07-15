<?php

namespace App\Repository;

use App\Service\Firebase; // TODO: 親リポジトリに書く

class FleursRepository
{
  /**
   * @var Firebase
   * TODO: 親リポジトリに書く
   */
  private $firebase;

  /**
   * @var mixed
   * TODO: 親リポジトリに書く
   */
  private $firestore;

  /**
   * FleursRepository constructor.
   * @param Firebase $firebase
   * TODO: 親リポジトリに書く
   */
  public function __construct(Firebase $firebase)
  {
    $this->firebase = $firebase;
    $this->firestore = $this->firebase->createFirestore();
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