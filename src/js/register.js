const button = document.querySelector("button");
const form = document.querySelectorAll(".form-control");

function reactiveButton(){
    let p=false;
    for(let j=0; j<form.length; j++){
        p = p || form[j].value.length===0;
    }
    p = p || checkMail() || checkPassword() || validatePassword();
    button.disabled = p;
}

function checkPassword(){
    let p=true;
    if (document.querySelector(".form-control.lastForm").value === document.querySelector(".form-control.middleForm").value){
        p=false;
    }
    return p;
}

function validatePassword(){
    let p=false;
    const testPsw = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
    const password = document.querySelector(".form-control.middleForm");
    if (testPsw.test(password)){
        p=true;
    }
    return p;
}

function checkMail(){
    let p=true;
    const test = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/gi;
    if(test.test(document.getElementById("floatingEmail").value)){
        p=false;
    }
    return p;
}

window.onload = function () {
    button.disabled = true;
}

for(let i=0; i<form.length; i++){
    form[i].addEventListener("keyup", () => {
        reactiveButton();
    });
}