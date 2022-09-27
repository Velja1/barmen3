<?php
	include("head.php");
	include("nav.php");
?>

		<!-- Main -->




	<header class="align-center major special">
		<h2>Registracija</h2>
		<p>Registrujte se da biste mogli da rezervišete posetu</p>
	</header>
	<form action="registracija_upis.php" method="post" onSubmit="return proveraReg()">
		<div class="row uniform 50% align-center" style="margin-left:30%;">
			<div class="6u$">
			<label for="tbIme">Ime</label>
				<input type="text" name="tbIme" id="tbIme" value="" placeholder="Unesite ime"/>
				<p class="greska" id="imeGreska"></p>
			</div>
			<div class="6u$">
			<label for="tbPrezime">Prezime</label>
				<input type="text" name="tbPrezime" id="tbPrezime" value="" placeholder="Unesite prezime"/>
				<p class="greska" id="prezimeGreska"></p>
			</div>
			<div class="6u$">
			<label for="tbEmail">Email</label>
				<input type="email" name="tbEmail" id="tbEmail" value="" placeholder="Unesite email"/>
				<p class="greska" id="emailGreska"></p>
			</div>
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
				<li><input type="submit" name="btnReg" id="btnReg" value="Registracija" class="special" /></li>
				<li><input type="reset" id="btnPonisti" value="Poništi" /></li>
			</ul>
		</div>

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
		<p class="align-center">Username je zauzet, izaberite drugi username</p>
		<?php
			endif;
		?>
		<?php
			if(isset($_GET['uspeh'])):
		?>
		<div class="6u$ major special"><h2>Uspešno ste registrovani</h2></div>
		
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
			<script src="assets/js/registracija.js"></script>
	</body>
</html>





