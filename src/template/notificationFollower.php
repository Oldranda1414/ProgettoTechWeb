                        <div class="post-comment mt-2 mb-5">
                        	<a href="profile.php?Username=<?php echo $notification["Follower_Username"] ?>">
                        		<p class="text-muted">
                        			<img src="<?php echo UPLOAD_DIR . "profiles/" . $notification["Follower_Profile_img"] ?>" class="modal-post-img-profile me-2" alt="like profile icon" height="40">
                        			<em class="nickname-label"><?php echo $notification["Follower_Username"] ?></em>, il <em class="modal-comment-post-date"><?php echo date("d-m-y", strtotime($notification["DT"])) ?></em> alle <em class="modal-comment-post-time"><?php date("H:i:s", strtotime($notification["DT"])) ?></em>
                        		</p>
                        	</a>
                        	<p class="text-post-comment">
                        		Ha cominciato a seguirti.
                        	</p>
                        </div>