<div class="pull-right">
	<a href="<?php echo site_url('genero/add'); ?>" data-toggle="tooltip" title="Adicionar Gênero" class="btn btn-success"><i class="fas fa-plus"></i></a> 
</div>
<p></p>
<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Descrição</th>
		<th>Ações</th>
    </tr>
	<?php foreach($genero as $g){ ?>
    <tr>
		<td><?php echo $g['id']; ?></td>
		<td><?php echo $g['descricao']; ?></td>
		<td>
            <a href="<?php echo site_url('genero/edit/'.$g['id']); ?>" data-toggle="tooltip" title="Editar dados do Gênero" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a> 
            <a href="<?php echo site_url('genero/remove/'.$g['id']); ?>" data-toggle="tooltip" title="Excluir Gênero" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $paginacao ?>    
</div>