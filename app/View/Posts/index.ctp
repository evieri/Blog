<?php

	$first = $this->Paginator->first('<<', array('class' => 'btn btn-outline-secondary m-1'), '<<', array('class' => 'btn btn-secondary m-1'));
	$prev = $this->Paginator->prev('Anterior', array('class' => 'btn btn-outline-secondary m-1'), 'Anterior', array('class' => 'btn btn-secondary m-1'));
	$next = $this->Paginator->next('Próximo', array('class' => 'btn btn-outline-secondary m-1'), 'Próximo', array('class' => 'btn btn-secondary m-1'));
	$last = $this->Paginator->last('>>', array('class' => 'btn btn-outline-secondary m-1'), '>>', array('class' => 'btn btn-secondary m-1'));

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1>Blog posts</h1>

	<div class="dropdown">

		<button type="button" class="btn btn-sm btn-outline-secondary "><a class="link-underline link-underline-opacity-0" href="/posts/add" >Criar post</a></button>
		<button type="button" class="btn btn-sm btn-outline-secondary m-1"><a class="link-underline link-underline-opacity-0" href="/users/" >Usuários</a></button>

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

<div class="m-auto d-flex justify-content-center mt-3">
	<?= $first, $prev, $next, $last ?>
</div>
