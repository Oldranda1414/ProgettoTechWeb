    <div class="container fascia-profilo pt-3 pb-5">
		<div class="text-center display-4 text-1 mb-3"><?php echo $templateParams["post"]["Game_name"] ?></div>
		<div class="row justify-content-center">
			<div class="scheda-profilo mx-1 rounded col col-lg-10 justify-content-md-center">
				<div class="row justify-content-md-center text-center">
					<div class="col-12 col-lg-7 mb-2">
					<p class="text-muted">
						<img src="./upload/profiles/profile-1.jpg" class="post-author-img me-2" alt="profile icon"
							height="100">
						di <a href="profile.php?Username=<?php echo $templateParams["post"]["Username"] ?>"><em class="nickname-label"><?php echo $templateParams["post"]["Username"] ?></em></a>, il
                            <?php echo date("d-m-y" ,strtotime($templateParams["post"]["DT"]))." alle ".date("H:i" ,strtotime($templateParams["post"]["DT"]))?></p>
						<img src="./upload/posts/<?php echo $templateParams["post"]["Img"] ?>" class="card-img-top rounded" alt="Post Image">
						<p class="post-body my-3">
                            <?php echo $templateParams["post"]["Words"] ?>
						</p>
						<div class="like-number text-end me-3">
							A <?php echo $templateParams["post"]["Likes"] ?> utenti è piaciuto
							<a href="#" class="btn like-button m-1">Mi piace</a>
						</div>
					</div>
					<div class="col col-lg-5 mt-2 bg-7 rounded">
						<div class="profile-schede-title m-2">Commenti</div>
						<div class="post-comment-section overflow-auto" style="max-height: 300px">
                            <?php foreach($templateParams["comments"] as $comment): ?>
							<div class="post-comment mt-2 mb-5">
								<p class="text-muted">
									<img src="./upload/profiles/<?php echo $comment["Profile_img"] ?>" class="modal-post-img-profile me-2"
									alt="comment profile icon" height="40">
								di <a href="profile.php?Username=<?php echo $comment["Username"] ?>"><em class="nickname-label"><?php echo $comment["Username"] ?></em></a>, il 
                                    <?php echo date("d-m-y" ,strtotime($comment["DT"]))." alle ".date("H:i" ,strtotime($comment["DT"]))?>
								</p>
								<p class="text-post-comment">
                                    <?php echo $comment["Words"] ?>
								</p>
							</div>
                            <?php endforeach; ?>
						</div>
						<form action="#" method="POST">
							<div class="mb-3">
								<label for="message-text" class="col-form-label">Commenta:</label>
								<textarea class="form-control" id="comment-text" name="comment-text"></textarea>
								<button type="submit" class="btn btn-info mt-2">Invia commento</button>
							</div>
						</form>
					</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-primary">Mi piace</button> -->
					
				</div>
					</div>
				</div>
			</div>
		</div>
	</div>