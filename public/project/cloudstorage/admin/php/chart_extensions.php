<?php
session_start();
include_once '../../php/dbconnection.php';

$sql = "SELECT document_name FROM document ORDER BY document_date DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$documents = $stmt->fetchAll();

// store file extensions with a count
$top_extensions = array();

foreach ($documents as $document) {
  $extension = pathinfo($document['document_name'])['extension'];

  if (isset($top_extensions[$extension])) {
    $top_extensions[$extension] = $top_extensions[$extension] + 1;
  }
  else {
    $top_extensions[$extension] = 1;
  }
}

arsort($top_extensions);
// limit the amount of items given
$top5_extensions = array_slice($top_extensions, 0, 5);

// calc the other extensions as one
$others = array_slice($top_extensions, 5);
foreach ($others as $other) {
  if (isset($top5_extensions['other'])) {
    $top5_extensions['other'] = $top5_extensions['other'] + 1;
  }
  else {
    $top5_extensions['other'] = 1;
  }
}

// write the data to the array
foreach ($top5_extensions as $key => $extension) {
  $data[][$key] = $extension;
}

echo json_encode($data);
