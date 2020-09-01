
<!-- var_dump($usuarios);-->
<div class="users index large-12 medium-12 columns content">
<h3> <?php echo 'Usuários' ?> </h3> 
   <!-- table>thead>tr>th*4^^tbody>tr>th*4 -->
    <table>
        <thead>
            <tr>
                <th scope="col"><?php echo $this-> Paginator->sort('id');?></th>
                <th scope="col"><?php echo $this-> Paginator->sort('nome');?></th>
                <th scope="col"><?php echo $this-> Paginator->sort('email');?></th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($usuarios as $usuario):?>
            <tr>
                <td><?php echo $usuario->id; ?></td>
                <td><?php echo $usuario->nome; ?></td>
                <td><?php echo $usuario->email; ?></td>
                <td class = "actions"> 
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $usuario->id]) ?> 
                <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $usuario->id],
                 ['confirm' => __('Tem certeza?', $usuario->id)]) ?>
                </th>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->Html->link(('Cadastrar usuário'),['controller' => 'users', 'action' => 'add']);?>
    <div class = "paginator"> 
            <ul class="pagination">
                <?php echo $this->Paginator->first('<< ' . __('Primeira'));?>
                <?php echo $this->Paginator->prev('< ' . __('Anterior'));?>
                <?php echo $this->Paginator->numbers();?>
                <?php echo $this->Paginator->next(__('Próximo') . ' >');?>
                <?php echo $this->Paginator->last(__('Última') . ' >>');?>
            </ul>
            <p>
                <?php echo $this->Paginator->counter(['format' => __('Página {{page}} de 
                {{pages}}, mostrando {{current}} registro(s) do total de {{count}}')]) ?>
            </p>
    </div> 
</div>
