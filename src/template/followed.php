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