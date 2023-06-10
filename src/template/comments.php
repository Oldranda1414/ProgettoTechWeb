                <div class="modal-body">
					<?php foreach($templateParams["comments"] as $comment): ?>
					<p class="text-muted">
						<img src="<?php echo UPLOAD_DIR . "profiles/" . $comment["Poster_img"] ?>"
									alt="post user profile icon" height="40">
						Nel <a href="post.php?id=<?php echo $comment["Post_id"] ?>">post</a> di <a href="profile.php?Username=<?php $comment["Poster_Username"] ?>" class="nickname-label"><?php echo $comment["Poster_Username"] ?></a>
					</p>

					<img src="<?php echo UPLOAD_DIR . "posts/" . $comment["Post_img"] ?>" class="card-img-top rounded miniatura-immagine-post" alt="Post Image">
					
					<p class="post-body text-truncate mt-4 mb-5">
					<?php echo $comment["Post_Words"] ?>
					</p>
					
					<img src="<?php echo UPLOAD_DIR . "profiles/" . $templateParams["user"]["Profile_img"] ?>" class="modal-post-img-profile me-2" alt="profile icon" height="40">
									<img src="<?php echo UPLOAD_DIR ?>/icons/trash.png" class="me-2 text-right" alt="delete comment icon" height="20">
									<?php echo $templateParams["user"]["Username"] ?></em></a>, il <?php echo date("d-m-y" ,strtotime($comment["DT"]))." alle ".date("H:i:s" ,strtotime($comment["DT"]))?>
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