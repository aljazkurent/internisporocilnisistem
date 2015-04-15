<?php
require_once 'app/init.php';
include 'deli/glava.php';
if(empty($_SESSION['uporabnikID'])) {
	die('Za nadaljevanje se prijavite. <a href="prijava.php">Prijava!</a>');
}
$email = $data['email'];
$query = mysqli_query($db, "SELECT COUNT(id) FROM sporocila WHERE prejemnik LIKE '$email' AND posiljatelj");
$inbox = mysqli_fetch_all($query);
$inbox = $inbox[0][0];
?>
<div class="row">
	<div class="col-md-2">
	<ul class="nav nav-list">
		<li><a href="?predal=compose" class="btn btn-primary-sm">Novo sporočilo</a></li>
		<li><a href="?predal=inbox">Inbox <span class="badge"><?php echo $inbox; ?></a></li>
		<li><a href="?predal=zvezdica">Z zvezdico</a></li>
		<li><a href="?predal=poslano">Poslano</a></li>
		<li><a  data-toggle="modal" data-target=".bs-example-modal-sm">Dodaj predal</a></li>
	</ul>
	</div>
	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Dodaj poštni predal</h4>
      </div>
      <div class="modal-body">
      <form class="horizontal-form" method="post" action="app/dodajPredal.php">
      	<div class="form-group">
      		<label>Naziv predala</label>
      		<input type="text" name="predal" class="form-control" required>
      	</div>
      	<div class="form-group">
      		<input type="submit" class="btn btn-primary" value="Dodaj predal">
      		<a data-dismiss="modal" class="btn btn-default">Cancel</a>
      	</div>
      </form>
      </div>
    </div>
  </div>
</div>
	<div class="col-md-9">
	<?php if(isset($_GET['sporociloID']) ): 
	$id = $_GET['sporociloID'];
	$query = mysqli_query($db, "SELECT * FROM sporocila WHERE id = '$id'");
	$result = mysqli_fetch_assoc($query);
	?>

	<h3><?php echo $result['zadeva']; ?></h3>
	<hr>
	Pošiljatelj: <br><h4><?php echo $result['posiljatelj'];?></h4>
	<p><?php echo $result['vsebina']; ?></p>
	<hr>
		<form class="horizontal-form" action="app/poslji.php" method="post">
			<div class="form-group">
				<label>Odgovori</label>
				<textarea class="form-control" name="sporocilo" placeholder="Kliki če želiš napisati odgovor"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="Odgovori" class="btn btn-primary">
			</div>
		</form>

	<?php elseif($_GET['predal'] == 'inbox' || !isset($_GET['predal'])): 
	$query = mysqli_query($db, "SELECT * FROM sporocila WHERE prejemnik LIKE '$email' ORDER BY datum DESC");
	$prejeto = mysqli_fetch_all($query);
	?>
	<h3>Nabiralnik</h3>
		<table class="table table-hover">
		<tr>
			<th>Pošiljatelj</th>
			<th>Zadeva</th>
			<th>Vsebina</th>
			<th>Prejeto</th>
		</tr>
		<?php foreach($prejeto as $el):?>
		<tr>
			<td><a href="?sporociloID=<?php echo $el['0']; ?>"></a><?php echo $el['1']; ?></td>
			<td><?php echo $el['3']; ?></td>
			<td><?php echo $el['4']; ?></td>
			<td><?php $date = strtotime($el['5']); echo date("d. M", $date); ?></td>
		</tr>
		<?php endforeach; ?>
		</table>

	<?php elseif($_GET['predal'] == 'zvezdico'): ?>


	<?php elseif($_GET['predal'] == 'poslano'): 
		$query = mysqli_query($db, "SELECT * FROM sporocila WHERE posiljatelj LIKE '$email'");
		$poslano = mysqli_fetch_all($query);
	?>
	<h3>Poslana sporočila</h3>
	<table class="table table-hover">
		<tr>
			<th>Prejemnik</th>
			<th>Zadeva</th>
			<th>Vsebina</th>
			<th>Prejeto</th>
		</tr>
		<?php foreach($poslano as $el):?>
		<tr>
			<td><?php echo $el['2']; ?></td>
			<td><?php echo $el['3']; ?></td>
			<td><?php echo $el['4']; ?></td>
			<td><?php $date = strtotime($el['5']); echo date("d. M", $date); ?></td>
		</tr>
		<?php endforeach; ?>
		</table>


	<?php elseif($_GET['predal'] == 'compose'): ?>
		<h3>Usvari novo sporočilo</h3>
		<hr>
		<form class="horizontal-form" action="app/poslji.php" method="post">
			<div class="form-group">
				<label>Prejemnik: </label>
				<input type="email" class="form-control" name="prejemnik" required>
			</div>
			<div class="form-group">
				<label>Zadeva: </label>
				<input type="text" class="form-control" name="zadeva" required>
			</div>
			<div class="form-group">
				<label>Sporočilo:</label><br>
				<textarea class="form-control" name="sporocilo" placeholder="Novo sporočilo" required></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="Pošlji" class="btn btn-primary">
			</div>
		</form>

	<?php endif; ?>
	</div>
</div>
<?php
include 'deli/noga.php';
?>

		<script type="text/javascript">
		$(document).ready(function() {
   		 $('.table tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
   		     }
   			 });

		});
		</script>