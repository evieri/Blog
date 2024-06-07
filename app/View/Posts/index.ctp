<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1>Blog posts</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
			<i class="ri-calendar-line"></i>
			Essa semana
		</button>
	</div>
</div>

<p><a href="/posts/add" >Criar post</a></p>
<p><a href="/users/" >Usuários</a></p>

<table class="table">
	<thead>
		<tr>
			<th scope="col">Id</th>
			<th scope="col">Título</th>
			<th scope="col">Ação</th>
			<th scope="col">Data de criação</th>
		</tr>
	</thead>

	<!-- Here is where we loop through our $posts array, printing out post info -->
	<tbody>
	<?php foreach ($posts as $post): ?>
		<tr>
			<td><?= $post['Post']['id']; ?></td>
			<td>
				<?= $this->Html->link($post['Post']['title'],
					array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
			</td>
			<td>
				<?= $this->Html->link('Editar', array('action' => 'edit', $post['Post']['id']))
				. ' ' .
				$this->Form->postLink('Apagar', array('action' => 'delete', $post['Post']['id']), array('confirm' => 'Tem certeza que deseja apagar?')); ?>
			</td>
			<td><?= $post['Post']['created']; ?></td>
		</tr>
	<?php endforeach; ?>
	<?php unset($post); ?>
	</tbody>
</table>
