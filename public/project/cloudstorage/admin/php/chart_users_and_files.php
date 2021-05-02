<?php
session_start();
include_once '../../php/dbconnection.php';

// get the last X months
$time = time();
for ($i = 1; $i <= 12; $i++) {
  $time = strtotime('last month', $time);
  $months[] = date("r", $time);
}

// flip the array to display from old to new
$months = array_reverse($months, false);

// get the data per month and write it to array
foreach ($months as $month) {
  $sql = "SELECT COUNT(user_id) as count FROM user WHERE user_date BETWEEN '2000-01-01 00:00:00' AND " . date("'Y-m-31 23:59:59'", strtotime($month));
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $user_count = $stmt->fetchAll();

  $users = $user_count[0]['count'];
  settype($users, "integer");

  $sql = "SELECT COUNT(document_id) as count FROM document WHERE document_date BETWEEN '2000-01-01 00:00:00' AND " . date("'Y-m-31 23:59:59'", strtotime($month));
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $files_count = $stmt->fetchAll();

  $files = $files_count[0]['count'];
  settype($files, "integer");

  // write the data to the array
  $year[][date("M", strtotime($month))] = array('user' => $users, 'file' => $files);
}

echo json_encode($year);
