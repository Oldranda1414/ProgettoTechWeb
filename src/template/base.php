<?php if ($templateParams["nome"] != "login.php" && $templateParams["nome"] != "register.php") : ?>


	<!doctype html>
	<html lang="it">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="home page">
		<title>Life&Games - <?php echo $templateParams["titolo"] ?></title>
		<link href="./bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/css/bootstrap.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="./css/style.css">
	</head>

	<body class="bg-1">
		<nav class="navbar navbar-expand-lg bg-2">
			<div class="container-fluid">
				<a class="navbar-brand" href="./index.php">
					<img src="<?php echo UPLOAD_DIR . "gamepad_logo.png" ?>" alt="Logo" width="38" height="24" class="d-inline-block align-text-top">
					Life&Games
				</a>
				<div class="d-flex flex-row order-2 order-lg-3">
					<ul class="navbar-nav flex-row px-4">
						<li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#newPostModal"><img src="./upload/icons/add-post.png" height="30" alt="add post icon"></a></li>
						<li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#notificationModal"><img src="./upload/icons/bell2.png" height="30" alt="notification bell button"><sup class="notification-number"><?php echo count($templateParams["notifications"]) ?></sup></a></li>
					</ul>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse order-3 order-lg-2" id="navbarNavAltMarkup">
					<div class="navbar-nav">
						<?php if ($templateParams["nome"] == "index.php" || $templateParams["nome"] == "home.php"):?>
							<a class="nav-link active" aria-current="page" href="index.php">Home</a>
						<?php else: ?>
							<a class="nav-link" href="index.php">Home</a>
						<?php endif ?>
						<?php if ($templateParams["nome"] == "explore.php"):?>
							<a class="nav-link active" aria-current="page" href="explore.php">Esplora</a>
						<?php else: ?>
							<a class="nav-link" href="explore.php">Esplora</a>
						<?php endif ?>
						<?php if ($templateParams["nome"] == "myprofile.php"):?>
							<a class="nav-link active" aria-current="page" href="explore.php">Mio profilo</a>
						<?php else: ?>
							<a class="nav-link" href="myprofile.php">Mio profilo</a>
						<?php endif ?>				
						<a class="nav-link" href="exit.php">Esci</a>

					</div>
				</div>
			</div>
		</nav>

		<div class="modal fade" id="newPostModal" tabindex="-1" aria-labelledby="newPostModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content bg-3">
					<div class="modal-header">
						<img src="<?php echo UPLOAD_DIR."profiles/".$templateParams["user"]["Profile_img"]?>" class="modal-post-img-profile me-2" alt="profile icon" height="40">
						<h1 class="modal-title fs-5" id="postModalLabel">Nuovo post</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="#" method="POST">
						<div class="modal-body">
								<div class="mb-3">
									<input class="form-control me-2 bg-4  mb-2" type="search" placeholder="Inserisci tag..." aria-label="Search" id="tagNewPost" name="tagNewPost">
									<label for="message-text" class="col-form-label">Testo:</label>
									<textarea class="form-control" id="textNewPost" name="textNewPost"maxlength="250"></textarea>
								</div>
							<hr>
							<h2 class="fs-5 text-center">
								Carica immagine
							</h2>
							<div class="mb-3">
								<input class="form-control" type="file" id="fileNewPost" name="fileNewPost" accept=".jpg,.png">
							</div>

						</div>
						<div class="modal-footer">
							<!-- <button type="button" class="btn btn-primary">Mi piace</button> -->
							<button type="submit" class="btn btn-info">Pubblica post</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content bg-5">
					<div class="modal-header">
						<img src="./upload/icons/bell.png" class="modal-post-img-profile me-2" alt="profile icon" height="40">
						<h1 class="modal-title fs-5" id="postModalLabel">Notifiche</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<?php if(isset($templateParams["notifications"])){
						require "notifications.php";
					}
					?>
					<div class="modal-footer">
						<button type="button" class="btn btn-info">Cancella tutto</button>
					</div>
				</div>
			</div>
		</div>
		<main>
			<?php
			if (isset($templateParams["nome"])) {
				require($templateParams["nome"]);
			}
			?>
		</main>
		<?php
		if (isset($templateParams["js"])) :
			foreach ($templateParams["js"] as $script) :
		?>
				<script src="<?php echo $script; ?>"></script>
		<?php
			endforeach;
		endif;
		?>
	</body>

	</html>

<?php else : ?>

	<?php
	if (isset($templateParams["nome"])) {
		require($templateParams["nome"]);
	}
	?>

	<?php
	if (isset($templateParams["js"])) :
		foreach ($templateParams["js"] as $script) :
	?>
			<script src="<?php echo $script; ?>"></script>
	<?php
		endforeach;
	endif;
	?>

<?php endif ?>