<?php
session_start();
$dir = '../uploads/';
$file = (!empty($_GET['file'])) ? basename($_GET['file']) : false;
$user = str_replace(' ', '_', $_SESSION['user_name']) . $_SESSION['user_id'];

$file_dir = $dir . $user . '/' . $file;

if($file !== false and file_exists($file_dir)) {
   readfile($file_dir);
   exit;
}
header("HTTP/1.0 404 Not Found");
