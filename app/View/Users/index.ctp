<?php

	$this->Paginator->options(['update' => '#content']);

	$first = $this->Paginator->first('«', ['class' => 'page-link']);
	$last = $this->Paginator->last('»', ['class' => 'page-link']);
	$counter = $this->Paginator->numbers(['class' => 'page-link', 'separator' => '<li class="page-item">', 'currentClass' => 'active']);
	$prev = $this->Paginator->prev('«', ['class' => 'page-link'], '«', ['tag' => 'a', 'class' => 'page-link disabled']);
	$next = $this->Paginator->next('»', ['class' => 'page-link'], '»', ['tag' => 'a', 'class' => 'page-link disabled']);

?>

<div class="container pt-4">

	<div class="d-flex align-items-center p-3 my-3 rounded bg-body-secondary text-dark" style="background: url('https://images.unsplash.com/photo-1618397746666-63405ce5d015?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center">
		<i class="ri-group-line fs-3 mx-3"></i>
		<div class="lh-1">
			<h1 class="h6 mb-0 lh-1 fs-4">Usuários</h1>
		</div>
	</div>

	<div class="row my-4">
		<div class="col-md-8">

			<!--==================== USUÁRIOS ====================-->

			<div class=" p-3 bg-body rounded border">
				<table class="table table-hover">

					<thead>
					<tr>
						<th scope="col" style="background-color: transparent">Nome</th>
						<th scope="col" style="background-color: transparent">Cargo</th>
						<th scope="col" style="background-color: transparent">Ação</th>
						<th scope="col" style="background-color: transparent">Data de criação</th>
					</tr>
					</thead>

					<tbody>
					<?php foreach ($users as $user): ?>
						<tr>
							<td style="background-color: transparent">
								<?= $this->Html->link($user['User']['name'],
									array('action' => 'view', $user['User']['id'])); ?>
							</td>
							<td style="background-color: transparent"><?= $user['User']['role']; ?></td>
							<td style="background-color: transparent">
								<?= $this->Html->link('Editar', array('action' => 'edit', $user['User']['id']))
								. ' ' .
								$this->Form->postLink('Apagar', array('action' => 'delete', $user['User']['id']), array('confirm' => 'Tem certeza que deseja apagar?')); ?>
							</td>
							<td style="background-color: transparent"><?= $user['User']['created']; ?></td>
						</tr>
					<?php endforeach; ?>
					<?php unset($user); ?>
					</tbody>
				</table>
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

					<?= $this->Form->create('User'); ?>

					<div class="input-group">
						<input type="text" class="form-control" id="UserTitle" name="data[User][title]" placeholder="Pesquisar...">
						<button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split rounded-0" data-bs-toggle="collapse" data-bs-target="#collapse"></button>
						<!--						<button class="btn btn-secondary" type="submit"><i class="ri-search-line"></i></button>-->
						<?= $this->Js->submit('Buscar', ['class' => 'btn btn-secondary rounded-end', 'update' => '#content']); ?>
					</div>

					<div class="collapse" id="collapse">
						<div class="input-group mt-3">
							<input name="data[User][date1]" class="date-picker form-control" placeholder="Data Inicial" type="text" id="dataInicial" style="z-index: 11">
							<input name="data[User][date2]" class="date-picker form-control" placeholder="Data Final" type="text" id="dataFinal" style="z-index: 11">
							<span class="input-group-text"><i class="ri-calendar-line"></i></span>
						</div>

						<div class="input-group mt-3">
							<select name="data[User][status]" class="form-select">
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

					<a type="button" href="/users/add" class="btn btn btn-outline-secondary me-2"><i class="ri-add-circle-line"></i></a>
					<a type="button" href="/users/" class="btn btn btn-outline-secondary"><i class="ri-group-line"></i></a>

				</div>

			</div>

		</div>
	</div>

</div>

<?php
	$this->Js->buffer('$(".message").addClass("alert alert-danger alert-dismissible fade show container mt-4 ").attr("role", "alert").prepend(\'<i class="ri-alert-fill"> </i>\').append(\'<button type="button" class="btn-close" data-bs-dismiss="alert"></button>\');');
?>
