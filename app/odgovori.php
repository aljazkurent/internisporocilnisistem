<?php

require_once 'init.php';

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	if(isset($_POST)) {
		$sporocilo = $_POST['sporocilo'];
		$posiljatelj = $data['email'];
		mysqli_query($db, "INSERT INTO odgovori (posiljatelj, vsebina, sporociloID, datum) VALUES ('$posiljatelj', '$sporocilo', '$id', NOW())");
		mysqli_query($db, "UPDATE sporocila SET zadeva = concat('RE: ', zadeva) WHERE id = '$id'");
		mysqli_query($db, "UPDATE sporocila SET odgovor = 1 WHERE id = '$id'");
		mysqli_query($db, "UPDATE sporocila SET prebrano = 0 WHERE id = '$id'");
	}
}

header('Location: ../index.php');