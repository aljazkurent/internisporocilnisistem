<?php

require_once 'init.php';

if(isset($_GET['id']) && isset($_GET['type'])) {
	$id = $_GET['id'];
	$type = $_GET['type'];
	switch ($type) {
		case 'sporocilo':
			mysqli_query($db, "UPDATE sporocila SET izbrisano = 1 WHERE id = '$id'");
			break;
		
		case 'odgovor':
			mysqli_query($db, "UPDATE odgovori SET izbrisano = 1 WHERE id = '$id'");
			break;
	}
}



header('Location: ../index.php');