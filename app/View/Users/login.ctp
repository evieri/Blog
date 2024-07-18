<?php
	$this->Js->buffer('$(".message error").addClass("alert alert-danger");');
?>

<div class="users form">
	<?php echo $this->Flash->render('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
</div>

<div class="d-flex align-items-center justify-content-center">

	<div class="w-25 text-center pt-5 pb-5">

		<div class="users-form">
			<form method="POST" action="/users/add">

				<fieldset>

					<legend class="fw-bold fs-3 pt-5 pb-4">Login</legend>

					<div class="form-floating mb-3">
						<input type="text" class="form-control rounded-3" name="data[User][username]" id="UserUsername" required="required" placeholder="" >
						<label for="UserUsername">Usuário</label>
					</div>

					<div class="form-floating mb-3">
						<input type="password" class="form-control rounded-3" name="data[User][password]" id="UserPassword" required="required" placeholder="">
						<label for="floatingPassword">Senha</label>
					</div>

					<small class="text-body-secondary">Não tem uma conta? <a href="/users/add">Inscreva-se.</a></small>

					<button class="w-100 mb-4 mt-3 btn btn-lg rounded-3 btn-primary" type="submit">Entrar</button>

				</fieldset>

			</form>
		</div>

	</div>

</div>

<?php
	$this->Js->buffer('$(".message").addClass("alert alert-danger alert-dismissible fade show container mt-4 ").attr("role", "alert").prepend(\'<i class="ri-alert-fill"> </i>\').append(\'<button type="button" class="btn-close" data-bs-dismiss="alert"></button>\');');
?>
