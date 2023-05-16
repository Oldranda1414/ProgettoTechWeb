<div class="container fascia-profilo pt-3 pb-5">
		<div class="text-center display-3 text-1 mb-3">SCHEDA PROFILO</div>
		<div class="row justify-content-center">
			<div class="scheda-profilo mx-5 rounded col col-lg-9 justify-content-md-center">
				<div class="row justify-content-md-center text-center">
					<div class="col-12 col-lg-3 mb-2">
						<div class="profile-schede-title"><?php echo $templateParams["user"]["Username"]?></div>
						<img src="<?php echo UPLOAD_DIR."profiles/".$templateParams["user"]["Profile_img"] ?>" class="rounded-circle my-2" alt="profile icon" height="150">
						<p><?php echo $templateParams["user"]["E_mail"] ?></p>
						<p>Iscritto dal <em>/*TODO AGGIUNGERE LA DATA DI ISCRIZIONE O TOGLIERE*/</em></p>
					</div>
					<div class="col col-lg-3">
						<div class="profile-schede-title">Informazioni profilo</div>
						<ul class="list-group">
                          <li class="list-group-item  bg-4">Segui</li>
						  <li class="list-group-item  bg-4" data-bs-toggle="modal" data-bs-target="#likesModal">I suoi <em>Mi piace</em></li>
						  <li class="list-group-item  bg-4" data-bs-toggle="modal" data-bs-target="#commentsModal">I suoi commenti</li>
						  <li class="list-group-item  bg-4" data-bs-toggle="modal" data-bs-target="#followedModal">Seguiti</li>
						  <li class="list-group-item  bg-4" data-bs-toggle="modal" data-bs-target="#followerModal">Seguaci</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="container text-center my-3">
		<div class="text-center display-3 text-2 mb-3">I MIEI POST</div>
		<div class="row">
        <?php 
		if(isset($templateParams["posts"])){
			require_once 'posts.php';
		}
		?>
			
        </div>
	</div>

    <div class="modal fade" id="likesModal" tabindex="-1" aria-labelledby="likesModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-3">
				<div class="modal-header">
					<img src="./images/profiles/profile-1.jpg" class="modal-post-img-profile me-2" alt="profile icon"
						height="40">
					<h1 class="modal-title fs-5" id="postModalLabel">I "Mi piace" di <?php echo $templateParams["user"]["Username"]?></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p class="text-muted">
						<img src="./images/profiles/profile-2.jpg" class="modal-post-img-profile me-2"
									alt="post user profile icon" height="40">
						Hai apprezzato il <a href="" class="">post</a> di <a href="" class="nickname-label">Tux9000</a>
					</p>

					<img src="./images/posts/post-example-1.jpg" class="card-img-top rounded miniatura-immagine-post" alt="Post Image">
					
					<p class="post-body text-truncate mt-4 mb-5">
						Guardate cos'è successo! Non ci posso credere, mai vista una cosa del genere... A voi i
						commenti.
					</p>
					<div class="text-end">
						<a href="#" class="btn liked-button m-1 text-right">Mi piace</a>
					</div>
					<hr>
					<p class="text-muted">
						<img src="./images/profiles/profile-2.jpg" class="modal-post-img-profile me-2"
									alt="post user profile icon" height="40">
						Hai apprezzato il <a href="" class="">post</a> di <a href="" class="nickname-label">Tux9000</a>
					</p>

					<img src="./images/posts/post-example-1.jpg" class="card-img-top rounded miniatura-immagine-post" alt="Post Image">
					
					<p class="post-body text-truncate mt-4 mb-5">
						Guardate cos'è successo! Non ci posso credere, mai vista una cosa del genere... A voi i
						commenti.
					</p>
					
					<div class="text-end">
						<a href="#" class="btn liked-button m-1 text-right">Mi piace</a>
					</div>

					<hr>
					<p class="text-muted">
						<img src="./images/profiles/profile-2.jpg" class="modal-post-img-profile me-2"
									alt="post user profile icon" height="40">
						Hai apprezzato il <a href="" class="">post</a> di <a href="" class="nickname-label">Tux9000</a>
					</p>

					<img src="./images/posts/post-example-1.jpg" class="card-img-top rounded miniatura-immagine-post" alt="Post Image">
					
					<p class="post-body text-truncate mt-4 mb-5">
						Guardate cos'è successo! Non ci posso credere, mai vista una cosa del genere... A voi i
						commenti.
					</p>
					
					<div class="text-end">
						<a href="#" class="btn liked-button m-1 text-right">Mi piace</a>
					</div>
					<hr>
					<div class="row justify-content-center">
						<a href="#" class="btn upload-button m-1">Carica altro...</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	
	<div class="modal fade" id="commentsModal" tabindex="-1" aria-labelledby="commentsModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-3">
				<div class="modal-header">
					<img src="<?php echo UPLOAD_DIR."profiles/".$templateParams["user"]["Profile_img"] ?>" class="modal-post-img-profile me-2" alt="profile icon"
						height="40">
					<h1 class="modal-title fs-5" id="postModalLabel">Tutti i commenti di <?php echo $templateParams["user"]["Username"]?></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<?php foreach($templateParams["comments"] as $comment): ?>
					<p class="text-muted">
						<img src="<?php echo UPLOAD_DIR . "profiles/" . $comment["Poster_img"] ?>"
									alt="post user profile icon" height="40">
						Nel <a href="" class="">post</a> di <a href="profile.php?Username=<?php $comment["Poster_Username"] ?>" class="nickname-label"><?php echo $comment["Poster_Username"] ?></a>
					</p>

					<img src="<?php echo UPLOAD_DIR . "posts/" . $comment["Post_img"] ?>" class="card-img-top rounded miniatura-immagine-post" alt="Post Image">
					
					<p class="post-body text-truncate mt-4 mb-5">
					<?php echo $comment["Post_Words"] ?>
					</p>
					
					<img src="<?php echo UPLOAD_DIR . "profiles/" . $templateParams["user"]["Profile_img"] ?>" class="modal-post-img-profile me-2" alt="profile icon" height="40">
									<img src="<?php echo UPLOAD_DIR ?>/icons/trash.png" class="me-2 text-right" alt="delete comment icon" height="20">
									<?php echo $templateParams["user"]["Username"] ?></em></a>, il <?php echo date("d-m-y" ,strtotime($comment["DT"]))." alle ".date("h:i:s" ,strtotime($comment["DT"]))?>
									ha commentato:
							</p>
							<p class="text-post-comment"> 
							<?php echo $comment["Words"] ?>
							</p>

					<hr>
					<?php endforeach; ?>
					<div class="row justify-content-center">
						<a href="#" class="btn upload-button m-1">Carica altro...</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	
	<div class="modal fade" id="followedModal" tabindex="-1" aria-labelledby="followedModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-3">
				<div class="modal-header">
					<img src="./images/profiles/profile-1.jpg" class="modal-post-img-profile me-2" alt="profile icon"
						height="40">
					<h1 class="modal-title fs-5" id="postModalLabel">Le persone seguite da <?php echo $templateParams["user"]["Username"]?></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row justify-content-center">
						<?php foreach($templateParams["followed"] as $followedUser): ?>
						<div class="col-3 mx-2 mb-4">
							<a href="profile.php?Username=<?php echo $followedUser["Username"] ?>" class="username-link">
								<p class="text-center"><?php echo $followedUser["Username"] ?></p>
								<img src="<?php echo UPLOAD_DIR . "profiles/" . $followedUser["Profile_img"] ?>" class="rounded-circle mb-2 follow-list-icon" alt="profile followed icon" height="100">
							</a>
						</div>
						<?php endforeach; ?>
					</div>
					<hr>
					<div class="row justify-content-center">
						<a href="#" class="btn upload-button m-1">Carica altro...</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	
	
	<div class="modal fade" id="followerModal" tabindex="-1" aria-labelledby="followerModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-3">
				<div class="modal-header">
					<img src="./images/profiles/profile-1.jpg" class="modal-post-img-profile me-2" alt="profile icon"
						height="40">
					<h1 class="modal-title fs-5" id="postModalLabel">Le persone che seguono <?php echo $templateParams["user"]["Username"]?></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row justify-content-center">
					<?php foreach($templateParams["followers"] as $followerUser): ?>
						<div class="col-3 mx-2 mb-4">
							<a href="profile.php?Username=<?php echo $followerUser["Username"] ?>" class="username-link">
								<p class="text-center"><?php echo $followerUser["Username"] ?></p>
								<img src="<?php echo UPLOAD_DIR . "profiles/" . $followerUser["Profile_img"] ?>" class="rounded-circle mb-2 follow-list-icon" alt="profile followed icon" height="100">
							</a>
						</div>
						<?php endforeach; ?>
					</div>
					<hr>
					<div class="row justify-content-center">
						<a href="#" class="btn upload-button m-1">Carica altro...</a>
					</div>
				</div>

			</div>
		</div>
	</div>