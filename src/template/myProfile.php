<?php if (isset($templateParams["titolo_pagina"])) : ?>
	<h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif; ?>

<div class="container fascia-profilo pt-3 pb-5">

	<?php if (isset($templateParams["errorToast"])) {
		require "errorToast.php";
	} ?>


	<?php if (isset($templateParams["successWords"])) {
		require "successToast.php";
	} ?>

	<div class="text-center display-3 text-1 mb-3">IL MIO PROFILO</div>
	<div class="row justify-content-center">
		<div class="scheda-profilo mx-5 rounded col col-lg-9 justify-content-md-center">
			<div class="row justify-content-md-center text-center">
				<div class="col-12 col-lg-3 mb-2">
					<div class="profile-schede-title"><?php echo $templateParams["user"]["Username"] ?></div>
					<img src="<?php echo UPLOAD_DIR . "profiles/" . $templateParams["user"]["Profile_img"] ?>" class="rounded-circle my-2" alt="profile icon" height="150" width="150" style="object-fit: cover;">
					<p class="small"><em><?php echo $templateParams["user"]["E_mail"] ?></em></p>
					<p>Iscritto dal <em><?php echo date("d-m-y", strtotime($templateParams["user"]["DT"])); ?></em></p>
				</div>
				<div class="col col-lg-3">
					<div class="profile-schede-title">Informazioni profilo</div>
					<ul class="list-group">
						<li class="list-group-item  bg-4" data-bs-toggle="modal" data-bs-target="#changeImageProfileModal">Cambia foto profilo</li>
						<li class="list-group-item  bg-4" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Cambia password</li>
						<li class="list-group-item  bg-4" data-bs-toggle="modal" data-bs-target="#likesModal">I miei <em>Mi piace</em></li>
						<li class="list-group-item  bg-4" data-bs-toggle="modal" data-bs-target="#commentsModal">I miei commenti</li>
						<li class="list-group-item  bg-4" data-bs-toggle="modal" data-bs-target="#myFollowedModal">Le persone che seguo</li>
						<li class="list-group-item  bg-4" data-bs-toggle="modal" data-bs-target="#myFollowerModal">Chi mi segue</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container my-3">
	<div class="text-center display-3 text-2 mb-3">I MIEI POST</div>
	<div class="row" id="posts">

	</div>
</div>

<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="newPasswordModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content bg-3">
			<div class="modal-header">
				<img src="<?php echo UPLOAD_DIR . "icons/key.png"; ?>" class="me-2" alt="profile icon" height="40">
				<h1 class="modal-title fs-5" id="newPasswordModalLabel">Cambia Password</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="#" method="POST" id="form">
					<div class="modal-body">
						<label for="oldPassword" class="col-form-label" hidden>Password corrente:</label>
						<input class="form-control me-2 bg-4  mb-2 oldpass" type="password" placeholder="Password corrente" aria-label="Password" name="oldPassword" id="oldPassword">
						<label for="newPassword" class="col-form-label">Inserisci la nuova password scelta:</label>
						<input class="form-control me-2 bg-4  mb-2 newpass" type="password" placeholder="Nuova password" aria-label="Password" name="newPassword" id="newPassword">
						<label for="newRepeatedPassword" class="col-form-label">Digitare nuovamente la nuova password:</label>
						<input class="form-control me-2 bg-4  mb-2 newRpass" type="password" placeholder="Nuova password" aria-label="Password" name="newRepeatedPassword" id="newRepeatedPassword">
					</div>
					<p class="text-center opass"> </p>
					<p class="text-center pass"> </p>
					<p class="text-center Rpass"> </p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-info changePswd">Conferma</button>
			</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="changeImageProfileModal" tabindex="-1" aria-labelledby="newImgModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content bg-3">
			<div class="modal-header">
				<img src="<?php echo UPLOAD_DIR . "profiles/" . $templateParams["user"]["Profile_img"] ?>" class="modal-post-img-profile me-2" alt="profile icon" height="40">
				<h1 class="modal-title fs-5" id="newImgModalLabel">Nuova foto profilo</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="#" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<h2 class="fs-5 text-center">
						Carica immagine
					</h2>
					<div class="mb-3">
						<label for="updateProfileImg" class="col-form-label" hidden>Carica immagine:</label>
						<input class="form-control" type="file" id="updateProfileImg" name="updateProfileImg" accept=".jpg,.png">
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-info">Invia</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="likesModal" tabindex="-1" aria-labelledby="likesModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content bg-3">
			<div class="modal-header">
				<img src="<?php echo UPLOAD_DIR . "profiles/" . $templateParams["user"]["Profile_img"] ?>" class="modal-post-img-profile me-2" alt="profile icon" height="40">
				<h1 class="modal-title fs-5" id="likesModalLabel">I miei "Mi piace"</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?php
			if (isset($templateParams["likes"])) {
				require("likes.php");
			}
			?>
		</div>
	</div>
</div>

<div class="modal fade" id="commentsModal" tabindex="-1" aria-labelledby="commentsModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content bg-3">
			<div class="modal-header">
				<img src="<?php echo UPLOAD_DIR . "profiles/" . $templateParams["user"]["Profile_img"] ?>" class="modal-post-img-profile me-2" alt="profile icon" height="40">
				<h1 class="modal-title fs-5" id="commentsModalLabel">I miei commenti</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?php
			if (isset($templateParams["comments"])) {
				require("comments.php");
			}
			?>
		</div>
	</div>
</div>

<div class="modal fade" id="myFollowedModal" tabindex="-1" aria-labelledby="followedModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content bg-3">
			<div class="modal-header">
				<img src="<?php echo UPLOAD_DIR . "profiles/" . $templateParams["user"]["Profile_img"] ?>" class="modal-post-img-profile me-2" alt="profile icon" height="40">
				<h1 class="modal-title fs-5" id="followedModalLabel">Le persone che seguo</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?php
			if (isset($templateParams["followed"])) {
				require("followed.php");
			}
			?>
		</div>
	</div>
</div>


<div class="modal fade" id="myFollowerModal" tabindex="-1" aria-labelledby="followersModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content bg-3">
			<div class="modal-header">
				<img src="<?php echo UPLOAD_DIR . "profiles/" . $templateParams["user"]["Profile_img"] ?>" class="modal-post-img-profile me-2" alt="profile icon" height="40">
				<h1 class="modal-title fs-5" id="followersModalLabel">Le persone che mi seguono</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?php
			if (isset($templateParams["followers"])) {
				require("follower.php");
			}
			?>
		</div>
	</div>
</div>