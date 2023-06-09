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
						<a href="explore.php?search=<?php echo $elemento["Game_name"] ?>&flexRadioDefault=tag">
						<div class="card-title post-title"><?php echo $elemento["Game_name"] ?></div>
						</a>
						<p class="card-text"><?php echo $elemento["Words"]?></p>
						<a href="#" class="btn like-button m-1">Mi piace</a>
						<button type="button" class="btn post-button" onclick="location.href='post.php?id=<?php echo $elemento['Post_id'] ?>'">Apri post</button>
					</div>
					<div class="card-footer text-muted small font-italic">
						<?php echo date("d-m-y" ,strtotime($elemento["DT"]))." alle ".date("h:i" ,strtotime($elemento["DT"]))?>
					</div>
				</div>
			</div>
        <?php endforeach; ?>