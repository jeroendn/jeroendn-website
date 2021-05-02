<?php
session_start();
include_once __DIR__ . '../../dbconnection.php';
include_once __DIR__ . '../../functions.php';

$document_id = $_POST['document_id'];

// delete file form directory
$sql = "SELECT document_name FROM document WHERE document_id = '" . $document_id . "'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$document_name = $stmt->fetchAll(PDO::FETCH_ASSOC);
unlink(get_file_dir($document_name[0]['document_name']));

// delete all existing shares with other users
$sql = "DELETE FROM share WHERE document_id=:document_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':document_id', $document_id, PDO::PARAM_INT);
$stmt->execute();

// delete data from file form database
$sql = "DELETE FROM document WHERE document_name = '" . $document_name[0]['document_name'] . "' ";
$stmt = $conn->prepare($sql);
$stmt->execute();
