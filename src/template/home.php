<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<div class="container my-3">
	<div class="row">
	<?php 
		if(isset($templateParams["posts"])){
			require_once 'posts.php';
		}
		?>
    </div>
</div>