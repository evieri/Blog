<?php

	$first = $this->Paginator->first('<<', array('class' => 'btn btn-outline-secondary m-1'), '<<', array('class' => 'btn btn-secondary m-1'));
	$prev = $this->Paginator->prev('Anterior', array('class' => 'btn btn-outline-secondary m-1'), 'Anterior', array('class' => 'btn btn-secondary m-1'));
	$next = $this->Paginator->next('Próximo', array('class' => 'btn btn-outline-secondary m-1'), 'Próximo', array('class' => 'btn btn-secondary m-1'));
	$last = $this->Paginator->last('>>', array('class' => 'btn btn-outline-secondary m-1'), '>>', array('class' => 'btn btn-secondary m-1'));

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

<!--==================== POSTS ====================-->

<div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">

	<?php foreach ($posts as $post): ?>

	<div class="col mb-3" >

		<a class="card-posts" href="/posts/view/<?= $post['Post']['id']; ?>">

			<div class="card h-100 border-0">

				<img src="https://www.collinsdictionary.com/images/full/skyblue_573262585_1000.jpg" class="card-img-top" alt="...">

				<div class="card-body">

					<h5 class="card-title"><?= h($post['Post']['title']); ?></h5>

					<div class="card-subtitle mb-2 text-body-secondary d-flex justify-content-between">

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
				</div>
			</div>
		</a>
	</div>

	<?php endforeach; ?>

</div>



<!--==================== PAGINATOR ====================-->

<div class="m-auto d-flex justify-content-center mt-3">
	<?= $first, $prev, $next, $last ?>
</div>
