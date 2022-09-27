<?php
session_start();
function proveraKorisnika($username,$sifrovanPassword){
    global $conn;
    $upit = "SELECT * FROM korisnici k JOIN uloga u ON k.id_uloga = u.id_uloga WHERE k.username = :username AND k.sifra = :sifra";

    $priprema = $conn->prepare($upit);
    $priprema->bindParam(':username', $username);
    $priprema->bindParam(':sifra', $sifrovanPassword);

    $priprema->execute();
    $rezultat=$priprema->fetch();
    return $rezultat;
}

include "connection.php";
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        

        try{
            $username = $_POST['tbUsername'];
            $password = $_POST['tbPassword'];

            

            $greske=0;

            if(strlen($username)>50){
                $greske++;
            }
            if(strlen($password)>50){
                $greske++;
            }
            if($greske != 0){
                header('Location: logovanje.php?greskeKlijent=1');
                die;
            }

            $sifrovanPassword = md5($password);
            $idUloga = 2;
            if($greske==0){
                $korisnik=proveraKorisnika($username,$sifrovanPassword);
            }
            if($korisnik){
                $_SESSION['korisnik'] = $korisnik;
                header('Location: logovanje.php');
                die;
            }
            else{
                header("Location: logovanje.php?greskeServer=1");
                die;
            }

            http_response_code(201);
  
        }
        catch(PDOException $exception){
            header("Location: logovanje.php?greskeServer=1");
                die;
            http_response_code(500);
        }
    }
    else{
        http_response_code(404);
    }
?>