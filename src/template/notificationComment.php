                        <div class="post-comment mt-2 mb-5">
                            <a href="profile.php?Username=<?php echo $notification["Commenter_Username"] ?>">
							    <p class="text-muted">
								    <img src="<?php echo UPLOAD_DIR."profiles/".$notification["Commenter_Profile_img"] ?>" class="modal-post-img-profile me-2" alt="like profile icon" height="40">
								    <em class="nickname-label"><?php echo $notification["Commenter_Username"] ?></em>, il <em class="modal-comment-post-date"><?php echo date("d-m-y" ,strtotime($notification["DT"])) ?></em> alle <em class="modal-comment-post-time"><?php date("h:i:s" ,strtotime($notification["DT"]))?></em>
							    </p>
                            </a>
							<p class="text-post-comment">
                                Ha commentato un tuo <a href="post.php?id=<?php echo $notification["Commented_Post_id"]?>">post</a>.
							</p>
						</div>