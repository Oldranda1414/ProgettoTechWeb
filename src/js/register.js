const button = document.querySelector("button");
const form = document.querySelectorAll(".form-control");
const user = document.querySelector(".user");
const mail = document.querySelector(".mail");
const pass = document.querySelector(".pass");
const rpass = document.querySelector(".Rpass");

function reactiveButton(){
    let p=false;
    for(let j=0; j<form.length; j++){
        p = p || form[j].value.length===0;
    }
    p = p || checkUser() || checkMail() || checkPassword() || validatePassword();
    button.disabled = p;
}

function checkPassword(){
    let p=true;
    if (document.querySelector(".form-control.lastForm").value === document.querySelector(".form-control.middleForm").value && !validatePassword()){
        p=false;
    }
    if (p==false){
        rpass.textContent="";
    } else {
        rpass.textContent="Reinserire la password per conferma";
    }
    return p;
}

function validatePassword(){
    let p=true;
    const testPsw = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
    const password = document.querySelector(".form-control.middleForm").value;
    if (testPsw.test(password)){
        p=false;
    }
    if (p==false){
        pass.textContent="";
    } else {
        pass.textContent="Inserire una password sicura";
    }
    return p;
}

function checkMail(){
    let p=true;
    const test = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/gi;
    if(test.test(document.getElementById("floatingEmail").value)){
        p=false;
    }
    if (p==false){
        mail.textContent="";
    } else {
        mail.textContent="Inserire un indirizzo mail";
    }
    return p;
}

function checkUser(){
    let p=true;
    if (document.getElementById("floatingText").value.length>0){
        p=false;
    }
    if (p==false){
        user.textContent="";
    } else {
        user.textContent="Inserire un username";
    }
    return p;
}

window.onload = function () {
    button.disabled = true;
    user.textContent = "Inserire un username";
    mail.textContent = "Inserire un indirizzo mail";
    pass.textContent = "Inserire una password sicura";
    rpass.textContent = "Reinserire la password per conferma";
}

for(let i=0; i<form.length; i++){
    form[i].addEventListener("keyup", () => {
        reactiveButton();
        checkUser();
        checkMail();
        validatePassword();
        checkPassword();
    });
}