<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "Sporocanje");

if(!$db) {
	die("Connection error: " .mysqli_errno());
}

if(isset($_SESSION['uporabnikID'])) {
	$id = $_SESSION['uporabnikID'];
	$query = mysqli_query($db, "SELECT email, ime, priimek FROM uporabniki WHERE id = '$id'");
	$data = mysqli_fetch_assoc($query);
}