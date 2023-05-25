		<?php foreach($templateParams["posts"] as $elemento): ?>
            <div class="col-12 col-md-6 col-lg-4">
				<div class="card m-2 bg-4">
					<a href="profile.php?Username=<?php echo $elemento["Username"]?>">
						<img src="<?php echo UPLOAD_DIR."profiles/".$elemento["Profile_img"]; ?>" class="post-img-profile mr-3" alt="profile icon"
							height="50">
						<div class="nickname-post"><?php echo $elemento["Username"] ?></div>
					</a>
					<img src="<?php echo UPLOAD_DIR."posts/".$elemento["Img"] ?>" class="card-img-top" alt="Post Image">
					<div class="card-body text-center">
						<a href="TagPage.php?Tag=<?php echo $elemento["Game_name"] ?>">
						<div class="card-title post-title"><?php echo $elemento["Game_name"] ?></div>
						</a>
						<p class="card-text"><?php echo $elemento["Words"]?></p>
						<a href="#" class="btn like-button m-1">Mi piace</a>
						<button type="button" class="btn post-button" data-bs-toggle="modal"
							data-bs-target="#post<?php echo $elemento["Post_id"] ?>Modal">Apri post</button>
					</div>
					<div class="card-footer text-muted small font-italic">
						<?php echo date("d-m-y" ,strtotime($elemento["DT"]))." alle ".date("h:i:s" ,strtotime($elemento["DT"]))?>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="post<?php echo $elemento["Post_id"] ?>Modal" tabindex="-1"
				aria-labelledby="postModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content bg-3">
						<div class="modal-header">
							<img src="<?php echo UPLOAD_DIR . "profiles/" . $elemento["Profile_img"]; ?>"
								class="modal-post-img-profile me-2" alt="profile icon" height="40">
							<a href="TagPage.php?Tag=<?php echo $elemento["Game_name"] ?>">
							<h1 class="modal-title fs-5" id="postModalLabel">
								<?php echo $elemento["Game_name"] ?>
							</h1>
							</a>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<p class="text-muted">di <a href="profile.php?Username=<?php echo $elemento["Username"]?>"><em class="nickname-label">
									<?php echo $elemento["Username"] ?></em></a>, il <?php echo date("d-m-y" ,strtotime($elemento["DT"]))." alle ".date("h:i:s" ,strtotime($elemento["DT"]))?></p>
							<img src="<?php echo UPLOAD_DIR . "posts/" . $elemento["Img"] ?>" class="card-img-top rounded"
								alt="Post Image">
							<p class="post-body my-3">
								<?php echo $elemento["Words"] ?>
							</p>
							<div class="like-number text-end me-3">
								<?php echo $elemento["Likes"] ?> Mi piace
							</div>
							<hr>
							<h2 class="fs-5 text-center">
								Commenti
							</h2>
							<div class="post-comment-section">
								<?php foreach ($elemento["Comments"] as $singleComment): ?>
									<div class="post-comment mt-2 mb-5">
										<p class="text-muted">
											<img src="<?php echo UPLOAD_DIR . "profiles/" . $singleComment["Profile_img"] ?>"
												class="modal-post-img-profile me-2" alt="comment profile icon" height="40">
											di <a href="profile.php?Username=<?php echo $singleComment["Username"] ?>"><em class="nickname-label"><?php echo $singleComment["Username"] ?></em></a>, 
												il <?php echo date("d-m-y" ,strtotime($singleComment["DT"]))." alle ".date("h:i:s" ,strtotime($singleComment["DT"]))?>
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