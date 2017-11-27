<?php

header('Content-type: application/json; charset=utf-8');
$data = $pages->find('portfolio')->children()->visible()->flip()->paginate(10);
$json = array();

function getImageName($image) {
  return $image->url();
};



foreach($data as $article) {

  $files = [];
  foreach($article->files() as $file) {
    array_push($files, $file->filename());
  }

  $json[] = array(
    'id'    => $article->slug(),
    'url'   => $article->url(),
    'title' => (string)$article->title(),
    'date'  => (string)$article->date(),
    'thumb'  => (string)$article->thumb(),
    'files'  => $files,
    'cat'  => (string)$article->cat(),
    'lead'  => (string)$article->lead(),
    'text'  => (string)$article->text(),
    'techs'  => (string)$article->techs(),
  );

}

echo json_encode($json);

?>
