function multipleFormhash(form, password, newPassword){
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
    // Come ultimo passaggio, esegui il 'submit' del form.
    form.submit();
}