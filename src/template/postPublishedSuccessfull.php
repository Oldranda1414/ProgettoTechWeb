	  	<!-- qua comincia la notifica toast "POST PUBBLICATO CON SUCCESSO" -->
          <div aria-live="" aria-atomic="true" class="" style="position: absolute; min-height: 200px; z-index:5">
	  <div class="toast bg-4" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3300">
		<div class="toast-header bg-3">
		  <img src="<?php echo UPLOAD_DIR."icons/success.png" ?>" class="rounded mr-2 alert-icon" alt="post published icon">
		  <strong class="mr-auto">Avviso</strong>
		</div>
		<div class="toast-body">
		  <p>Il post è stato pubblicato con successo!</p>
		  <p><small>Clicca <a href="<?php echo "post.php?id=".$templateParams["newPostId"] ?>">qui</a> per visualizzarlo.</small></p>
		</div>
	  </div>
	</div>
	<!-- fine notifica toast -->