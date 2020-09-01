<div style ="padding: 15px">
    <h1> <?= __('Formulário contato'); ?> </h1>

    <?php

    echo $this->Form->create($contato, ['type' => 'file']);
    echo $this->Form->email('email');
    echo $this->Form->control('assunto');
    echo $this->Form->control('body');
    echo $this->Form->submit('Enviar');
    echo $this->Form->end();
    ?>

    
</div>