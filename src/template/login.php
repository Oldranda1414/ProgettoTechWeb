<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="login page">
    <title>Life&Games - Accesso</title>
    <link rel="icon" href="upload/favicon.ico" type="image/ico">
    <link href="./bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./html/css/style.css">
    <link rel="stylesheet" href="./css/style.css">
    <!-- riferimento allo stile css personalizzato del form -->
    <link href="./css/signin.css" rel="stylesheet">
</head>

<body class="text-center bg-1">

    <main class="form-signin w-100 m-auto">
        <form action="#" method="POST" id="form">
            <p class="h1 text-center">Benvenuto su Life&Games</p>
            <img class="mb-4" src="<?php echo UPLOAD_DIR . "gamepad_logo.png" ?>" alt="life and games logo" width="200">
            <h1 class="h3 mb-3 fw-normal">Effettua il login</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingText" placeholder="name" name="username">
                <label for="floatingText">Utente</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label for="rememberMeCheckbox">
                    <input type="checkbox" value="remember-me" id="rememberMeCheckbox" name="rememberMeCheckbox">
                    Ricordami
                </label>
            </div>
            <p class="text-center change"> </p>
            <p class=""><?php echo isset($templateParams["loginError"]) ? $templateParams["loginError"] : ""; ?></p>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Accedi</button>
            <p class="mt-3 mb-2 text-muted">Oppure <a href="register.php">registrati ora</a>.</p>
        </form>
    </main>



</body>

</html>