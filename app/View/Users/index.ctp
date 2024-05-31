<h1>Blog posts</h1>
<p><a href="/users/add" >Criar usuário</a></p>

<?php
$tHeader = array('Id', 'Nome', 'Ação', 'Data de criação');
$header = $this->Html->tableHeaders($tHeader);

$body = '';

foreach ($users as $user):
	$tBody = array(
		$user['User']['id'],
		$this->Html->link(
			$user['User']['username'],
			array('action' => 'view', $user['User']['id'])
		),
		$this->Html->link(
			'Editar',
			array('action' => 'edit', $user['User']['id'])
		) . ' ' .
		$this->Form->postLink(
			'Apagar',
			array('action' => 'delete', $user['User']['id']),
			array('confirm' => 'Are you sure?')
		),
		$user['User']['created']
	);
	$body .= $this->Html->tableCells($tBody);
endforeach;

echo $this->Html->tag('table', $header . $body);
?>
