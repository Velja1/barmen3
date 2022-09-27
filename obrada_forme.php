<?php
    if($_POST["btnPosalji"]){
        $ime=$_POST["tbIme"];
        $prezime=$_POST["tbPrezime"];
        $brojTelefona=$_POST["tbBroj"];
        $email=$_POST["tbEmail"];
        $datum=$_POST["tbDatum"];
        $plovilo=$_POST["selectPlovilo"];
        $novosti=$_POST["rbNovosti"];
        $nizNovosti = ["Da", "Ne"];

        $greske=0;

        if($ime==""){
            $greske++;
        }
        if($prezime==""){
            $greske++;
        }
        if($brojTelefona==""){
            $greske++;
        }
        if($email==""){
            $greske++;
        }
        if($datum==""){
            $greske++;
        }
        if(!preg_match("/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/",$ime)){
            $greske++;
        }
        if(!preg_match("/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/",$prezime)){
            $greske++;
        }
        if(!preg_match("/^06[01234569]\/[\d]{3}\-[\d]{3,4}$/",$brojTelefona)){
            $greske++;
        }
        if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/",$email)){
            $greske++;
        }
        if(!preg_match("/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/",$datum)){
            $greske++;
        }
        if($plovilo=="0"){
            $greske++;
        }
        if(!in_array($novosti, $nizNovosti)){
            $greske++;
        }
        if(!isset($_POST["cbUslovi"])){
            $greske++;
        }

        if($greske != 0){
            header('Location: prodaja.php?greskeKlijent=1');
        }
        else{
            if(1){
                header("Location: prodaja.php?uspeh=1");
            }
            else{
                header("Location: prodaja.php?greskeServer=1");
            }
        }
    }
    else{
        header('Location: prodaja.php');
    }
    