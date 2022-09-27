<?php
	include("head.php");
	if($_SESSION['korisnik']->id_uloga!=1){
		header("Location: index.php");
	}
	include("nav.php");
?>

		<!-- Main -->
		<section id="main" style="display:flex;">
		<article id="adminPanel" style="width:60%;">
		<label for="selectAdmin" style="margin-left: 2%;">Akcija</label>
		<div id="selectAdmin" class="select-wrapper align-center" style="width: 100%; margin-left: 2%; margin-bottom: 2%;">
		<select id="ddlAdmin">
			<option value="0">- Izaberite akciju -</option>
			<option value="1">- Dodavanje -</option>
			<option value="2">- Izmena -</option>
			<option value="3">- Brisanje -</option>
		</select>
	</div>
	<div id="formaUpis" style="display: none;">
		<form>
		<label for="selectAdminProizvodjac" style="margin-left: 2%;">Proizvođac</label>
			<div id="selectAdminProizvodjac" class="select-wrapper align-center" style="width:100%; margin: 2%;">
				<select id="ddlAdminProizvodjac">
				<option value="0">- Izaberite proizvođača -</option>
				<?php
					global $conn;
					$upit="SELECT * FROM proizvodjaci";
					$podaci=$conn->query($upit)->fetchAll();
					foreach($podaci as $red):
				?>
					<option value="<?=$red->id_proizvodjac?>"><?=$red->naziv?></option>
				<?php
					endforeach;
				?>
				</select>
			</div>
			<label for="selectAdminTip" style="margin-left: 2%;">Tip</label>
			<div id="selectAdminTip" class="select-wrapper align-center" style="width:100%; margin: 2%;">
				<select id="ddlAdminTip">
				<option value="0">- Izaberite tip plovila -</option>
				<?php
					global $conn;
					$upit="SELECT * FROM tipovi";
					$podaci=$conn->query($upit)->fetchAll();
					foreach($podaci as $red):
				?>
					<option value="<?=$red->id_tip?>"><?=$red->naziv?></option>
				<?php
					endforeach;
				?>
				</select>
			</div>
			<label for="tbDodajModel" style="margin-left: 2%;">Model</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajModel" name="tbDodajModel" placeholder="Unesite model plovila"/>
			<p class="greska" id="pDodajModelGreska"></p>
			<label for="tbDodajCena" style="margin-left: 2%;">Cena</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajCena" name="tbDodajCena" placeholder="Unesite cenu plovila"/>
			<p class="greska" id="pDodajCenaGreska"></p>
			<label for="tbDodajDuzina" style="margin-left: 2%;">Dužina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajDuzina" name="tbDodajDuzina" placeholder="Unesite dužinu plovila"/>
			<p class="greska" id="pDodajDuzinaGreska"></p>
			<label for="tbDodajSirina" style="margin-left: 2%;">Širina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajSirina" name="tbDodajSirina" placeholder="Unesite širinu plovila"/>
			<p class="greska" id="pDodajSirinaGreska"></p>
			<label for="tbDodajTezina" style="margin-left: 2%;">Težina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajTezina" name="tbDodajTezina" placeholder="Unesite težinu plovila"/>
			<p class="greska" id="pDodajTezinaGreska"></p>
			<label for="tbDodajKapacitet" style="margin-left: 2%;">Kapacitet</label>
			<input style="width:100%; margin:2%;" type="text" id="tbDodajKapacitet" name="tbDodajKapacitet" placeholder="Unesite kapacitet rezervoara"/>
			<p class="greska" id="pDodajKapacitetGreska"></p>
			<label for="taDodajOpis" style="margin-left: 2%;">Opis</label>
			<textarea id="taDodajOpis" name="taDodajOpis" style="width: 100%; margin: 2%;" placeholder="Unesite opis plovila"></textarea>
			<p class="greska" id="pDodajOpisGreska"></p>
			<input type="button" style="margin:2%;" id="btnDodaj" name="btnDodaj" value="Upiši" class="special"/>
			<input type="reset" style="margin:2%;" value="Reset" name="btnDodaj"/>
		</form>
		<p id="odgovorUpis" style="margin:2%;"></p>
	</div>
	<div id="formaIzmena" style="display: none;">
		<form>
		<label for="selectIzmenaPlovikloiz" style="margin-left: 2%;">Plovilo</label>
			<div id="selectIzmenaPloviloiz" class="select-wrapper align-center" style="width:100%; margin: 2%;">
				<select id="ddlIzmenaPloviloiz">
				<option value="0">- Izaberite plovilo -</option>
				<?php
					global $conn;
					$upit="SELECT * FROM plovila p INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac";
					$podaci=$conn->query($upit)->fetchAll();
					foreach($podaci as $red):
				?>
					<option value="<?=$red->id_plovila?>"><?=$red->naziv.' '.$red->model?></option>
				<?php
					endforeach;
				?>
				</select>
			</div>
			<label for="selectIzmenaTip" style="margin-left: 2%;">Tip</label>
			<div id="selectIzmenaTip" class="select-wrapper align-center" style="width:100%; margin: 2%;">
				<select id="ddlIzmenaTip">
				<option value="0">- Izaberite tip plovila -</option>
				<?php
					global $conn;
					$upit="SELECT * FROM tipovi";
					$podaci=$conn->query($upit)->fetchAll();
					foreach($podaci as $red):
				?>
					<option value="<?=$red->id_tip?>"><?=$red->naziv?></option>
				<?php
					endforeach;
				?>
				</select>
			</div>
			<label for="tbIzmeniModel" style="margin-left: 2%;">Model</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniModel" name="tbIzmeniModel" placeholder="Unesite model plovila"/>
			<p class="greska" id="pIzmeniModelGreska"></p>
			<label for="tbIzmeniCena" style="margin-left: 2%;">Cena</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniCena" name="tbIzmeniCena" placeholder="Unesite cenu plovila"/>
			<p class="greska" id="pIzmeniCenaGreska"></p>
			<label for="tbIzmeniDuzina" style="margin-left: 2%;">Dužina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniDuzina" name="tbIzmeniDuzina" placeholder="Unesite dužinu plovila"/>
			<p class="greska" id="pIzmeniDuzinaGreska"></p>
			<label for="tbIzmeniSirina" style="margin-left: 2%;">Širina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniSirina" name="tbIzmeniSirina" placeholder="Unesite širinu plovila"/>
			<p class="greska" id="pIzmeniSirinaGreska"></p>
			<label for="tbIzmeniTezina" style="margin-left: 2%;">Težina</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniTezina" name="tbIzmeniTezina" placeholder="Unesite težinu plovila"/>
			<p class="greska" id="pIzmeniTezinaGreska"></p>
			<label for="tbIzmeniKapacitet" style="margin-left: 2%;">Kapacitet</label>
			<input style="width:100%; margin:2%;" type="text" id="tbIzmeniKapacitet" name="tbIzmeniKapacitet" placeholder="Unesite kapacitet rezervoara"/>
			<p class="greska" id="pIzmeniKapacitetGreska"></p>
			<label for="taIzmeniOpis" style="margin-left: 2%;">Opis</label>
			<textarea id="taIzmeniOpis" name="taIzmeniOpis" style="width: 100%; margin: 2%;" placeholder="Unesite opis plovila"></textarea>
			<p class="greska" id="pIzmeniOpisGreska"></p>
			<input type="button" style="margin:2%;" id="btnIzmeni" name="btnIzmeni" value="Izmeni" class="special"/>
			<input type="reset" style="margin:2%;" value="Reset" name="btnDodaj"/>
		</form>
		<p id="odgovorIzmena" style="margin:2%;"></p>
	</div>
	<div id="formaBrisanje" style="display: none;">
		<form>
		<label for="selectBrisanjePlovila" style="margin-left: 2%;">Plovilo</label>
			<div id="selectBrisanjePlovila" class="select-wrapper align-center" style="width:100%; margin: 2%;">
				<select id="ddlBrisanjePlovila">
				<option value="0">- Izaberite plovilo -</option>
				<?php
					global $conn;
					$upit="SELECT * FROM plovila p INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac";
					$podaci=$conn->query($upit)->fetchAll();
					foreach($podaci as $red):
				?>
					<option value="<?=$red->id_plovila?>"><?=$red->naziv.' '.$red->model?></option>
				<?php
					endforeach;
				?>
				</select>
			</div>
			<input type="button" style="margin:2%;" id="btnIzbrisi" name="btnIzbrisi" value="Izbriši" class="special"/>
			<input type="reset" style="margin:2%;" value="Reset" name="btnDodaj"/>
		</form>
		<p id="odgovorBrisanje" style="margin:2%;"></p>
	</div>
	</article>
	<article id="anketa" style="width:40%; margin-left:20%; margin-right:5%;">
		<label for="ddlAnketa">Anketa</label>
		<div id="selectAdmin" class="select-wrapper align-center" style="width: 100%; margin-left: 2%; margin-bottom: 2%;">
		<select id="ddlAnketa">
			<option value="0">- Izaberite plovilo -</option>
				<?php
					global $conn;
					$upit="SELECT * FROM plovila p INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac";
					$podaci=$conn->query($upit)->fetchAll();
					foreach($podaci as $red):
				?>
					<option value="<?=$red->id_plovila?>"><?=$red->naziv.' '.$red->model?></option>
				<?php
					endforeach;
				?>
			</select>
		</div>
		<div id="ocene"></div>
	</article>
	</section>
		<!-- Footer -->
		<?php
			include("footer.php");
		?>

		<!-- Scripts -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="assets/js/header.js"></script>
			<script src="assets/js/admin.js"></script>
	</body>
</html>





