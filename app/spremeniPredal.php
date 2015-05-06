<?php
require_once 'init.php';

if(isset($_GET['predal'])) {
	$predal = $_GET['predal'];
	$id = $_SESSION['sporociloID'];
	mysqli_query($db, "UPDATE sporocila SET predal = '$predal' WHERE id = '$id'");
	header('Location: ../index.php');
}
header('Location: ../index.php');