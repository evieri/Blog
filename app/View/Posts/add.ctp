<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1>Adicionar Post</h1>

</div>

<?php
	$options =  [
		'class' => 'form-control',
		'div' => [
			'class' => 'mb-3'
		],
		'label' => [
			'class' => 'form-label'
		]
	];

	$button = [
		'type' => 'submit',
		'class' => 'btn btn-primary btn-lg mt-3'
	];

	echo $this->Form->create('Post', ['class' => 'd-grid mx-auto col-6']);
	echo $this->Form->input('title', $options);
	echo $this->Form->input('body', $options);
	echo $this->Form->input('id', ['type' => 'hidden']);
	echo $this->Form->button('Postar', $button);
?>


<!--<form action="/posts/add" id="PostAddForm" method="post" accept-charset="utf-8" class="d-grid mx-auto col-6">-->
<!--	<div class="mb-3">-->
<!--		<label for="PostTitle" class="form-label">Título</label>-->
<!--		<input class="form-control" name="data[Post][title]" maxlength="50" type="text" id="PostTitle" required="required">-->
<!--	</div>-->
<!--	<div class="mb-5">-->
<!--		<label for="PostBody" class="form-label">Conteúdo</label>-->
<!--		<textarea class="form-control" name="data[Post][body]" rows="3" cols="30" id="PostBody" required="required"></textarea>-->
<!--	</div>-->
<!--	<div class="d-grid col-12">-->
<!--		<button type="submit" class="btn btn-primary btn-lg">Postar</button>-->
<!--	</div>-->
<!--</form>-->
