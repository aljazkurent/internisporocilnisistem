<?php
require_once 'init.php';

if(!empty($_POST)) {
	if(empty($_POST['prejemnik']) == false && empty($_POST['zadeva']) == false && empty($_POST['sporocilo']) == false) {
		$prejemnik = htmlentities(trim($_POST['prejemnik']));
		$zadeva = htmlentities(trim($_POST['zadeva']));
		$vsebina = htmlentities(trim($_POST['sporocilo']));
		$posiljatelj = $data['email'];

		echo $prejemnik.'<br>'.$zadeva.'<br>'.$vsebina.'<br>'.$posiljatelj;

		mysqli_query($db, "INSERT INTO sporocila (posiljatelj, prejemnik, zadeva, vsebina, datum, predal, prebrano)
				VALUES ('$posiljatelj', '$prejemnik', '$zadeva', '$vsebina', NOW(), 0, 0)");
	}
}
header('Location: ../index.php');