                <div class="modal-body">
                	<div class="row justify-content-center">
                		<?php foreach ($templateParams["followed"] as $followedUser) : ?>
                			<div class="col-3 mx-2 mb-4">
                				<a href="profile.php?Username=<?php echo $followedUser["Username"] ?>" class="username-link">
                					<?php if (strlen($followedUser["Username"])  >= 13) {
										echo '<p class="small text-center">' . $followedUser["Username"] . '</p>';
									} else {
										echo '<p class="text-center">' . $followedUser["Username"] . '</p>';
									} ?>
                					<img src="<?php echo UPLOAD_DIR . "profiles/" . $followedUser["Profile_img"] ?>" class="rounded-circle mb-2 follow-list-icon" alt="profile followed icon" height="100">
                				</a>
                			</div>
                		<?php endforeach; ?>
                	</div>
                </div>