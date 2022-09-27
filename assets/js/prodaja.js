//Efekat zebre na tabeli
$(document).ready(function(){
    $('#tabela tbody tr:even').css('background-color','#dddddd');
    
    $('#tabela tbody tr:odd').hover(function(){
        $(this).css('background-color','#f0f0f0');
    },
    function(){
        $(this).css('background-color','#fff');
    });
});

//Provera forme
try{
    document.getElementById("btnPosalji").addEventListener("click", provera);
}
catch{
}

function provera(){
    let validno=true;
    
    let ime, prezime, brojTelefona, email, datum, plovilo, novosti, dodatniZahtevi, uslovi;
    ime=document.getElementById("tbIme").value.trim();
    prezime=document.getElementById("tbPrezime").value.trim();
    brojTelefona=document.getElementById("tbBroj").value.trim();
    email=document.getElementById("tbEmail").value.trim();
    datum=document.getElementById("tbDatum").value.trim();
    plovilo=document.getElementById("selectPlovilo").value;
    novosti=document.getElementsByName("rbNovosti");
    dodatniZahtevi=document.getElementById("tbDodatni").value.trim();
    uslovi=document.getElementById("cbUslovi");

    let reImePrezime, reBroj, reEmail, reDatum;
    reImePrezime=/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;
    reBroj=/^06[01234569]\/[\d]{3}\-[\d]{3,4}$/;
    reEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    reDatum=/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/;

    let imeGreska, prezimeGreska, brojGreska, emailGreska, datumGreska, ploviloGreska, novostiGreska, dodatniZahteviGreska, usloviGreska;
    imeGreska=document.getElementById("imeGreska");
    prezimeGreska=document.getElementById("prezimeGreska");
    brojGreska=document.getElementById("brojGreska");
    emailGreska=document.getElementById("emailGreska");
    datumGreska=document.getElementById("datumGreska");
    ploviloGreska=document.getElementById("ploviloGreska");
    novostiGreska=document.getElementById("novostiGreska");
    dodatniZahteviGreska=document.getElementById("dodatniGreska");
    usloviGreska=document.getElementById("usloviGreska");

    if (ime == ""){
        validno = false;
        imeGreska.innerHTML = "Molimo unesite ime";
    }
    else if (!reImePrezime.test(ime)){
            validno = false;
            imeGreska.innerHTML = "Ime nije u ispravnom formatu";
    }
    else{
            imeGreska.innerHTML = "";
    }

    if (prezime == ""){
        validno = false;
        prezimeGreska.innerHTML = "Molimo unesite prezime";
    }
    else if (!reImePrezime.test(prezime)){
            validno = false;
            prezimeGreska.innerHTML = "Prezime nije u ispravnom formatu";
    }
    else{
        prezimeGreska.innerHTML = "";
    }

    if (brojTelefona == ""){
        validno = false;
        brojGreska.innerHTML = "Molimo unesite broj telefona";
    }
    else if (!reBroj.test(brojTelefona)){
            validno = false;
            brojGreska.innerHTML = "Broj telefona nije u ispravnom formatu";
    }
    else{
        brojGreska.innerHTML = "";
    }

    if (email == ""){
        validno = false;
        emailGreska.innerHTML = "Molimo unesite email";
    }
    else if (!reEmail.test(email)){
            validno = false;
            emailGreska.innerHTML = "Email nije u ispravnom formatu";
    }
    else{
        emailGreska.innerHTML = "";
    }

    if (datum == ""){
        validno = false;
        datumGreska.innerHTML = "Molimo unesite datum posete";
    }
    else if (!reDatum.test(datum)){
            validno = false;
            datumGreska.innerHTML = "Datum posete nije u ispravnom formatu";
    }
    else{
        datumGreska.innerHTML = "";
    }

    if(plovilo == "0"){
        validno = false;
        ploviloGreska.innerHTML = "Niste izabrali plovilo";
    }
    else{
        ploviloGreska.innerHTML = "";
    }


    let novostiIzbor = "";
    for(let i=0;i<novosti.length;i++){
        if(novosti[i].checked){
            novostiIzbor = novosti[i].value;
            break;
        }
    }

    if(novostiIzbor == ""){
        validno = false;
        novostiGreska.innerHTML = "Niste izabrali novosti";
    }
    else{
        novostiGreska.innerHTML = "";
    }

    if (dodatniZahtevi.length>1000){
        validno = false;
        dodatniZahteviGreska.innerHTML = "Maksimalan broj karaktera je 1000";
    }
    else{
        dodatniZahteviGreska.innerHTML = "";
    }

    if(!uslovi.checked){
        validno = false;
        usloviGreska.innerHTML = "Morate čekirati uslove korišćenja";
    }
    else{
        usloviGreska.innerHTML = "";
    }
    if(validno){
        return true;
    }
    else{
        return false;
    }
}