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
  $sql = "SELECT COUNT(share_id) as count FROM share WHERE share_date BETWEEN " . date("'Y-m-01 00:00:00'", strtotime($month)) . " AND " . date("'Y-m-31 23:59:59'", strtotime($month));
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $month_count = $stmt->fetchAll();

  $count = $month_count[0]['count'];
  settype($count, "integer");

  // write the data to the array
  $year[][date("M", strtotime($month))] = $count;
}

echo json_encode($year);
