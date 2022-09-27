<?php
    session_start();
    include("connection.php");

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        try{
            $proizvodjacId=$_POST['proizvodjacId'];
            $tipId=$_POST['tipId'];
            $model=$_POST['model'];
            $cena=$_POST['cena'];
            $duzina=$_POST['duzina'];
            $sirina=$_POST['sirina'];
            $tezina=$_POST['tezina'];
            $kapacitetRezervoara=$_POST['kapacitetRezervoara'];
            $opis=$_POST['opis'];

            global $conn;
            $upit="INSERT INTO plovila (id_tip, id_proizvodjac, model, cena, duzina, sirina, tezina, kapacitetRezervoara, opis) VALUES (:id_tip, :id_proizvodjac, :model, :cena, :duzina, :sirina, :tezina, :kapacitetRezervoara, :opis)";
            $priprema=$conn->prepare($upit);

            $priprema->bindParam(':id_tip',$tipId);
            $priprema->bindParam(':id_proizvodjac',$proizvodjacId);
            $priprema->bindParam(':model',$model);
            $priprema->bindParam(':cena',$cena);
            $priprema->bindParam(':duzina',$duzina);
            $priprema->bindParam(':sirina',$sirina);
            $priprema->bindParam(':tezina',$tezina);
            $priprema->bindParam(':kapacitetRezervoara',$kapacitetRezervoara);
            $priprema->bindParam(':opis',$opis);

            $rezultat=$priprema->execute();
            if($rezultat){
                $odgovor=["poruka"=>"Uspesno uneto plovilo"];
                echo json_encode($odgovor);
                http_response_code(201);
            }
        }

        catch(PDOException $exception){
            http_response_code(500);
        }
    }
    else{
        http_response_code(404);
    }
?>