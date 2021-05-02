<?php
include_once __DIR__ . '../../php/dbconnection.php';

session_start();
$dir = '../uploads/';
$file = (!empty($_GET['file'])) ? basename($_GET['file']) : false;
$user_name = (!empty($_GET['user'])) ? basename($_GET['user']) : false;
$user_id = (!empty($_GET['user_id'])) ? basename($_GET['user_id']) : false;

$file_dir = $dir . $user_name . $user_id . '/' . $file;

if($file !== false and file_exists($file_dir)) {
  // check permision
  $sql = "SELECT * FROM ((share INNER JOIN document ON share.document_id = document.document_id) INNER JOIN user ON user.user_id = document.user_id)
  WHERE document.document_name=:document_name AND document.user_id=:user";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':document_name', $file, PDO::PARAM_STR);
  $stmt->bindParam(':user', $user_id, PDO::PARAM_INT);
  $stmt->execute();
  $share_check = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (!empty($share_check)) {
    readfile($file_dir);
    exit;
  }
  header("HTTP/1.0 403 Access Denied");
  exit;
}
header("HTTP/1.0 404 Not Found");
