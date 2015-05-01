<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "Sporocanje");

if(!$db) {
	die("Connection error: " .mysqli_errno());
}

error_reporting(0);

if(isset($_SESSION['uporabnikID'])) {
	$id = $_SESSION['uporabnikID'];
	$query = mysqli_query($db, "SELECT id, email, ime, priimek FROM uporabniki WHERE id = '$id'");
	$data = mysqli_fetch_assoc($query);
}