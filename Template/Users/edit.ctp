<h1>Editar usuário </h1>
<?php
echo $this->Form->Create($user);
echo $this->Form->Edit('nome');
echo $this->Form->Edit('email');
echo $this->Form->button('Salvar');
echo $this->Form->end();