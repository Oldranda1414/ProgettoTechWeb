<!doctype html>
<html lang="it">

<head>
	<title><?php echo $templateParams["titolo"]; ?></title>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
  	<!-- Required meta tags -->
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<!-- Bootstrap CSS v5.2.1 -->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
	<header>
		<nav class="navbar bg-light">
				<div class="container-fluid">
					<a class="navbar-brand">
						<img src=".\images\icon-logo.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
						Social Network
					</a>
					<form class="d-flex" role="search">
						<input class="form-control me-2" type="search" placeholder="Cerca post..." aria-label="Cerca">
						<button class="btn btn-primary" type="submit">Cerca</button>
					</form>
				</div>
		</nav>
	</header>
	<main>
		<?php
    		if(isset($templateParams["nome"])){
        		require($templateParams["nome"]);
			}	
    	?>
	</main>
	<footer>
	<!-- place footer here -->
	</footer>
	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
	integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
	integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
	</script>

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