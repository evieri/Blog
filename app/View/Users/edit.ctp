<h1>Editar</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('name');
echo $this->Form->input('surname');
echo $this->Form->input('username');
echo $this->Form->password('password');
echo $this->Form->hidden('id');
echo $this->Form->end('Atualizar');
?>
