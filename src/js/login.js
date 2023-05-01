const button = document.querySelector("button");
const form = document.querySelectorAll(".form-control");
const text = document.querySelector(".change");

function reactiveButton(){
    let p=false;
    for(let j=0; j<form.length; j++){
        p = p || form[j].value.length===0;
    }
    button.disabled = p;
    if (p==false){
        text.textContent = ""
    } else {
        text.textContent = "Inserire username e password";
    }
}

window.onload = function () {
    button.disabled = true;
    text.textContent = "Inserire username e password";
    text.style.color = "black";
}

for(let i=0; i<form.length; i++){
    form[i].addEventListener("keyup", () => {
        reactiveButton();
    });
}