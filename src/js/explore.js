const button = document.querySelector(".w-25.btn.btn-sm.bg-1");
const form = document.querySelector(".search");

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