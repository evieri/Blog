<?php

	$first = $this->Paginator->first('«', ['class' => 'page-link']);
	$last = $this->Paginator->last('»', ['class' => 'page-link']);
	$counter = $this->Paginator->numbers(['class' => 'page-link', 'separator' => '<li class="page-item">', 'currentClass' => 'active']);
	$prev = $this->Paginator->prev('«', ['class' => 'page-link'], '«', ['tag' => 'a', 'class' => 'page-link disabled']);
	$next = $this->Paginator->next('»', ['class' => 'page-link'], '»', ['tag' => 'a', 'class' => 'page-link disabled']);

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

	<h1>Posts</h1>

	<!--==================== PESQUISA ====================-->
	<div class="collapse ms-3 me-1 flex-grow-1" id="searchCollapse">

		<form action="/posts/index" method="post" id="PostIndexForm">

			<div class="input-group">
				<input type="text" class="form-control form-control-sm border-secondary" id="PostTitle" name="data[Post][title]" placeholder="Pesquisar...">
<!--				<button type="submit" class="btn btn-sm btn-outline-secondary"><i class="ri-search-line"> Buscar</i></button>-->
			</div>

		</form>

	</div>

	<div>
		<button class="btn btn-sm btn-outline-secondary btn-group" data-bs-toggle="collapse" href="#searchCollapse"><i class="ri-search-line"></i></button>
		<button type="button" class="btn btn-sm btn-outline-secondary"><a id="link" href="/posts/add"><i class="ri-add-circle-line"></i></a></button>
		<button type="button" class="btn btn-sm btn-outline-secondary"><a id="link" href="/users/"><i class="ri-group-line"></i></a></button>


		<span class="dropdown">

			<div class="btn-group" role="group">

				<button type="button" class="btn btn-sm btn-outline-secondary">
					<i class="ri-calendar-line"></i>
				</button>

				<div class="btn-group" role="group">

					<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
						Tudo
					</button>

					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Essa semana</a></li>
						<li><a class="dropdown-item" href="#">Esse mês</a></li>
						<li><a class="dropdown-item" href="#">Esse ano</a></li>
					</ul>

				</div>

			</div>

		</span>

	</div>
<!--	<div class="btn-toolbar mb-2 mb-md-0">-->
<!--		<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">-->
<!--			<i class="ri-calendar-line"></i>-->
<!--			Tudo-->
<!--		</button>-->
<!--	</div>-->
</div>

<div class="row">
	<div class="col-8">

		<!--==================== POSTS ====================-->

		<div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-4">

			<?php foreach ($posts as $post): ?>

				<div class="col mb-3" >

					<div class="card-posts">

						<div class="card h-100 bg-transparent">

							<img style="max-height: 250px" src="https://www.collinsdictionary.com/images/full/skyblue_573262585_1000.jpg" class="card-img-top" alt="...">

							<div class="card-body">

								<h5 class="card-title"><?= h($post['Post']['title']); ?></h5>

								<div class="card-subtitle my-2 text-body-secondary d-flex justify-content-between">

									<?php
									$created = strtotime($post['Post']['created']); // Converte a string para timestamp
									$data = date('d M Y', $created); // Formata a data
									?>

									<h6>Por: <?= h($post['User']['name']); ?></h6>

									<h6><i class="ri-time-line"></i> <?= $data ?></h6>

								</div>

								<p class="card-text">

									<?php
									$body = h($post['Post']['body']);
									echo mb_strimwidth($body, 0, 50, "...");
									?>

								</p>

								<a class="stretched-link icon-link icon-link-hover" href="/posts/view/<?= $post['Post']['id']; ?>">
									Ler mais
									<svg class="bi" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>
								</a>

							</div>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>
	<div class="col bg-primary">

	</div>
</div>





<!--==================== PAGINATOR ====================-->

<nav class="m-auto d-flex justify-content-center mt-3">
	<ul class="pagination">
		<li class="page-item"><?=$prev?></li>
		<li class="page-item"><?=$counter?></li>
		<li class="page-item"><?=$next?></li>
	</ul>
</nav>

