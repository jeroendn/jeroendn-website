<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "tablename";

try {
	$db = new PDO("mysql:host=$servername;dbname=$dbName",$dbUsername,$dbPassword);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
  ?><p style="display: block; background: #c95f00; color: #fff; text-align: center; margin-bottom: 0;">Couldn't connenct to database: <?php echo $e->getMessage();?></p><?php
	exit();
}
