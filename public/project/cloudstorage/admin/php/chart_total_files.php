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

// get the data per month and write it to array
foreach ($weeks as $week) {
  $sql = "SELECT COUNT(document_id) as count FROM document WHERE document_date BETWEEN '2000-01-01 00:00:00' AND " . date("'Y-m-d 23:59:59'", strtotime($week . '+1 Week'));
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $files_count = $stmt->fetchAll();

  $files = $files_count[0]['count'];
  settype($files, "integer");

  // write the data to the array
  $year[]['Week: ' . date("W", strtotime($week))] = $files;
}

echo json_encode($year);
