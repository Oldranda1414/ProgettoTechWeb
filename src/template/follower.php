                <div class="modal-body">
					<div class="row justify-content-center">
						<?php foreach($templateParams["followers"] as $followerUser): ?>
						<div class="col-3 mx-2 mb-4">
							<a href="profile.php?Username=<?php echo $followerUser["Username"] ?>" class="username-link">
								<?php if (strlen($followerUser["Username"])  >= 14) {echo '<p class="small text-center">'.$followerUser["Username"].'</p>';} else {
									echo '<p class="text-center">'.$followerUser["Username"].'</p>';
								} ?>
								<img src="<?php echo UPLOAD_DIR . "profiles/" . $followerUser["Profile_img"] ?>" class="rounded-circle mb-2 follow-list-icon" alt="profile followed icon" height="100">
							</a>
						</div>
						<?php endforeach; ?>
					</div>
					<hr>
					<div class="row justify-content-center">
						<a href="#" class="btn upload-button m-1">Carica altro...</a>
					</div>
				</div>