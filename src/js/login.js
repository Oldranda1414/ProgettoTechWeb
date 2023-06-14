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

button.addEventListener("click", ()=>{
    formhash(document.getElementById("form"), form[1]);
});

function formhash(form, password) {
    // Crea un elemento di input che verrà usato come campo di output per la password criptata.
    var p = document.createElement("input");
    // Aggiungi un nuovo elemento al tuo form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden"
    p.value = hex_sha512(password.value);
    // Assicurati che la password non venga inviata in chiaro.
    password.value = "";
    // Come ultimo passaggio, esegui il 'submit' del form.
    form.submit();
 }