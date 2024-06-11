<div class="d-flex align-items-center py-4 bg-body-tertiary">

	<div class="text-center">

		<div class="p-5 pb-4 border-bottom-0">
			<h1 class="fw-bold mb-0 fs-3 m-auto">Increva-se</h1>
		</div>

		<div class="p-4 users-form">
			<form>
				<div class="form-floating mb-3">
					<input type="email" class="form-control rounded-3" id="floatingInput" placeholder="">
					<label for="floatingInput">Usuário</label>
				</div>
				<div class="form-floating mb-3">
					<input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="">
					<label for="floatingPassword">Senha</label>
				</div>
				<button class="w-100 mb-4 mt-3 btn btn-lg rounded-3 btn-primary" type="submit">Entrar</button>

				<?php echo $this->Form->create('User'); ?>
				<fieldset>
					<h1 class="fw-bold mb-0 fs-3 m-auto">Increva-se</h1>
					<?php
					echo $this->Form->input('username', ['class' => 'form-control rounded-3']);
					echo $this->Form->input('password', ['class' => 'form-control rounded-3']);
					echo $this->Form->input('Perfil', array(
						'options' => array('admin' => 'Admin', 'author' => 'Author')
					));
					?>
				</fieldset>
				<?php echo $this->Form->end('Inscrever-se', ['class' => 'w-100 mb-4 mt-3 btn btn-lg rounded-3 btn-primary']); ?>

			</form>
		</div>

	</div>

</div>
