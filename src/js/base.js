$(document).ready(function(){
    $('.toast').toast('show');
  });
  
const submitbutton = document.querySelector(".btn.btn-info.submitpost");
const tag = document.querySelector(".form-control.me-2.bg-4.mb-2.tag");
const message = document.querySelector(".wrongcharactersintag");

function disableButton(){
  if (tag.value.includes('&') || tag.value.includes('_')){
    submitbutton.disabled=true;
    message.textContent="Non inserire i caratteri & e _ all'interno del tag";
  } else {
    submitbutton.disabled=false;
    message.textContent="";
  }
}

window.onload = function() {
  message.textContent="";
  submitbutton.disabled=false;
}

tag.addEventListener("keyup", () => {
  disableButton();
});
