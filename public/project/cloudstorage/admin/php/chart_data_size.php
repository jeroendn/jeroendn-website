<?php
session_start();
include_once '../../php/dbconnection.php';

// get the last X weeks
$time = time();
for ($i = 1; $i <= 52; $i++) {
  $time = strtotime('last week', $time);
  $weeks[] = date("r", $time);
}

// flip the array to display from old to new
$weeks = array_reverse($weeks, false);

// get the data per week and write it to array
foreach ($weeks as $week) {
  // calculate total data size of all files
  $sql = "SELECT document.document_name, user.user_id, user.user_name FROM document INNER JOIN user ON document.user_id = user.user_id WHERE document_date BETWEEN '2000-01-01 00:00:00' AND " . date("'Y-m-d 23:59:59'", strtotime($week . '+1 Week')) . " ORDER BY document.document_date DESC";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $documents = $stmt->fetchAll();

  $total_size = 0;
  foreach ($documents as $document) {
    $file_dir = '../../uploads/' . str_replace(' ', '_', $document['user_name']) . $document['user_id'] . '/' . $document['document_name'];
    $total_size = $total_size + filesize($file_dir);
  }
  // convert bytes to GB
  $total_size = number_format($total_size / 1073741824, 2);
  settype($total_size, "float");

  // write the data to the array
  $year[]['Week: ' . date("W", strtotime($week))] = $total_size;
}

echo json_encode($year);
