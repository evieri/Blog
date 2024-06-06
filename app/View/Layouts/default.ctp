<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Blog</title>

	<!--=============== BOOTSTRAP ===============-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<!--=============== REMIXICONS ===============-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

	<?php echo $this->Html->css('style.css'); ?>
	<?php echo $this->fetch('css'); ?>
</head>
<body class="bg-primary">
<!--==================== HEADER ====================-->
<header class="header bg-white shadow">
	<nav class="navbar p-4">

		<!-- Logo -->
		<a href="/" class="navbar brand">Logo</a>

		<div class="nav__actions">
			<!-- Pesquisa -->
			<i class="ri-search-line" id="search-btn"></i>

			<!-- Login -->
			<i class="ri-user-line nav__login" id="login-btn"></i>

			<!-- Sanduíche -->
<!--			<div class="nav__toggle" id="nav-toggle">-->
<!--				<i class="ri-menu-line"></i>-->
<!--			</div>-->
		</div>
	</nav>
</header>

<!--==================== SEARCH ====================-->

<!--==================== LOGIN ====================-->
<div class="card text-center" style="width: 18rem;">
	<div class="card-body">
		<h5 class="card-title">Login</h5>
		<form>
			<div class="mb-3">
				<label for="" class="form-label">Email</label>
				<input type="email" class="form-control" id="">
			</div>
			<div class="mb-3">
				<label for="" class="form-label">Password</label>
				<input type="password" class="form-control" id="">
				<div id="" class="form-text">Não tem conta? <a href="#">Crie uma</a></div>
			</div>
			<button type="submit" class="btn btn-primary">Entrar</button>
		</form>
		<a href="#" class="btn btn-primary">Go somewhere</a>
	</div>
</div>
<!--==================== MAIN ====================-->
<!--<img src="--><?php //echo $this->webroot; ?><!--img/bg-image.png" alt="" class="vh-100">-->
<main class="container d-flex justify-content-center bg-white">
	<div>
		<?php echo $this->Flash->render(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
</main>

<?php
	echo $this->element('sql_dump');
	echo $this->Html->script('main.js');
	echo $this->fetch('script');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
