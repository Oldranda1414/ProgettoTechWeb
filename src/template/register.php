<!doctype html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="signinup page">
  <title>Life&Games - Registrazione</title>

  <link href="./bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/css/bootstrap.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
  </script>
  <link rel="stylesheet" href="./css/style.css">

  <!-- riferimento allo stile css personalizzato del form -->
  <link href="./css/signup.css" rel="stylesheet">
</head>

<body class="text-center bg-1">
  <main class="form-signin w-100 m-auto">
    <?php
    //TODO modificare la pagina se la registrazione è riuscita o meno
    if (isset($templateParams["registrationResult"])) {
      if ($templateParams["registrationResult"]) {
        echo "EVVIVA, REGISTRAZIONE AVVENUTA";
      }
    }
    ?>
    <form action="#" method="POST">
      <p class="h1 text-center">Entra a far parte della community di Life&Games!</p>
      <img class="mb-4" src="<?php echo UPLOAD_DIR."gamepad_logo.png"?>" alt="life and games logo" width="200">
      <h1 class="h3 mb-2 fw-normal">Iscriviti</h1>
      <h2 class="h5 mb-3 fw-normal">compilando i campi qui sotto</h2>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingText" placeholder="name" name="username">
        <label for="floatingText">Nome utente</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" name="email">
        <label for="floatingEmail">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control middleForm" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control lastForm" id="floatingRPassword" placeholder="Password" name="verificaPassword">
        <label for="floatingRPassword">Verifica password</label>
      </div>

      <p class="text-center user">...</p>
      <p class="text-center mail">...</p>
      <p class="text-center pass">...</p>
      <p class="text-center Rpass">...</p>
      <?php if(isset($templateParams["registerError"])): ?>
      <p class="">
        <p class="text-center text-danger login-error-label mx-2">
          <u>
            <img src="./upload/icons/alert.png" class="alert-icon img-fluid me-2" alt="alert icon"><?php echo $templateParams["registerError"]; ?>
          </u>
        </p>
      </p>
      <?php endif ?>
      
      <!--
      <div class="g-recaptcha mb-2" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW">j</div>
        -->
      <button class="w-100 btn btn-lg btn-primary" type="submit" onclick="formhash(this.form, this.form.password)">Registrati</button>
      
      <p class="mt-3 mb-2 text-muted">Già iscritto? <a href="login.php">Accedi ora</a>.</p>
    </form>
  </main>


  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>