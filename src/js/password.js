const password = document.querySelectorAll(".password");

function showhidePassword() {
    let pl=password.length;
    if(pl>=2){
        pl--;
    }
    for(let j=0; j<pl; j++){
        if (password[j].type === "password") {
            password[j].type = "text";
        } else {
            password[j].type = "password";
        }
    }
}