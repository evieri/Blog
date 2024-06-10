<?php

	$first = $this->Paginator->first();
	$prev = $this->Paginator->prev();
	$next = $this->Paginator->next();
	$last = $this->Paginator->last();
	$paginate = $this->Paginator->link('8 por página', array('controller' => 'posts', 'action' => 'index' ,'limit' => 8));
	$paginate .= $this->Html->para('', $paginate);

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1>Blog posts</h1>

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

	</div>
<!--	<div class="btn-toolbar mb-2 mb-md-0">-->
<!--		<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">-->
<!--			<i class="ri-calendar-line"></i>-->
<!--			Tudo-->
<!--		</button>-->
<!--	</div>-->
</div>

<p><a href="/posts/add" >Criar post</a></p>
<p><a href="/users/" >Usuários</a></p>

<div class="container">
	<?php $count = 0; ?>
	<?php foreach ($posts as $post): ?>
		<?php if ($count % 4 == 0): ?>
			<div class="row">
		<?php endif; ?>

		<div class="col-lg-3 mb-3" >
			<a class="card-posts" href="/posts/view/<?= $post['Post']['id']; ?>">
			<div class="card" >
				<img src="https://www.collinsdictionary.com/images/full/skyblue_573262585_1000.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?= h($post['Post']['title']); ?></h5>
					<div class="card-subtitle mb-2 text-body-secondary d-flex justify-content-between">
						<?php
							$created = strtotime($post['Post']['created']); // Converte a string para timestamp
							$data = date('d M Y', $created); // Formata a data
						?>
						<h6>Por: <?= h($post['Post']['user_id']); ?></h6>
						<h6><i class="ri-time-line"></i> <?= $data ?></h6>
					</div>

					<p class="card-text">
						<?php
							$body = h($post['Post']['body']);
							echo mb_strimwidth($body, 0, 75, "...");
						?>
					</p>
				</div>
			</div>
			</a>
		</div>

		<?php $count++; ?>
		<?php if ($count % 4 == 0): ?>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>

	<?php if ($count % 4 != 0): ?>
</div>
<?php endif; ?>

<?php
	function paginationButton($label, $content) {
		if (strpos($content, '<a') !== false) {
			return '<button class="btn btn-sm btn-outline-secondary">' . $content . '</button>';
		} else {
			return '<button class="btn btn-sm btn-secondary" disabled>' . $label . '</button>';
		}
	}
?>

<div class="row">
	<div class="col-6">
		<?= paginationButton('First', $first); ?>
		<?= paginationButton('Previous', $prev); ?>
	</div>
	<div class="col-6 d-flex justify-content-end">
		<?= paginationButton('Next', $next); ?>
		<?= paginationButton('Last', $last); ?>
	</div>
</div>
