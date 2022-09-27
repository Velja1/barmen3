<?php
    session_start();
    include("connection.php");

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        try{
            $korisnik=$_SESSION['korisnik']->id_korisnik;
            $ploviloId=$_POST['ploviloId'];
            $ocena=$_POST['ocena'];
            $objasnjenje=$_POST['objasnjenje'];

            global $conn;
            $upit="INSERT INTO anketa (id_korisnik, id_plovila, ocena, objasnjenje) VALUES (:id_korisnik, :id_plovila, :ocena, :objasnjenje)";
            $priprema=$conn->prepare($upit);

            $priprema->bindParam(':id_korisnik',$korisnik);
            $priprema->bindParam(':id_plovila',$ploviloId);
            $priprema->bindParam(':ocena',$ocena);
            $priprema->bindParam(':objasnjenje',$objasnjenje);

            $rezultat=$priprema->execute();
            if($rezultat){
                $odgovor=["poruka"=>"Uspesno popunjena anketa"];
                echo json_encode($odgovor);
                http_response_code(201);
            }
        }

        catch(PDOException $exception){
            $odgovor=["poruka"=>"Anketa se moze popuniti samo jednom"];
            echo json_encode($odgovor);
            http_response_code(200);
        }
    }
    else{
        http_response_code(404);
    }
?>