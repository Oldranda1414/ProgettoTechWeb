<!doctype html>
<html lang="it">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="home page">
	<title>Life&Games - Home</title>
	<link href="./bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/css/bootstrap.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-1">
	<nav class="navbar navbar-expand-lg bg-2">
		<div class="container-fluid">
			<a class="navbar-brand" href="./home.html">
				<img src= "<?php echo UPLOAD_DIR."gamepad_logo.png"?>" alt="Logo" width="38" height="24"
					class="d-inline-block align-text-top">
				Life&Games
			</a>
			<div class="d-flex flex-row order-2 order-lg-3">
				<ul class="navbar-nav flex-row px-4">
					<li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#notificationModal"><img src="./upload/icons/bell2.png" height="30" alt="notification bell button"><sup class="notification-number">3</sup></a></li>
				</ul>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse order-3 order-lg-2" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-link active" aria-current="page" href="home.html">Home</a>
					<a class="nav-link" href="explore.html">Esplora</a>
					<a class="nav-link" href="myprofile.html">Mio profilo</a>
					<a class="nav-link" href="settings.html">Impostazioni</a>
					<a class="nav-link" href="index.html">Esci</a>
					
				</div>
			</div>
		</div>
	</nav>

	<main>
		<?php
    		if(isset($templateParams["nome"])){
        		require($templateParams["nome"]);
			}	
    	?>
	</main>

	<?php
		if(isset($templateParams["js"])):
			foreach($templateParams["js"] as $script):
		?>
			<script src="<?php echo $script; ?>"></script>
		<?php
			endforeach;
		endif;
	?>
</body>

</html>