    <?php if (!empty($templateParams["post"])) : ?>

    	<?php if (isset($templateParams["titolo_pagina"])) : ?>
    		<h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
    	<?php endif; ?>

    	<?php if (isset($templateParams["commentError"])) : ?>
    		<div aria-live="" aria-atomic="true" class="" style="position: absolute; min-height: 200px; z-index:5">
    			<div class="toast bg-4" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2800">
    				<div class="toast-header bg-3">
    					<img src="./upload/icons/alert.png" class="rounded mr-2 alert-icon" alt="alert icon">
    					<strong class="mr-auto ms-2">Avviso · Commento non pubblicato</strong>
    					</button>
    				</div>
    				<div class="toast-body">
    					<p class="text-center text-danger new-post-error-label mx-2">- <u>
    							<?php echo $templateParams["commentError"]; ?>
    						</u></p>
    				</div>
    			</div>
    		</div>

    	<?php endif; ?>

    	<div class="container fascia-profilo pt-3 pb-5">
    		<div class="text-center display-4 text-1 mb-3"><?php echo $templateParams["post"]["Game_name"] ?></div>
    		<div class="row justify-content-center">
    			<div class="scheda-profilo mx-1 rounded col col-lg-10 justify-content-md-center">
    				<div class="row justify-content-md-center text-center">
    					<div class="col-12 col-lg-7 mb-2">
    						<p class="text-muted">
    							<img src="./upload/profiles/<?php echo $templateParams["post"]["Profile_img"] ?>" class="post-author-img me-2" alt="profile icon" height="100">
    							di <a href="profile.php?Username=<?php echo $templateParams["post"]["Username"] ?>"><em class="nickname-label"><?php echo $templateParams["post"]["Username"] ?></em></a>, il
    							<?php echo date("d-m-y", strtotime($templateParams["post"]["DT"])) . " alle " . date("H:i", strtotime($templateParams["post"]["DT"])) ?>
    						</p>
    						<img src="./upload/posts/<?php echo $templateParams["post"]["Img"] ?>" class="card-img-top rounded" alt="Post Image">
    						<p class="post-body my-3">
    							<?php echo $templateParams["post"]["Words"] ?>
    						</p>
    						<div class="like-number text-end me-3">
    							A <?php echo $templateParams["post"]["Likes"] ?> utenti è piaciuto
    							<form action="" method="POST">
    								<button type="submit" name="like_button" value="<?php echo ($templateParams["post"]["Liked"]) ? "type=remove&postId=" . $templateParams["post"]["Post_id"] : "type=add&postId=" . $templateParams["post"]["Post_id"] ?>" class="btn like-button m-1">
    									<?php echo ($templateParams["post"]["Liked"]) ? "Non mi piace più" : "Mi piace" ?>
    								</button>
    							</form>
    						</div>
    					</div>
    					<div class="col col-lg-5 mt-2 bg-7 rounded">
    						<div class="profile-schede-title m-2">Commenti</div>
    						<div class="post-comment-section overflow-auto" style="max-height: 300px">
    							<?php foreach ($templateParams["comments"] as $comment) : ?>
    								<div class="post-comment mt-2 mb-5">
    									<p class="text-muted">
    										<img src="./upload/profiles/<?php echo $comment["Profile_img"] ?>" class="modal-post-img-profile me-2" alt="comment profile icon" height="40">
    										di <a href="profile.php?Username=<?php echo $comment["Username"] ?>"><em class="nickname-label"><?php echo $comment["Username"] ?></em></a>, il
    										<?php echo date("d-m-y", strtotime($comment["DT"])) . " alle " . date("H:i", strtotime($comment["DT"])) ?>
    									</p>
    									<p class="text-post-comment">
    										<?php echo $comment["Words"] ?>
    									</p>
    								</div>
    							<?php endforeach; ?>
    						</div>
    						<form action="#" method="POST">
    							<div class="mb-3">
    								<label for="comment-text" class="col-form-label">Commenta:</label>
    								<textarea class="form-control" id="comment-text" name="comment-text"></textarea>
    								<button type="submit" class="btn btn-info mt-2">Invia commento</button>
    							</div>
    						</form>
    					</div>
    					<div class="modal-footer">

    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	</div>
    <?php else : ?>

    	<div class="container fascia col-12 mx-0">
    		<div class="text-center display-5 pt-1 text-1 mt-5">Post non trovato!</div>
    		<div class="text-center lead text-1 subtitle-fascia">
    			<p class="font-italic font-weight-bold">Ci dispiace, ma il contenuto a cui hai cercato di accedere potrebbe essere stato rimosso.</p>
    		</div>
    		<div class="row justify-content-center my-3">

    		</div>
    	</div>

    	<div class="container text-center my-3">

    	</div>

    <?php endif; ?>