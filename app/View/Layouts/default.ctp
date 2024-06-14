<!DOCTYPE html>
<html lang="pt-br">
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
<body style="font-family: Syne, sans-serif;">
<!--==================== HEADER ====================-->
<header class="header bg-white shadow fs-5">
	<nav class="navbar p-4 navbar-expand-sm">

		<!-- Logo -->
		<div class="container">
			<a href="/" class="navbar brand">Logo</a>

			<div class="navbar-nav">
				<!-- Pesquisa -->
				<i class="ri-search-line nav-link" id="search-btn" data-bs-toggle="modal" data-bs-target="#modalSearch"></i>

				<!-- Login -->
				<i class="ri-user-line nav-link" data-bs-toggle="modal" data-bs-target="#modalSignin"></i>

				<!-- Sanduíche -->
	<!--			<div class="nav__toggle" id="nav-toggle">-->
	<!--				<i class="ri-menu-line"></i>-->
	<!--			</div>-->
			</div>
		</div>
	</nav>
</header>

<!--==================== MODAL SEARCH ====================-->
<div class="modal fade" style="backdrop-filter: blur(24px)" id="modalSearch">
	<div class="modal-dialog">
		<div class="modal-content bg-transparent border-0">
		<button type="button" class="btn-close mt-5 mb-5 m-auto" data-bs-dismiss="modal"></button>
		<form class="container">
			<div class="input-group">
				<input type="text" class="form-control rounded-3 shadow" id="floatingInput" placeholder="O que você está procurando?">
			</div>
		</form>
		</div>
	</div>
</div>
<!--==================== MODAL LOGIN ====================-->

<div class="users form">
	<?php echo $this->Flash->render('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
</div>

<div style="backdrop-filter: blur(24px)" class="modal text-center fade" role="dialog" id="modalSignin">
	<button type="button" class="btn-close m-auto mt-5 mb-5" data-bs-dismiss="modal"></button>
	<div style="top: 5%; backdrop-filter: blur(50px)" class="modal-dialog" role="document">
		<div class="modal-content rounded-4 shadow">
			<div class="modal-header p-5 pb-4 border-bottom-0">
				<h1 class="fw-bold mb-0 fs-3 m-auto">Faça Login</h1>
			</div>

			<div class="modal-body p-4">
				<form method="POST" action="/users/add">

					<div class="form-floating mb-3">
						<input type="text" class="form-control rounded-3" name="data[User][username]" id="UserUsername" required="required" placeholder="">
						<label for="UserUsername">Usuário</label>
					</div>

					<div class="form-floating mb-3">
						<input type="password" class="form-control rounded-3" name="data[User][password]" id="UserPassword" required="required" placeholder="">
						<label for="UserPassword">Senha</label>
					</div>

					<small class="text-body-secondary">Não tem uma conta? <a href="/users/add">Inscreva-se.</a></small>

					<button class="w-100 mb-4 mt-3 btn btn-lg rounded-3 btn-primary" type="submit">Entrar</button>

				</form>
			</div>
		</div>
	</div>
</div>
<!--==================== MAIN ====================-->
<!--<img src="--><?php //echo $this->webroot; ?><!--img/bg-image.png" alt="" class="vh-100">-->
<main class="container mt-4 p-4 pt-0 glass">
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
