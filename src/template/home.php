<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<div class="container text-center my-3">
	<div class="row">
        <?php foreach($templateParams["post"] as $elemento): ?>
            <div class="col-12 col-md-6 col-lg-4">
				<div class="card m-2 bg-4">
					<img src="<?php echo UPLOAD_DIR."profiles/".$elemento["UserProfilePic"]; ?>" class="post-img-profile mr-3" alt="profile icon"
						height="50">
					<div class="nickname-post"><?php echo $elemento["Username"] ?></div>
					<img src="<?php echo UPLOAD_DIR."posts/".$elemento["Img"] ?>" class="card-img-top" alt="Post Image">
					<div class="card-body">
						<div class="card-title post-title"><?php echo $elemento["Tag"]?></div>
						<p class="card-text"><?php echo $elemento["Words"]?></p>
						<a href="#" class="btn like-button m-1">Mi piace</a>
						<button type="button" class="btn post-button" data-bs-toggle="modal"
							data-bs-target="#postModal">Apri post</button>
					</div>
					<div class="card-footer text-muted small font-italic">
						<?php echo $elemento["Day_posted"]." alle ".$elemento["Time_posted"]?>
					</div>
				</div>
			</div>
        <?php endforeach; ?>
    </div>
</div>