<?php
	$created = strtotime($post['Post']['created']); // Converte a string para timestamp
	$data = date('d M Y', $created); // Formata a data
?>

<div class=" container mb-5 overflow-hidden rounded" style="height: 25rem; background: url(https://images.unsplash.com/photo-1621839673705-6617adf9e890?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D) no-repeat center center;"></div>

<div class="container row mx-auto">

	<div class="col-md-8">

		<article class="mx-3">

			<div class="d-flex justify-content-between align-items-center">

				<h2 class="display-5 fw-bold link-body-emphasis mb-1"><?= h($post['Post']['title']); ?></h2>

				<span><?= $this->Js->link("Voltar", '/' , ['update' => '#content', 'class' => 'btn btn-outline-secondary me-3']) ?></span>

			</div>

			<p class="text-secondary mb-4"><?= $data . ', por ' . $post['User']['name'] . ' ' . $post['User']['surname']; ?></p>

			<hr class="my-4">

			<p><?= h($post['Post']['body']); ?></p>

		</article>

		<hr>

	</div>

	<div class="col-md-4">

		<h2>Recentes:</h2>

		<hr class="mb-4">

		<?php $c=0; foreach ($posts as $post): $c++;?>

			<div class="col mb-4 mx-3" >

				<div class="card-posts">

					<div class="card border-0 h-100">

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

			<?php
			if ($c >= 4) {
				break;
			}
			?>

		<?php endforeach; ?>

	</div>

</div>

<?php
	if($this->request->is('ajax')) {
		echo $this->Js->writeBuffer();
	}
?>
