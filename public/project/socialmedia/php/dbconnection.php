<?php
$servername = "web0098.zxcs.nl";
$db_username = "u71481p69034_projects";
$db_password = $_SESSION['DB_PASSWORD_PROJECTS'];
$db_name = "u71481p69034_socialmedia";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$db_name",$db_username,$db_password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
  ?><p style="display: block; background: #f00; color: #fff; text-align: center; margin-bottom: 0;">Couldn't connenct to database: <?php echo $e->getMessage();?></p><?php
	exit();
}
