<?php

	$first = $this->Paginator->first('<<', array('class' => 'btn btn-outline-secondary m-1'), '<<', array('class' => 'btn btn-secondary m-1'));
	$prev = $this->Paginator->prev('Anterior', array('class' => 'btn btn-outline-secondary m-1'), 'Anterior', array('class' => 'btn btn-secondary m-1'));
	$next = $this->Paginator->next('Próximo', array('class' => 'btn btn-outline-secondary m-1'), 'Próximo', array('class' => 'btn btn-secondary m-1'));
	$last = $this->Paginator->last('>>', array('class' => 'btn btn-outline-secondary m-1'), '>>', array('class' => 'btn btn-secondary m-1'));

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1>Usuários</h1>

	<!--==================== PESQUISA ====================-->
	<div class="collapse multi-collapse" id="searchCollapse">

		<form action="/posts/index" method="post" id="PostIndexForm">

			<div class="input-group">
				<input type="text" class="form-control" id="PostTitle" name="data[Post][title]">
				<button type="submit" class="btn btn-outline-secondary"><i class="ri-search-line"> Buscar</i></button>
			</div>

		</form>

	</div>

	<div class="dropdown">

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

		<button type="button" class="btn btn-sm btn-outline-secondary m-1"><a id="link" href="/users/add" ><i class="ri-user-add-line"></i></a></button>

		<button class="btn btn-sm btn-outline-secondary btn-group" data-bs-toggle="collapse" href="#searchCollapse"><i class="ri-search-line"></i></button>

	</div>

</div>

<div class="d-grid col-8 mx-auto">
	<table class="table">

		<thead>
		<tr>
			<th scope="col" style="background-color: transparent">Id</th>
			<th scope="col" style="background-color: transparent">Nome</th>
			<th scope="col" style="background-color: transparent">Cargo</th>
			<th scope="col" style="background-color: transparent">Ação</th>
			<th scope="col" style="background-color: transparent">Data de criação</th>
		</tr>
		</thead>

		<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<td style="background-color: transparent"><?= $user['User']['id']; ?></td>
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

<!--==================== PAGINATOR ====================-->
<div class="mx-auto d-flex justify-content-center mt-3">
	<?= $first, $prev, $next, $last ?>
</div>
