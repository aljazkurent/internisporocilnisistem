<?php

require_once 'init.php';

function prijava($db, $email, $geslo) {
	$query = mysqli_query($db, "SELECT id FROM uporabniki WHERE email = '$email' AND geslo = '$geslo'");
	$result = mysqli_fetch_assoc($query);
	return $result['id'];
}

if(!empty($_POST)) {
	if(empty($_POST['email']) == false && empty($_POST['geslo']) == false) {
		$email = htmlentities(trim($_POST['email']));
		$geslo = sha1($_POST['geslo']);
		echo $email.'<br>'.$geslo;
		if(prijava($db, $email, $geslo) != 0) {
			$login = prijava($db, $email, $geslo);
			$_SESSION['uporabnikID'] = $login;
			header('Location: ../index.php');
			print_r($_SESSION['uporabnikID']);
		}
		else 
			header('Location: ../prijava.php');
	}
	else 
		header('Location: ../prijava.php');
}
else 
header('Location: ../prijava.php');