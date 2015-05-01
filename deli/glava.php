<!DOCTYPE html>
<html>
<head>
	<title>Sporočanje</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css/font-awesome.css" rel="stylesheet" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container" style="color:#333">
<nav class="navbar navbar-defaul">
<h2 style="margin:0;padding:0;">Sporočilni sistem</h2>
<a href="odjava.php" style="padding:5px;background-color:#fff;text-decoration:none;color:#333;font-weight:bold;margin-top:10px;">Odjava</a>
	<div class="navbar-header pull-right">
    	<h4 style="margin:0;padding:0;">Prijavljeni kot:</h4>
    	<?php echo $data['ime'].' '.$data['priimek'].'<h4>'.$data['email'].'</h4>';?>
 	</div>
</nav>
</div>
<div class="container-fluid">
	