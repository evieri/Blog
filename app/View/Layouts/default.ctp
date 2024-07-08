<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="light">
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

	<!--=============== JQUERY UI ===============-->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

	<script>
		function toggleTheme() {
			const currentTheme = document.documentElement.getAttribute('data-bs-theme');
			const newTheme = currentTheme === 'light' ? 'dark' : 'light';

			// Altera o tema da página
			document.documentElement.setAttribute('data-bs-theme', newTheme);

			// Seleciona o ícone pelo id
			const icon = document.getElementById('themeIcon');

			// Verifica a classe atual e altera para a classe oposta
			if (icon.classList.contains('ri-moon-clear-fill')) {
				icon.classList.remove('ri-moon-clear-fill');
				icon.classList.add('ri-sun-fill');
			} else {
				icon.classList.remove('ri-sun-fill');
				icon.classList.add('ri-moon-clear-fill');
			}
		}
	</script>

</head>
<body>
<!--<body style="font-family: Syne, sans-serif;">-->

<!--==================== HEADER ====================-->
<header class="header border-bottom" style="position: sticky; top: 0; z-index: 10">
	<nav class="navbar navbar-expand-sm bg-dark">

		<!-- Logo -->
		<div class="container fs-5">
			<a href="/" class="navbar brand text-light">Blog do Mané</a>

			<button class="btn btn-dark" onclick="toggleTheme()"><i id="themeIcon" class="ri-moon-clear-fill"></i></button>

			<div class="navbar-nav">
				<!-- Login -->
				<?php if (!empty($authUser)): ?>

				<a type="button" href="/users/view/<?= $authUser['id'] ?>" class="btn badge d-flex align-items-center p-1 pe-2 text-dark-emphasis bg-dark-subtle border border-dark-subtle rounded-pill">
					<img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt=""><?= $authUser['name'] ?>
				</a>

				<?php else: ?>
					<i class="ri-user-line nav-link text-light"></i>
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
<main>
	<div>
		<?= $this->Flash->render(); ?>
		<?= $this->fetch('content'); ?>
	</div>
</main>

<footer class="py-5 bg-dark text-light">

	<?php
		echo $this->element('sql_dump');
		echo $this->Html->script('main.js');
		echo $this->Html->script('datepicker-pt-BR.js');
		echo $this->fetch('script');
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</footer>

</body>
</html>
