<div class="pull-right">
	<a href="<?php echo site_url('pessoa/add'); ?>" data-toggle="tooltip" title="Adicionar Pessoas" class="btn btn-success"><i class="fas fa-plus"></i></a> 
</div>

<p></p>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Nome</th>
		<th>Ações</th>
    </tr>
	<?php foreach($pessoa as $p){ ?>
    <tr>
		<td><?php echo $p['id']; ?></td>
		<td><?php echo $p['nome']; ?></td>
		<td>
            <a href="<?php echo site_url('pessoa/edit/'.$p['id']); ?>" data-toggle="tooltip" title="Editar dados da Pessoa" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a> 
            <a href="<?php echo site_url('pessoa/remove/'.$p['id']); ?>" data-toggle="tooltip" title="Excluir Pessoa" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $paginacao ?>    
</div>