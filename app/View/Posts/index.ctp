<?php

	$this->Paginator->options(['update' => '#content']);

	$first = $this->Paginator->first('«', ['class' => 'page-link']);
	$last = $this->Paginator->last('»', ['class' => 'page-link']);
	$counter = $this->Paginator->numbers(['class' => 'page-link', 'separator' => '<li class="page-item">', 'currentClass' => 'active']);
	$prev = $this->Paginator->prev('«', ['class' => 'page-link'], '«', ['tag' => 'a', 'class' => 'page-link disabled']);
	$next = $this->Paginator->next('»', ['class' => 'page-link'], '»', ['tag' => 'a', 'class' => 'page-link disabled']);

?>

<header style="background: url('https://images.unsplash.com/photo-1618397746666-63405ce5d015?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center; background-size: cover" class="py-5 border-bottom mb-4 bg-body-secondary">
	<div class="container">
		<div class="text-center my-5">
			<h1 class="fw-bolder">Bem vindo ao Blog do Mané!</h1>
			<p class="lead mb-0">O melhor lugar para aprender front-end de forma totalmente gratuita</p>
		</div>
	</div>
</header>

<div class="row mt-4 container mx-auto">
	<div class="col-xl-8 col-lg-8">

		<!--==================== POSTS ====================-->

		<div class="row row-cols-1 row-cols-xl-2 row-cols-lg-2 g-4">

			<?php foreach ($posts as $post): ?>

				<div class="col mb-1" >

					<div class="card-posts">

						<div class="card h-100">

							<img style="max-height: 250px" src="https://images.unsplash.com/photo-1621839673705-6617adf9e890?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top object-fit-cover" alt="...">

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
										echo mb_strimwidth($body, 0, 60, "...");
									?>

								</p>

								<?= $this->Js->link('Ler mais', '/posts/view/' . $post['Post']['id'], ['update' => '#content', 'class' => 'stretched-link icon-link icon-link-hover']) ?>

<!--								<a class="stretched-link icon-link icon-link-hover" href="/posts/view/--><?php //= $post['Post']['id'] ?><!--">-->
<!--									Ler mais-->
<!--									<svg class="bi" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>-->
<!--								</a>-->

							</div>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>

		<hr>

		<!--==================== PAGINATOR ====================-->

		<nav class="mx-auto d-flex justify-content-center my-3">
			<ul class="pagination">
				<li class="page-item"><?=$prev?></li>
				<li class="page-item"><?=$counter?></li>
				<li class="page-item"><?=$next?></li>
			</ul>
		</nav>

	</div>

	<div class="col">

		<!--==================== PESQUISA ====================-->
		<div class="card mb-4" style="position: sticky; top: 5rem; z-index: 10">

			<div class="card-body">

				<?= $this->Form->create('Post'); ?>

					<div class="input-group">
						<input type="text" class="form-control" id="PostTitle" name="data[Post][title]" placeholder="Pesquisar...">
						<button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split rounded-0" data-bs-toggle="collapse" data-bs-target="#collapse"></button>
<!--						<button class="btn btn-secondary" type="submit"><i class="ri-search-line"></i></button>-->
						<?= $this->Js->submit('Buscar', ['class' => 'btn btn-secondary rounded-end', 'update' => '#content']); ?>
					</div>

					<div class="collapse" id="collapse">
						<div class="input-group mt-3">
							<input name="data[Post][date1]" class="date-picker form-control" placeholder="Data Inicial" type="text" id="dataInicial" style="z-index: 11">
							<input name="data[Post][date2]" class="date-picker form-control" placeholder="Data Final" type="text" id="dataFinal" style="z-index: 11">
							<span class="input-group-text"><i class="ri-calendar-line"></i></span>
						</div>

						<div class="input-group mt-3">
							<select name="data[Post][status]" class="form-select">
								<option selected>Status...</option>
								<option value="0">Ativo</option>
								<option value="1">Inativo</option>
							</select>
							<span class="input-group-text"><i class="ri-checkbox-line"></i></span>
						</div>
					</div>

				<?= $this->Form->end(); ?>
			</div>
		</div>

		<div class="card mb-4">

			<div class="card-header">
				Ações
			</div>

			<div class="card-body">

				<a type="button" href="/posts/add" class="btn btn btn-outline-secondary me-2"><i class="ri-add-circle-line"></i></a>
				<a type="button" href="/users/" class="btn btn btn-outline-secondary"><i class="ri-group-line"></i></a>

			</div>

		</div>

		<div class="card">
			<div class="card-header">
				Categorias
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<ul class="list-unstyled">
							<li><a href="#!">HTML</a></li>
							<li><a href="#!">CSS</a></li>
							<li><a href="#!">JavaScript</a></li>
						</ul>
					</div>
					<div class="col-sm-6">
						<ul class="list-unstyled">
							<li><a href="#!">Bootstrap</a></li>
							<li><a href="#!">React</a></li>
						<li><a href="#!">Angular</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<script>
	$(function() {
		$.datepicker.setDefaults($.datepicker.regional[ "pt-BR" ]);
		$("#dataInicial, #dataFinal").datepicker({
			dateFormat: "dd/mm/yy"
		});
	});
</script>

<?php
	if($this->request->is('ajax')) {
		echo $this->Js->writeBuffer();
	}
?>
