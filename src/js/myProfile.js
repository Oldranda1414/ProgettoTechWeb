const button = document.querySelector(".changePswd");
const opass = document.querySelector(".oldpass");
const npass = document.querySelector(".newpass");
const nrpass = document.querySelector(".newRpass");
const oldpass = document.querySelector(".opass");
const pass = document.querySelector(".pass");
const rpass = document.querySelector(".Rpass");

function reactiveButton(){
    let p=false;
    p = p || checkPassword() || validatePassword() || checkDifferentPassword();
    button.disabled = p;
}

function checkPassword(){
    let p=true;
    if (nrpass.value === npass.value && !validatePassword()){
        p=false;
    }
    if (p==false){
        rpass.textContent="";
    } else {
        rpass.textContent="Reinserire la nuova password per conferma";
    }
    return p;
}

function checkDifferentPassword(){
    let p=false;
    if (opass.value === npass.value && opass.value.length>0 && npass.value.length>0){
        p=true;
    }
    if (p==false && opass.value.length>0){
        oldpass.textContent="";
    } else if(p==false && opass.value.length===0) {
        oldpass.textContent = "Inserire la vecchia password";
    }
    return p;
}

function validatePassword(){
    let p=true;
    const testPsw = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
    const password = npass.value;
    if (testPsw.test(password)){
        p=false;
    }
    if (p==false && !checkDifferentPassword()){
        pass.textContent="";
    } else if (p==false && checkDifferentPassword()) {
        pass.textContent="Inserire una password nuova e diversa dalla precedente";
    } else {
        pass.textContent="Inserire una nuova password sicura";
    }
    return p;
}

window.onload = function () {
    button.disabled = true;
    oldpass.textContent = "Inserire la vecchia password"
    pass.textContent = "Inserire una nuova password sicura";
    rpass.textContent = "Reinserire la nuova password per conferma";
}

npass.addEventListener("keyup", () => {
    reactiveButton();
    checkDifferentPassword();
    validatePassword();
    checkPassword();
});
nrpass.addEventListener("keyup", () => {
    reactiveButton();
    validatePassword();
    checkPassword();
    checkDifferentPassword();
});
opass.addEventListener("keyup", () => {
    reactiveButton();
    checkDifferentPassword();
    checkPassword();
    validatePassword();
});


button.addEventListener("onclick", ()=>{
    multipleFormhash(this.form, this.form.oldPassword, this.form.newPassword, this.form.newRepeatedPassword);
});

function multipleFormhash(form, password, newPassword, newRPassword){
    //cripts new password for usage (code is the same as formhash())
    // Crea un elemento di input che verrà usato come campo di output per la password criptata.
    var newp = document.createElement("input");
    // Aggiungi un nuovo elemento al tuo form.
    form.appendChild(newp);
    newp.name = "newp";
    newp.type = "hidden"
    newp.value = hex_sha512(newPassword.value);
    // Assicurati che la password non venga inviata in chiaro.
    newPassword.value = "";
    //cripts old password in usual way
    // Crea un elemento di input che verrà usato come campo di output per la password criptata.
    var p = document.createElement("input");
    // Aggiungi un nuovo elemento al tuo form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden"
    p.value = hex_sha512(password.value);
    // Assicurati che la password non venga inviata in chiaro.
    password.value = "";
    newRPassword = "";
    // Come ultimo passaggio, esegui il 'submit' del form.
    form.submit();
}