<?php
session_start();
include_once '../../php/dbconnection.php';

if ($_POST['document_id'] != '') {
  $sql = "DELETE FROM share WHERE user_id=:user_id AND document_id=:document_id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
  $stmt->bindParam(':document_id', $_POST['document_id'], PDO::PARAM_STR);
  $stmt->execute();
}
