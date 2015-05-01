<?php

require_once 'init.php';

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	if(isset($_POST)) {
		$sporocilo = $_POST['sporocilo'];
		$posiljatelj = $data['email'];
		mysqli_query($db, "INSERT INTO odgovori (posiljatelj, vsebina, sporociloID, datum) VALUES ('$posiljatelj', '$sporocilo', '$id', NOW())");
	}
}

header('Location: ../index.php');