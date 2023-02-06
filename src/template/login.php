<form action="#" method="POST">
    <p class="h1 text-center">Benvenuto su Life&Games</p>
    <img class="mb-4" src="./images/gamepad_logo.png" alt="" width="200">
    <h1 class="h3 mb-3 fw-normal">Effettua il login</h1>

    <div class="form-floating">
        <input type="text" class="form-control" id="floatingText" placeholder="name" name = "username">
        <label for="floatingText">Utente</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name = "password">
        <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
        <label for="rememberMeCheckbox">
            <input type="checkbox" value="remember-me" id="rememberMeCheckbox"> Ricordami
        </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Accedi</button>
    <p class="mt-3 mb-2 text-muted">Oppure <a href="register.html">registrati ora</a>.</p>
</form>