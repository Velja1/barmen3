<?php
function unosKorisnika($ime,$prezime,$email,$username,$sifrovanPassword,$idUloga){
    global $conn;
    $upit = "INSERT INTO korisnici(ime, prezime, email, username, sifra, id_uloga) VALUES (:ime, :prezime, :email, :username, :sifra, :idUloga)";

    $priprema = $conn->prepare($upit);
    $priprema->bindParam(':ime', $ime);
    $priprema->bindParam(':prezime', $prezime);
    $priprema->bindParam(':email', $email);
    $priprema->bindParam(':username', $username);
    $priprema->bindParam(':sifra', $sifrovanPassword);
    $priprema->bindParam(':idUloga', $idUloga);

    $rezultat = $priprema->execute();
    return $rezultat;
}

include "connection.php";
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        

        try{
            $ime = $_POST['tbIme'];
            $prezime = $_POST['tbPrezime'];
            $email = $_POST['tbEmail'];
            $username = $_POST['tbUsername'];
            $password = $_POST['tbPassword'];

            

            $greske=0;

            if($ime==""){
                $greske++;
            }
            if($prezime==""){
                $greske++;
            }
            if($email==""){
                $greske++;
            }
            if(!preg_match("/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/",$ime)){
                $greske++;
            }
            if(!preg_match("/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/",$prezime)){
                $greske++;
            }
            if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/",$email)){
                $greske++;
            }
            if(strlen($username)>50){
                $greske++;
            }
            if(strlen($password)>50){
                $greske++;
            }
            if($greske != 0){
                header('Location: registracija.php?greskeKlijent=1');
                die;
            }

            $sifrovanPassword = md5($password);
            $idUloga = 2;
            if($greske==0){
                $unosKorisnika=unosKorisnika($ime,$prezime,$email,$username,$sifrovanPassword,$idUloga);
            }
            if($unosKorisnika){
                header('Location: registracija.php?uspeh=1');
                die;
            }
            else{
                header("Location: registracija.php?greskeServer=1");
                die;
            }

            http_response_code(201);
  
        }
        catch(PDOException $exception){
            header("Location: registracija.php?greskeServer=1");
            die;
            http_response_code(500);
        }
    }
    else{
        http_response_code(404);
    }
?>