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
<body>
<!--<body style="font-family: Syne, sans-serif;">-->

<!--==================== HEADER ====================-->
<header class="header bg-white" style="position: sticky; top: 0; z-index: 10">
	<nav class="navbar navbar-expand-sm">

		<!-- Logo -->
		<div class="container">
			<a href="/" class="navbar brand">Blog do Mané</a>

			<div class="navbar-nav">
				<!-- Pesquisa -->
				<i class="ri-search-line nav-link"></i>

				<!-- Login -->
				<?php if (!empty($authUser)): ?>
					<a href="/users/view/<?= $authUser['id'] ?>"><i class="ri-user-line nav-link"></i></a>
				<?php else: ?>
					<i class="ri-user-line nav-link"></i>
				<?php endif; ?>

				<!-- Sanduíche -->
	<!--			<div class="nav__toggle" id="nav-toggle">-->
	<!--				<i class="ri-menu-line"></i>-->
	<!--			</div>-->
			</div>
		</div>

	</nav>
</header>

<!--==================== MAIN ====================-->
<main class="container">
	<div>
		<?= $this->Flash->render(); ?>
		<?= $this->fetch('content'); ?>
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
