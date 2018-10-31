<div class="pull-right">
	<a href="<?php echo site_url('filme/add'); ?>" data-toggle="tooltip" title="Adicionar Filme" class="btn btn-success"><i class="fas fa-plus"></i></a>  
</div>
<p></p>
<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Diretor</th>
		<th>Gênero</th>
		<th>Título</th>
		<th>Sinopse</th>
		<th>Duração</th>
		<th>Ano</th>
		<th>Ações</th>
    </tr>
	<?php foreach($filme as $f){ ?>
    <tr>
		<td><?php echo $f['id']; ?></td>
		<td><?php echo $f['nome_diretor']; ?></td>
		<td><?php echo $f['genero']; ?></td>
		<td><?php echo $f['titulo']; ?></td>
		<td><?php echo $f['sinopse']; ?></td>
		<td><?php echo $f['duracao']; ?></td>
		<td><?php echo $f['ano']; ?></td>
		<td>
            <a href="<?php echo site_url('filme/edit/'.$f['id']); ?>" data-toggle="tooltip" title="Editar dados do Filme" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a> 
            <a href="<?php echo site_url('filme/capa/'.$f['id']); ?>" data-toggle="tooltip" title="Upload da Capa do Filme" class="btn btn-secondary btn-xs"><i class="fas fa-file-upload"></i></a>
            <a href="<?php echo site_url('filme/remove/'.$f['id']); ?>" data-toggle="tooltip" title="Excluir Filme" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $paginacao ?>    
</div>
