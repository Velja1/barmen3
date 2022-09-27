<?php
	include("head.php");
	include("nav.php");
?>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major special align-center">
						<h2>Prodaja plovila</h2>
						<p>U narednom delu prikazan je cenovnik naših plovila. Takođe nudimo vam mogućnost da zakažete posetu putem forme i da pogledate naša plovila. </p>
					</header>
	
					<!-- Table -->
						<section>
							<h3 class="align-center">Cenovnik</h3>
							<div class="table-wrapper">
								<table id="tabela">
									<thead>
										<tr>
											<th>Ime</th>
											<th>Tip</th>
											<th>Cena</th>
										</tr>
									</thead>
									<tbody>
										<tr>
										<?php
											global $conn;
											$upit="SELECT m.naziv AS mnaziv, p.model AS pmodel, t.naziv AS tnaziv, cena FROM plovila p INNER JOIN tipovi t ON p.id_tip=t.id_tip INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac ";
											$podaci=$conn->query($upit)->fetchAll();
											foreach($podaci as $red):
										?>
										<td><?=$red->mnaziv.' '.$red->pmodel?></td><td><?=ucfirst($red->tnaziv)?></td><td><?=intval($red->cena)?>€</td></tr></tbody>
										<?php
											endforeach;
										?>
								</table>
							</div>
						</section>

					<!-- Image -->
						<section id="imageSection">
							<div id="divImage">
							<?php
								global $conn;
								$upit="SELECT * FROM slike LIMIT 10";
								$podaci=$conn->query($upit)->fetchAll();
								foreach($podaci as $red):
							?>
							<span>
								<img src="<?=$red->src?>" alt="<?=$red->alt?>"/>
							</span>
							<?php
								endforeach;
							?>
							</div>
						</section>

					<!-- Form -->
						<section id="formaSection">
							<article id="slikaForma">
								<img src="images/letter.png" alt="Pismo"/>
							</article>
							<?php
								if(isset($_SESSION['korisnik'])):
							?>
							<article id="forma">
								<h3 class="align-center">Kontakt forma</h3>
								<form method="post" action="obrada_forme.php" onSubmit="return provera()">
									<div class="row uniform 50%">
										<div class="12u$">
										<label for="tbIme">Ime</label>
											<input type="text" name="tbIme" id="tbIme" value="" placeholder="Unesite ime"/>
											<p class="greska" id="imeGreska"></p>
										</div>
										<div class="12u$">
										<label for="tbPrezime">Prezime</label>
											<input type="text" name="tbPrezime" id="tbPrezime" value="" placeholder="Unesite prezime"/>
											<p class="greska" id="prezimeGreska"></p>
										</div>
										<div class="12u$">
										<label for="tbBroj">Broj telefona</label>
											<input type="text" name="tbBroj" id="tbBroj" value="" placeholder="Unesite Vaš broj telefona u formatu (06X/XXX-XXXX)"/>
											<p class="greska" id="brojGreska"></p>
										</div>
										<div class="12u$">
										<label for="tbEmail">Email</label>
											<input type="email" name="tbEmail" id="tbEmail" value="" placeholder="Unesite email"/>
											<p class="greska" id="emailGreska"></p>
										</div>
										<div class="12u$">
										<label for="tbDatum">Datum</label>
											<input type="text" name="tbDatum" id="tbDatum" value="" placeholder="Unesite datum posete u formatu (YYYY-MM-DD)"/>
											<p class="greska" id="datumGreska"></p>
										</div>
										<div class="12u$">
										<label for="divSelectPlovilo">Plovilo</label>
											<div class="select-wrapper" id="divSelectPlovilo">
												<select name="selectPlovilo" id="selectPlovilo">
													<option value="0">- Izaberite plovilo - </option>
													<?php
														global $conn;
														$upit="SELECT p.id_plovila AS idtip, m.naziv AS mnaziv, p.model AS pmodel FROM plovila p INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac";
														$podaci=$conn->query($upit)->fetchAll();
														foreach($podaci as $red):
													?>
														<option value="<?=$red->idtip?>"><?=$red->mnaziv.' '.$red->pmodel?></option>
													<?php
														endforeach;
													?>
												</select>
											</div>
											<p class="greska" id="ploviloGreska"></p>
										</div>
										<p>Da li želite da dobijate novosti na Vašu email adresu?</p>
										<div id="divNovosti">
											<span>
												<input type="radio" id="rbNovostiDa" name="rbNovosti" value="Da"/>
												<label for="rbNovostiDa">Da</label>
											</span>
											<span>
												<input type="radio" id="rbNovostiNe" name="rbNovosti" value="Ne"/>
												<label for="rbNovostiNe">Ne</label>
											</span>
											<p class="greska" id="novostiGreska"></p>
										</div>
									</div>
									<div class="12u$" style="margin-top:51px">
									<label for="tbDodatni">Dodatni zahtevi</label>
										<textarea name="message" id="tbDodatni" placeholder="Unesite vaše dodatne zahteve (do 1000 karaktera)" rows="6"></textarea>
										<p class="greska" id="dodatniGreska"></p>
									</div>
									<div class="6u 12u$(small)"style="margin-top:20px;">
										<input type="checkbox" id="cbUslovi" name="cbUslovi"/>
										<label for="cbUslovi">Da li prihvatate naše uslove korišćenja?</label>
										<p class="greska" id="usloviGreska"></p>
									</div>
									<div class="12u$">
										<ul class="actions">
											<li><input type="submit" name="btnPosalji" id="btnPosalji" value="Pošalji" class="special" /></li>
											<li><input type="reset" id="btnPonisti" value="Poništi" /></li>
										</ul>
									</div>
									<div class="12u$">

									<?php
										if(isset($_GET['greskeKlijent'])):
									?>
									<p id="odgovor">Molimo Vas unesite ispravne podatke</p>
									<?php
										endif;
									?>
									<?php
										if(isset($_GET['greskeServer'])):
									?>
									<p id="odgovor">Greška prilikom upisa, molimo pokušajte kasnije</p>
									<?php
										endif;
									?>
									<?php
										if(isset($_GET['uspeh'])):
									?>
									<p id="odgovor">Uspešno ste rezervisali vašu posetu</p>
									<?php
										endif;
									?>
									
									</div>
								</form>
							</article>
						<?php
							endif;
							if(!isset($_SESSION['korisnik'])):
						?>
						<header class="major special align-center">
							<h2>Kontakt forma</h2>
							<p>Ulogujte se da biste mogli da popunite formu</h2>
						</header>
						<?php
							endif;
						?>
						</section>

					</div>
				</section>

		<!-- Footer -->
		<?php
			include("footer.php");
		?>
		<!-- Scripts -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="assets/js/prodaja.js"></script>
			<script src="assets/js/header.js"></script>		
	</body>
</html>