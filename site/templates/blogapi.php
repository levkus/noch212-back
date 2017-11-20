<?php

header('Content-type: application/json; charset=utf-8');
$data = $pages->find('blog')->children()->visible()->flip()->paginate(10);
$json = array();

foreach($data as $article) {

  $json[] = array(
    'url'   => (string)$article->url(),
    'title' => (string)$article->title(),
    'text'  => (string)$article->text(),
    'date'  => (string)$article->date()
  );

}

echo json_encode($json);

?>
