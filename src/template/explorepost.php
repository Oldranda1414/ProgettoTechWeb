<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php if(isset($templateParams["mostLikedPosts"])):?>
	<div class="container fascia-carosello col-12 mx-0">
		<div class="text-center display-5 pt-1 text-1">I PIÙ VOTATI</div>
		<div class="text-center lead text-1">Una raccolta dei migliori 3 post della giornata</div>
		<div class="row justify-content-center my-3">
			<div id="carouselPostCaptions" class="carousel slide carousel-fade col-11 col-lg-9 col-xl-6 text-center"
				data-bs-ride="false">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselPostCaptions" data-bs-slide-to="0" class="active"
						aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselPostCaptions" data-bs-slide-to="1"
						aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselPostCaptions" data-bs-slide-to="2"
						aria-label="Slide 3"></button>
				</div>
				
				<div class="carousel-inner">
					
					<?php
					$activeAdded = false;  
					foreach ($templateParams["mostLikedPosts"] as $elemento) :
					?>
					<div class="carousel-item <?php if (!$activeAdded) {
						echo "active";
						$activeAdded = true;
					}?>">
						<img src="<?php echo UPLOAD_DIR."posts/".$elemento["Img"] ?>" class="d-block w-100 blurredbackground rounded-2"
							alt="Post Image">

						<div class="carousel-caption d-md-block">
							<div class="title-carousel-post text-truncate" data-bs-toggle="modal"
								data-bs-target="#postModal"><?php echo $elemento["Tag"]?></div>
							<div class="row justify-content-center">
								<div class="col">
									<img src="<?php echo UPLOAD_DIR."profiles/".$elemento["UserProfilePic"]; ?>" class="rounded-circle shadow-lg mr-3"
										alt="profile icon" height="30">
									<div class="nickname-carousel-post"><?php echo $elemento["Username"] ?></div>
								</div>
							</div>
							<p class="text-truncate">
								<?php echo $elemento["Words"]?>
							</p>
							<div class="open-post d-none d-sm-block d-md-block" data-bs-toggle="modal"
								data-bs-target="#postModal">Apri post</div>
						</div>
					</div>
					<?php endforeach ?>
					
				</div>
				
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselPostCaptions"
					data-bs-slide="prev" data-mdb-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselPostCaptions"
					data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</div>
<?php endif ?>
		
	<div class="container mt-4">
		<div class="row justify-content-center">
			<div class="scheda-profilo mx-5 rounded col col-sm-12 col-lg-7 col-xl-6 justify-content-md-center">
				<div class="row justify-content-center text-center mb-2">
					<div class="col-xs-10 col-sm-9 col-lg-5 mb-2">

				<form class="d-flex me-1 mw-50 navbar-right mt-3" role="search">
					<input class="form-control me-2 bg-4" type="search" placeholder="Cerca..." aria-label="Search"> <!--ci sono problemi di accessibilità per la label-->
					<button class="w-25 btn btn-sm bg-1" type="submit">
						<img
							src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Vector_search_icon.svg/800px-Vector_search_icon.svg.png"
							width="25" alt="search button icon">
					</button>
				</form>

					</div>
					<div class="col col-lg-4 col-sm-4 ">
									<div class="form-check">
				<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
					<label class="form-check-label" for="flexRadioDefault1">
						Cerca per post
					</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
					<label class="form-check-label" for="flexRadioDefault2">
						Cerca tag
					</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
					<label class="form-check-label" for="flexRadioDefault3">
						Cerca utente
					</label>
			</div>


					</div>
				</div>
			</div>
		</div>
	</div>

<div class="container text-center my-3">
	<div class="row">
        <?php foreach($templateParams["post"] as $elemento): ?>
            <div class="col-12 col-md-6 col-lg-4">
				<div class="card m-2 bg-4">
					<img src="<?php echo UPLOAD_DIR."profiles/".$elemento["UserProfilePic"]; ?>" class="post-img-profile mr-3" alt="profile icon"
						height="50">
					<div class="nickname-post"><?php echo $elemento["Username"] ?></div>
					<img src="<?php echo UPLOAD_DIR."posts/".$elemento["Img"] ?>" class="card-img-top" alt="Post Image">
					<div class="card-body">
						<div class="card-title post-title"><?php echo $elemento["Tag"]?></div>
						<p class="card-text"><?php echo $elemento["Words"]?></p>
						<a href="#" class="btn like-button m-1">Mi piace</a>
						<button type="button" class="btn post-button" data-bs-toggle="modal"
							data-bs-target="#post<?php echo $elemento["Post_id"] ?>Modal">Apri post</button>
					</div>
					<div class="card-footer text-muted small font-italic">
						<?php echo $elemento["Day_posted"]." alle ".$elemento["Time_posted"]?>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="post<?php echo $elemento["Post_id"] ?>Modal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content bg-3">
						<div class="modal-header">
							<img src="<?php echo UPLOAD_DIR."profiles/".$elemento["UserProfilePic"]; ?>" class="modal-post-img-profile me-2" alt="profile icon"
								height="40">
							<h1 class="modal-title fs-5" id="postModalLabel"><?php echo $elemento["Tag"]?></h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<p class="text-muted">di <em class="nickname-label"><?php echo $elemento["Username"] ?></em>, il <em
									class="modal-post-date"><?php echo $elemento["Day_posted"]?></em> alle <em class="modal-post-time"><?php echo $elemento["Time_posted"]?></em></p>
							<img src="<?php echo UPLOAD_DIR."posts/".$elemento["Img"] ?>" class="card-img-top rounded" alt="Post Image">
							<p class="post-body my-3">
								<?php echo $elemento["Words"]?>
							</p>
							<div class="like-number text-end me-3">
								<?php echo $elemento["NumberOfLikes"]?> Mi piace
							</div>
							<hr>
							<h2 class="fs-5 text-center">
								Commenti
							</h2>
							<div class="post-comment-section">
								<?php foreach($elemento["Comments"] as $singleComment): ?>
								<div class="post-comment mt-2 mb-5">
									<p class="text-muted">
										<img src="<?php echo UPLOAD_DIR."profiles/".$singleComment["Profile_img"] ?>" class="modal-post-img-profile me-2"
											alt="comment profile icon" height="40">
										di <em class="nickname-label"><?php echo $singleComment["Username"] ?></em>, il <em
											class="modal-comment-post-date"><?php echo $singleComment["Day_posted"] ?></em> alle <em
											class="modal-comment-post-time"><?php echo $singleComment["Time_posted"] ?></em>
									</p>
									<p class="text-post-comment">
										<?php echo $singleComment["Words"] ?>
									</p>
								</div>
								<?php endforeach; ?>
							</div>
							<form>
								<div class="mb-3">
									<label for="message-text" class="col-form-label">Commenta:</label>
									<textarea class="form-control" id="message-text"></textarea>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<!-- <button type="button" class="btn btn-primary">Mi piace</button> -->
							<a href="#" class="btn like-button m-1">Mi piace</a>
							<button type="button" class="btn btn-info">Invia commento</button>
						</div>
					</div>
				</div>
			</div>
        <?php endforeach; ?>
    </div>
</div>