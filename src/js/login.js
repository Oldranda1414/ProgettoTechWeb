const button = document.querySelector("button");
const form = document.querySelectorAll(".form-control");

function reactiveButton(){
    let p=false;
    for(let j=0; j<form.length; j++){
        p = p || form[j].value.length===0;
    }
    button.disabled = p;
}

window.onload = function () {
    button.disabled = true;
}

for(let i=0; i<form.length; i++){
    form[i].addEventListener("keyup", () => {
        reactiveButton();
    });
}