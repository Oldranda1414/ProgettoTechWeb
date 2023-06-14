				<div class="modal-body">
					<?php foreach ($templateParams["likes"] as $like) : ?>
						<p class="text-muted">
							<img src="<?php echo UPLOAD_DIR . "profiles/" . $like["Poster_img"] ?>" class="modal-post-img-profile me-2" alt="post user profile icon" height="40">
							Ha apprezzato il <a href="post.php?id=<?php echo $like["Post_id"] ?>"> post </a> di <a href="profile.php?Username=<?php echo $like["Poster_Username"] ?>" class="nickname-label"><?php echo $like["Poster_Username"] ?></a>
						</p>

						<img src="<?php echo UPLOAD_DIR . "posts/" . $like["Post_img"] ?>" class="card-img-top rounded miniatura-immagine-post" alt="Post Image">

						<p class="post-body text-truncate mt-4 mb-5">
							<?php echo $like["Post_Words"] ?>
						</p>
						<hr>
					<?php endforeach; ?>
				</div>