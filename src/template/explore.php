<?php if (isset($templateParams["titolo_pagina"])): ?>
	<h2>
		<?php echo $templateParams["titolo_pagina"]; ?>
	</h2>
<?php endif; ?>
<?php if (isset($templateParams["mostLikedPosts"])): ?>
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
					foreach ($templateParams["mostLikedPosts"] as $elemento):
						?>
						<div class="carousel-item <?php if (!$activeAdded) {
							echo "active";
							$activeAdded = true;
						} ?>">
							<img src="<?php echo UPLOAD_DIR . "posts/" . $elemento["Img"] ?>"
								class="d-block w-100 blurredbackground rounded-2" alt="Post Image">

							<div class="carousel-caption d-md-block">
								<div class="title-carousel-post text-truncate" data-bs-toggle="modal"
									data-bs-target="post.php?id=<?php echo $elemento["Post_id"] ?>"><?php echo $elemento["Game_name"] ?></div>
								<div class="row justify-content-center">
									<a href="profile.php?Username=<?php echo $elemento["Username"] ?>">
										<div class="col">
											<img src="<?php echo UPLOAD_DIR . "profiles/" . $elemento["Profile_img"]; ?>"
												class="rounded-circle shadow-lg mr-3" alt="profile icon" height="30">
											<div class="nickname-carousel-post">
												<?php echo $elemento["Username"] ?>
											</div>
										</div>
									</a>
									
								</div>
								<p class="text-truncate">
									<?php echo $elemento["Words"] ?>
								</p>
								<div class="open-post d-none d-sm-block d-md-block" onclick="location.href='post.php?id=<?php echo $elemento["Post_id"] ?>'">Apri post</div>
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
				<form action="#" method="GET" class="d-flex me-1 mw-50 navbar-right mt-3" role="search">
					<div class="col-xs-10 col-sm-9 col-lg-5 mb-2">

						<!-- <form action="#" method="POST" class="d-flex me-1 mw-50 navbar-right mt-3" role="search"> -->
							<input class="form-control me-2 bg-4 search" type="search" placeholder="Cerca..." aria-label="Search" name="search">
							<!--ci sono problemi di accessibilità per la label-->
							<button class="w-25 btn btn-sm bg-1" type="submit">
								<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Vector_search_icon.svg/800px-Vector_search_icon.svg.png"
									width="25" alt="search button icon">
							</button>
						<!-- </form> -->

					</div>
					<div class="col col-lg-4 col-sm-4 ">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="post"
								checked>
							<label class="form-check-label" for="flexRadioDefault1">
								Cerca per post
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="tag">
							<label class="form-check-label" for="flexRadioDefault2">
								Cerca tag
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="user">
							<label class="form-check-label" for="flexRadioDefault3">
								Cerca utente
							</label>
						</div>


					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container my-3">
	<div class="row" id="posts">

    </div>
</div>