<?php
include("connection.php");
    $plovilo=$_POST['izabranoPlovilo'];

    global $conn;
	$upit="SELECT * FROM plovila WHERE id_plovila=".$plovilo;
	$podaci=$conn->query($upit)->fetch();

    $odgovor=json_encode($podaci);
    echo $odgovor;
?>