<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<div class="container text-center my-3">
	<div class="row">
        <?php foreach($templateParams["post"] as $post): ?>
            <div class="col-12 col-md-6 col-lg-4">
				<div class="card m-2 bg-4">
					<img src="<?php echo UPLOAD_DIR."profiles/".$post["UserProfilePic"]; ?>" class="post-img-profile mr-3" alt="profile icon"
						height="50">
					<div class="nickname-post"><?php echo $post["Username"] ?></div>
					<img src="<?php echo UPLOAD_DIR."posts/".$post["Immagine"] ?>" class="card-img-top" alt="Post Image">
					<div class="card-body">
						<div class="card-title post-title"><?php echo $post["Tag"]?></div>
						<p class="card-text"><?php echo $post["Testo"]?></p>
						<a href="#" class="btn like-button m-1">Mi piace</a>
						<button type="button" class="btn post-button" data-bs-toggle="modal"
							data-bs-target="#postModal">Apri post</button>
					</div>
					<div class="card-footer text-muted small font-italic">
						<?php echo $post["Data"]." alle ".$post["Ora"]?>
					</div>
				</div>
			</div>
        <?php endforeach; ?>
    </div>
</div>