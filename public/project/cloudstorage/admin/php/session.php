<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role_id'] != 2) {
	header("Location: login");
}

include_once '../../php/dbconnection.php';
?>
