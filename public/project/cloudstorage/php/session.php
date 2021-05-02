<?php
session_start();

// session timeout
$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 30000;
if (isset($_SESSION['LAST_ACTIVITY']) &&
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
}
$_SESSION['LAST_ACTIVITY'] = $time;

if (!isset($_SESSION['user_id'])) {
	header("Location: login");
}

include_once __DIR__ . '../../php/dbconnection.php';
include_once __DIR__ . '../../php/functions.php';
?>
