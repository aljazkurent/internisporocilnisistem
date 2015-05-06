<?php
require_once 'app/init.php';
include 'deli/glava.php';
if(empty($_SESSION['uporabnikID'])) {
	die('Za nadaljevanje se prijavite. <a href="prijava.php">Prijava!</a>');
}
$email = $data['email'];
$query = mysqli_query($db, "SELECT COUNT(id) FROM sporocila WHERE prejemnik LIKE '$email' AND prebrano = 0");
$inbox = mysqli_fetch_assoc($query);
$query = mysqli_query($db, "SELECT * FROM predali WHERE uporabnikID = '$id'");
$predali = mysqli_fetch_all($query);

?>
<div class="row">
	<div class="col-md-2">
	<ul class="nav nav-list">
		<li><a href="?predal=compose" class="btn btn-primary-sm">Novo sporočilo</a></li>
		<?php if($data['email'] == 'admin@admin.com'):?>
		<li><a href="?predal=brisi" class="btn btn-primary-sm">Izbris sporočil</a></li>
	<?php endif; ?>
		<li><a href="?predal=inbox">Inbox <span class="badge"><?php echo $inbox['COUNT(id)']; ?></a></li>
		<li><a href="?predal=zvezdica">Z zvezdico</a></li>
		<li><a href="?predal=poslano">Poslano</a></li>
		<li>
		
    <a id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">Osebni predali</a>
    
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
  <?php foreach($predali as $el):?>

  	<li role="presentation"><a role="menuitem" tabindex="-1" href="?predal1=<?php echo $el['1']; ?>" ><?php echo $el['1']; ?></a></li>
  <?php endforeach; ?>
  </ul>
</li>
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
	$_SESSION['sporociloID'] = $id;
	$query = mysqli_query($db, "SELECT * FROM sporocila WHERE id = '$id'");
	$result = mysqli_fetch_assoc($query);
	$query1 = mysqli_query($db, "SELECT * FROM odgovori WHERE sporociloID = '$id' AND izbrisano = 0");
	$result1 = mysqli_fetch_all($query1);
	if($result['prebrano'] == 0)
		mysqli_query($db, "UPDATE sporocila SET prebrano = 1 WHERE id = '$id'");
	?>

	<h3><?php echo $result['zadeva']; ?></h3><a class="pull-right" style="color:#000;" href="app/izbrisi.php?id=<?php echo $id; ?>&type=sporocilo">Delete</a>
	<form class="pull-right" action="app/spremeniPredal.php">
		<select name="predal">
			<option value="1">Z zvezdico</option>
			<?php
			foreach($predali as $el):
				?>
			<option value="<?php echo $el['0'];?>"><?php echo $el['1']; ?></option>
			<?php
			endforeach;
			?>
			<input type="submit" value="Spremeni predal">
			</select>
	</form>
	<hr>
	Pošiljatelj: <br><h4><?php echo $result['posiljatelj'];?></h4>
	<p><?php echo $result['vsebina']; ?></p>
	<hr>
	<?php
	foreach($result1 as $el):
		echo $el['1'].':';
	?>
	<a href="app/izbrisi.php?id=<?php echo $el['0'];?>&type=odgovor" class="pull-right" style="color:#000">Delete</a>
	<?php
		echo '<p>'.$el['2'].'</p><hr>';
	
	endforeach;
	?>
		<form class="horizontal-form" action="app/odgovori.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group">
				<label>Odgovori</label>
				<textarea class="form-control" name="sporocilo" placeholder="Kliki če želiš napisati odgovor"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="Odgovori" class="btn btn-primary">
			</div>
		</form>

	<?php elseif($_GET['predal'] == 'inbox' || !isset($_GET['predal']) && !isset($_GET['predal1'])): 
	$query = mysqli_query($db, "SELECT * FROM sporocila WHERE prejemnik LIKE '$email' AND predal = 0 AND izbrisano  = 0 OR odgovor = 1 ORDER BY datum DESC");
	$prejeto = mysqli_fetch_all($query);
	?>
	<h3>Nabiralnik</h3>
		<table class="table table-hover">
		<tr>
			<th>Pošiljatelj</th>
			<th>Zadeva</th>
			<th>Vsebina</th>
			<th>Prejeto</th>
			<th>Prebrano</th>
		</tr>
		<?php foreach($prejeto as $el):?>
		<tr>
			<td><a href="?sporociloID=<?php echo $el['0']; ?>"></a><?php echo $el['1']; ?></td>
			<td><?php echo $el['3']; ?></td>
			<td><?php echo $el['4']; ?></td>
			<td><?php $date = strtotime($el['5']); echo date("d. M", $date); ?></td>
			<th><?php if($el['7'] == 1) echo 'Prebano'; else echo 'Neprebrano'; ?></th>
		</tr>
		<?php endforeach; ?>
		</table>

	<?php elseif($_GET['predal'] == 'zvezdica'):
	$query = mysqli_query($db, "SELECT * FROM sporocila WHERE prejemnik LIKE '$email' AND predal = 1 AND izbrisano = 0 ORDER BY datum DESC");
	$prejeto = mysqli_fetch_all($query);
	?>
	<h3>Nabiralnik</h3>
		<table class="table table-hover">
		<tr>
			<th>Pošiljatelj</th>
			<th>Zadeva</th>
			<th>Vsebina</th>
			<th>Prejeto</th>
			<th>Prebrano</th>
		</tr>
		<?php foreach($prejeto as $el):?>
		<tr>
			<td><a href="?sporociloID=<?php echo $el['0']; ?>"></a><?php echo $el['1']; ?></td>
			<td><?php echo $el['3']; ?></td>
			<td><?php echo $el['4']; ?></td>
			<td><?php $date = strtotime($el['5']); echo date("d. M", $date); ?></td>
			<th><?php if($el['7'] == 1) echo 'Prebano'; else echo 'Neprebrano'; ?></th>
		</tr>
		<?php endforeach; ?>
		</table>



	<?php elseif($_GET['predal'] == 'poslano'): 
		$query = mysqli_query($db, "SELECT * FROM sporocila WHERE posiljatelj LIKE '$email' AND izbrisano = 0 ORDER BY datum DESC");
		$poslano = mysqli_fetch_all($query);
	?>
	<h3>Poslana sporočila</h3>
	<table class="table table-hover">
		<tr>
			<th>Prejemnik</th>
			<th>Zadeva</th>
			<th>Vsebina</th>
			<th>Prejeto</th>
			<th>Prebrano</th>
		</tr>
		<?php foreach($poslano as $el):?>
		<tr>
			<td><?php echo $el['2']; ?></td>
			<td><?php echo $el['3']; ?></td>
			<td><?php echo $el['4']; ?></td>
			<td><?php $date = strtotime($el['5']); echo date("d. M", $date); ?></td>
			<td><?php if($el['7'] == 1) echo 'Prebrano'; else echo 'Neprebrano'; ?></td>
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

	<?php elseif($_GET['predal'] == 'brisi'): 
	$query = mysqli_query($db, "SELECT * FROM sporocila WHERE izbrisano = 1 ORDER BY datum DESC");
	$result = mysqli_fetch_all($query);
	?>
	<h3>Brisanje sporočil</h3>
	<table class="table table-hover">
		<tr>
			<th>Prejemnik</th>
			<th>Zadeva</th>
			<th>Vsebina</th>
			<th>Prejeto</th>
		</tr>
		<?php foreach($result as $el):?>
		<tr>
			<td><?php echo $el['2']; ?></td>
			<td><?php echo $el['3']; ?></td>
			<td><?php echo $el['4']; ?></td>
			<td><?php $date = strtotime($el['5']); echo date("d. M", $date); ?></td>
		</tr>
		<?php endforeach; ?>
		</table>
	<?php elseif(isset($_GET['predal1']) && !isset($_GET['predal'])):
	$userID = $data['id'];
	$predal = trim($_GET['predal1']);
	$id = mysqli_query($db, "SELECT id FROM predali WHERE naziv = '$predal' AND uporabnikID = '$userID'");
	$id = mysqli_fetch_assoc($id);
	$id = $id['id'];
	$query = mysqli_query($db, "SELECT * FROM sporocila WHERE prejemnik LIKE '$email' AND predal = '$id'");
	$result = mysqli_fetch_all($query);
	?>
	<h3>Nabiralnik</h3>
		<table class="table table-hover">
		<tr>
			<th>Pošiljatelj</th>
			<th>Zadeva</th>
			<th>Vsebina</th>
			<th>Prejeto</th>
			<th>Prebrano</th>
		</tr>
		<?php foreach($result as $el):?>
		<tr>
			<td><a href="?sporociloID=<?php echo $el['0']; ?>"></a><?php echo $el['1']; ?></td>
			<td><?php echo $el['3']; ?></td>
			<td><?php echo $el['4']; ?></td>
			<td><?php $date = strtotime($el['5']); echo date("d. M", $date); ?></td>
			<th><?php if($el['7'] == 1) echo 'Prebano'; else echo 'Neprebrano'; ?></th>
		</tr>
		<?php endforeach; ?>
		</table>

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