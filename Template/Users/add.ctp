<h1> Cadastrar usuário </h1>
<?php
echo $this->Form->Create($user);
echo $this->Form->control('nome');
echo $this->Form->control('email');
echo $this->Form->button('Cadastrar');
echo $this->Form->end();