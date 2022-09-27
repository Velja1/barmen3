function proveraLog(){
    let username, password, validno;
    username = $('#tbUsername').val();
    password = $('#tbPassword').val();
    validno = true;

    let reImePrezime, reEmail;
    reImePrezime=/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;
    reEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

    let userGreska, passGreska;
    userGreska=document.getElementById("userGreska");
    passGreska=document.getElementById("passGreska");

    if (username == ""){
        validno = false;
        userGreska.innerHTML = "Molimo unesite username";
    }
    else if (username.length>50){
            validno = false;
            userGreska.innerHTML = "Username je predugacak";
    }
    else{
        userGreska.innerHTML = "";
    }
    if (password == ""){
        validno = false;
        passGreska.innerHTML = "Molimo unesite password";
    }
    else if (password.length>50){
            validno = false;
            passGreska.innerHTML = "Password je predugacak";
    }
    else{
        passGreska.innerHTML = "";
    }

    if(validno){
        return true;
    }
    else{
        return false;
    }
}

