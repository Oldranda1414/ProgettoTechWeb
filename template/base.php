<!DOCTYPE html>
<html lang="it">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php echo $templateParams["titolo"]; ?></title>
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
	</head>
	<body>
		<header>
			<h1>Header</h1>
		</header>
		<nav>
			Nav
		</nav>
		<main>
			<p>Main</p>
		</main>
		<footer>
			<p>Footer</p>
		</footer>
		
		<?php
		if(isset($templateParams["js"])):
			foreach($templateParams["js"] as $script):
		?>
			<script src="<?php echo $script; ?>"></script>
		<?php
			endforeach;
		endif;
		?>
	</body>
</html>