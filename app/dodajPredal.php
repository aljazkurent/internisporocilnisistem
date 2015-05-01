<?php

require_once 'init.php';

if(!empty($_POST)) {
	$naziv = htmlentities(trim($_POST['predal']));
	mysqli_query($db, "INSERT INTO predali (naziv, uporabnikID) VALUES ('$naziv', '$id')");
}
header('Location: ../index.php');
