<div class="pull-left">
	<a href="<?php echo site_url('Coordenador/add'); ?>" class="btn btn-success">Incluir</a> 
        <p></p>
</div>



<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Nome</th>
		<th>Cpf</th>
		<th>Email</th>
		<th>Ações</th>
    </tr>
	<?php foreach($coordenador as $c){ ?>
    <tr>
		<td><?php echo $c['id']; ?></td>
		<td><?php echo $c['nome']; ?></td>
		<td><?php echo $c['cpf']; ?></td>
		<td><?php echo $c['email']; ?></td>
		<td>
            <a href="<?php echo site_url('coordenador/edit/'.$c['id']); ?>" class="btn btn-info btn-xs">Editar</a> 
            <a href="<?php echo site_url('coordenador/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs">Excluir</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
