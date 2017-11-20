<?php

header('Content-type: application/json; charset=utf-8');
$data = $pages->find('portfolio')->children()->visible()->flip()->paginate(10);
$json = array();

foreach($data as $article) {

  $json[] = array(
    'url'   => $article->url(),
    'title' => (string)$article->title(),
    'date'  => (string)$article->date(),
    'thumb'  => (string)$article->coverimage(),
    'pic'  => (string)$article->image(),
    'cat'  => (string)$article->cat(),
    'lead'  => (string)$article->lead(),
    'text'  => (string)$article->text(),
    'techs'  => (string)$article->techs(),
  );

}

echo json_encode($json);

?>
