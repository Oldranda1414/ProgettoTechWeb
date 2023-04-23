const button = document.querySelector(".w-25.btn.btn-sm.bg-1");
const form = document.querySelector(".form-control.me-2.bg-4");

function reactiveButton(){
    let p=false;
    p = form.value.length===0;
    button.disabled = p;
}

window.onload = function () {
    button.disabled = true;
}

form.addEventListener("keyup", () => {
    reactiveButton();
});