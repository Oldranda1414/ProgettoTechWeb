                    
                    <?php
                    /*
                    <div class="modal-body">
						<div class="post-comment mt-2 mb-5">
							<p class="text-muted">
								<img src="./upload/profiles/profile-3.jpg" class="modal-post-img-profile me-2" alt="comment profile icon" height="40">
								<em class="nickname-label">Xut-polisH</em>, il <em class="modal-comment-post-date">04.08.2023</em> alle <em class="modal-comment-post-time">18:39</em>
							</p>
							<p class="text-post-comment">
								Ha messo <em>Mi piace</em> al <a href="">post</a> che hai pubblicato il <em>18.11.2022</em> alle <em>18:15</em>.
							</p>
						</div>
						<hr>
						<div class="post-comment mt-2 mb-5">
							<p class="text-muted">
								<img src="./upload/profiles/profile-3.jpg" class="modal-post-img-profile me-2" alt="comment profile icon" height="40">
								<em class="nickname-label">Xut-polisH</em>, il <em class="modal-comment-post-date">04.08.2023</em> alle <em class="modal-comment-post-time">18:39</em>
							</p>
							<p class="text-post-comment">
								Ha messo <em>Mi piace</em> al <a href="">post</a> che hai pubblicato il <em>18.11.2022</em> alle <em>18:15</em>.
							</p>
						</div>
						<hr>
						<div class="post-comment mt-2 mb-5">
							<p class="text-muted">
								<img src="./upload/profiles/profile-2.jpg" class="modal-post-img-profile me-2" alt="comment profile icon" height="40">
								<em class="nickname-label">Can$as</em>, il <em class="modal-comment-post-date">04.08.2023</em> alle <em class="modal-comment-post-time">18:39</em>
							</p>
							<p class="text-post-comment">
								Ha commentato il <a href="">post</a> che hai pubblicato il <em>18.11.2022</em> alle <em>18:15</em>.
							</p>
						</div>
						<hr>
						<div class="post-comment mt-2 mb-5">
							<p class="text-muted">
								<img src="./upload/profiles/profile-2.jpg" class="modal-post-img-profile me-2" alt="comment profile icon" height="40">
								<em class="nickname-label">Can$as</em>, il <em class="modal-comment-post-date">04.08.2023</em> alle <em class="modal-comment-post-time">18:39</em>
							</p>
							<p class="text-post-comment">
								Ha cominciato a seguirti.
							</p>
						</div>
					</div>
                    */
                    ?>

                    <div class="modal-body">
                    <?php
			            foreach ($templateParams["notifications"] as $notification) :
                            var_dump($notification);
		            ?>
				        
		            <?php
			            endforeach;
		            ?>
                    </div>