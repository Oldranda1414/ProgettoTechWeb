<div class="container fascia-profilo pt-3 pb-5">
		<div class="text-center display-3 text-1 mb-3">SCHEDA PROFILO</div>
		<div class="row justify-content-center">
			<div class="scheda-profilo mx-5 rounded col col-lg-9 justify-content-md-center">
				<div class="row justify-content-md-center text-center">
					<div class="col-12 col-lg-3 mb-2">
						<div class="profile-schede-title"><?php echo $templateParams["searchedUser"]["Username"]?></div>
						<img src="<?php echo UPLOAD_DIR."profiles/".$templateParams["searchedUser"]["Profile_img"] ?>" class="rounded-circle my-2" alt="profile icon" height="150">
						<p class="small italic"><em><?php echo $templateParams["searchedUser"]["E_mail"] ?></em></p>
						<p>Iscritto dal <em><?php echo date("d-m-y" ,strtotime($templateParams["searchedUser"]["DT"])); ?></em></p>
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

    <div class="modal fade" id="likesModal" tabindex="-1" aria-labelledby="likesModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-3">
				<div class="modal-header">
					<img src="<?php echo UPLOAD_DIR."profiles/".$templateParams["searchedUser"]["Profile_img"] ?>" class="modal-post-img-profile me-2" alt="profile icon"
						height="40">
					<h1 class="modal-title fs-5" id="postModalLabel">I "Mi piace" di <?php echo $templateParams["searchedUser"]["Username"]?></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
					if(isset($templateParams["likes"])){
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
					<img src="<?php echo UPLOAD_DIR."profiles/".$templateParams["searchedUser"]["Profile_img"] ?>" class="modal-post-img-profile me-2" alt="profile icon"
						height="40">
					<h1 class="modal-title fs-5" id="postModalLabel">Tutti i commenti di <?php echo $templateParams["searchedUser"]["Username"]?></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
					if(isset($templateParams["comments"])){
						require("comments.php");
					}
				?>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="followedModal" tabindex="-1" aria-labelledby="followedModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-3">
				<div class="modal-header">
					<img src="./upload/profiles/profile-1.jpg" class="modal-post-img-profile me-2" alt="profile icon"
						height="40">
					<h1 class="modal-title fs-5" id="postModalLabel">Le persone seguite da <?php echo $templateParams["searchedUser"]["Username"]?></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
					if(isset($templateParams["followed"])){
						require("followed.php");
					}
				?>
			</div>
		</div>
	</div>
	
	
	<div class="modal fade" id="followerModal" tabindex="-1" aria-labelledby="followerModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-3">
				<div class="modal-header">
					<img src="./upload/profiles/profile-1.jpg" class="modal-post-img-profile me-2" alt="profile icon"
						height="40">
					<h1 class="modal-title fs-5" id="postModalLabel">Le persone che seguono <?php echo $templateParams["searchedUser"]["Username"]?></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?php
					if(isset($templateParams["followers"])){
						require("follower.php");
					}
				?>
			</div>
		</div>
	</div>