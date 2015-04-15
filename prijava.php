<?php
require_once 'app/init.php';
include 'deli/glava.php';
?>
 <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
    <strong>Prijava</strong>  
        </div>
        <div class="panel-body">
<form class="horizontal-form" action="app/login.php" method="post">
<br>
		<div class="form-group input-group">
			<span class="input-group-addon">@</span>
			<input type="email" name="email" class="form-control" placeholder="Email">
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
			<input type="password" name="geslo" class="form-control" placeholder="Geslo">
		</div>        
         <input type="submit" class="btn btn-primary " value="Prijava">
        <hr>
        Še nimate računa?<a href="registracija.php" >Registriraj se tukaj</a>
</form>
        </div>
       
    </div>
</div>
<?php
include 'deli/noga.php';
?>
<?php
include 'deli/noga.php';
?>