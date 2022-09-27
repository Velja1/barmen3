<?php
	include("head.php");
	include("nav.php");
?>

		<!-- Main -->



	<?php
		if(!isset($_SESSION['korisnik'])):
			echo '
				<header class="align-center major special">
					<h2>Logovanje</h2>
					<p>Popunite formu da biste se ulogovali</p>
				</header>
				<form action="logovanje_provera.php" method="post" onSubmit="return proveraLog()">
					<div class="row uniform 50% align-center" style="margin-left:30%;">
						<div class="6u$">
						<label for="tbUsername">Username</label>
							<input type="text" name="tbUsername" id="tbUsername" value="" placeholder="Unesite username"/>
							<p class="greska" id="userGreska"></p>
						</div>
						<div class="6u$">
						<label for="tbPassword">Password</label>
							<input type="password" name="tbPassword" id="tbPassword" value="" placeholder="Unesite password"/>
							<p class="greska" id="passGreska"></p>
						</div>
					<div class="6u$">
						<ul class="actions">
							<li><input type="submit" name="btnLog" id="btnLog" value="Logovanje" class="special" /></li>
							<li><input type="reset" id="btnPonisti" value="Poništi" /></li>
						</ul>
					</div>';
		endif;
		?>
		<?php
			if(isset($_SESSION['korisnik'])):
				echo '
						<header class="align-center major special">
							<h2>Pozdrav '.$_SESSION['korisnik']->ime.'</h2>
							<p>Ulogovani ste</p>
						</header>
						<div class="align-center">
							<ul class="actions">
								<li><a href="index.php"><input type="button" value="Početna" class="special align-center" /></a></li>
								<li><a href="odjava.php"><input type="button" value="Odjava" /></a></li>
							</ul>
							</div>';
			endif;
		?>

		<?php
			if(isset($_GET['greskeKlijent'])):
		?>
		<p>Molimo Vas unesite ispravne podatke</p>
		<?php
			endif;
		?>
		<?php
			if(isset($_GET['greskeServer'])):
		?>
		<p>Greška prilikom logovanja, molimo pokušajte ponovo</p>
		<?php
			endif;
		?>
		<?php
			if(isset($_GET['uspeh'])):
		?>
		<div class="6u$ major special"><h2>Uspešno ste ulogovani</h2></div>
		
		<?php
			endif;
		?>
		
		</div>
	</form>

		

		<!-- Footer -->
		<?php
			include("footer.php");
		?>

		<!-- Scripts -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="assets/js/header.js"></script>
			<script src="assets/js/logovanje.js"></script>
	</body>
</html>





