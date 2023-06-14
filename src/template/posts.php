		<?php foreach ($templateParams["posts"] as $post) : ?>
			<div class="col-12 col-md-6 col-lg-4">
				<div class="card m-2 bg-4">
					<a href="profile.php?Username=<?php echo $post["Username"] ?>">
						<img src="<?php echo UPLOAD_DIR . "profiles/" . $post["Profile_img"]; ?>" class="post-img-profile mr-3" alt="profile icon" height="50">
						<div class="nickname-post"><?php echo $post["Username"] ?></div>
					</a>
					<img src="<?php echo UPLOAD_DIR . "posts/" . $post["Img"] ?>" class="card-img-top" alt="Post Image">
					<div class="card-body text-center">
						<a href="explore.php?search=<?php echo $post["Game_name"] ?>&flexRadioDefault=tag">
							<div class="card-title post-title"><?php echo $post["Game_name"] ?></div>
						</a>
						<p class="card-text"><?php echo $post["Words"] ?></p>
						<!--
						<button type="button" class="btn like-button" id="like_button" name="like_button" value="<?php echo ($post["Liked"]) ? "Non mi piace più" : "Mi piace" ?>">
							<?php echo ($post["Liked"]) ? "Non mi piace più" : "Mi piace" ?>
						</button>
						-->
						<form action="" method="POST">
							<button type="submit" name="like_button" value="<?php echo ($post["Liked"]) ? "type=remove&postId=" . $post["Post_id"] : "type=add&postId=" . $post["Post_id"] ?>" class="btn like-button">
								<?php echo ($post["Liked"]) ? "Non mi piace più" : "Mi piace" ?>
							</button>
						</form>
						<button type="button" class="btn post-button" onclick="location.href='post.php?id=<?php echo $post['Post_id'] ?>'">
							Apri post
						</button>
					</div>
					<div class="card-footer text-muted small font-italic">
						<?php echo date("d-m-y", strtotime($post["DT"])) . " alle " . date("H:i", strtotime($post["DT"])) ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>