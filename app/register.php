<?php
require_once 'init.php';

function emailExists($db, $email) {
	$query = mysqli_query($db, "SELECT COUNT(id) FROM uporabniki WHERE email LIKE '$email'");
	$result = mysqli_fetch_assoc($query);
	return $result['COUNT(id)'];
}

if(!empty($_POST)) {
	if(empty($_POST['email']) == false && empty($_POST['geslo']) == false && empty($_POST['ime']) == false && empty($_POST['priimek']) == false) {
		if(emailExists($db, $_POST['email']) == false) {
			$email = htmlentities(trim($_POST['email']));
			$geslo = htmlentities(trim($_POST['geslo']));
			$geslo = sha1($geslo);
			$ime = htmlentities(trim($_POST['ime']));
			$priimek = htmlentities(trim($_POST['priimek']));
			mysqli_query($db, "INSERT INTO uporabniki (email, geslo, ime, priimek)
				VALUES ('$email', '$geslo', '$ime', '$priimek')");
			header('Location: ../prijava.php');
		}
		else 
			header('Location: ../registracija.php');
	}
	else 
	header('Location: ../registracija.php');
}
else 
header('Location: ../registracija.php');