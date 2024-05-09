<h1>Blog posts</h1>
<p><a href="/posts/add" >Criar post</a></p>

<?php
	$tHeader = array('Id', 'Título', 'Ação', 'Data de criação');
	$header = $this->Html->tableHeaders($tHeader);

	$body = '';

	foreach ($posts as $post):
		$tBody = array(
			$post['Post']['id'],
			$this->Html->link(
				$post['Post']['title'],
				array('action' => 'view', $post['Post']['id'])
			),
			$this->Form->postLink(
				'Apagar',
				array('action' => 'delete', $post['Post']['id']),
				array('confirm' => 'Are you sure?')
			) . ' ' .
			$this->Html->link(
				'Editar',
				array('action' => 'edit', $post['Post']['id'])
			),
			$post['Post']['created']
		);
		$body .= $this->Html->tableCells($tBody);
	endforeach;

	echo $this->Html->tag('table', $header . $body);
?>


