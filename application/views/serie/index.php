<div class="pull-right">
	<a href="<?php echo site_url('serie/add'); ?>" data-toggle="tooltip" title="Adicionar Série" class="btn btn-success"><i class="fas fa-plus"></i></a> 
</div>
<p></p>
<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Diretor</th>
		<th>Gênero</th>
		<th>Título</th>
		<th>Episódios</th>
		<th>Temporadas</th>
		<th>Sinopse</th>
		<th>Ações</th>
    </tr>
	<?php foreach($serie as $s){ ?>
    <tr>
		<td><?php echo $s['id']; ?></td>
		<td><?php echo $s['nome_diretor']; ?></td>
		<td><?php echo $s['genero']; ?></td>
		<td><?php echo $s['titulo']; ?></td>
		<td><?php echo $s['episodios']; ?></td>
		<td><?php echo $s['temporadas']; ?></td>
		<td><?php echo $s['sinopse']; ?></td>
		<td>
            <a href="<?php echo site_url('serie/edit/'.$s['id']); ?>" data-toggle="tooltip" title="Editar dados da Série" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a> 
            <a href="<?php echo site_url('serie/capa/'.$s['id']); ?>" data-toggle="tooltip" title="Upload da capa da Série" class="btn btn-secondary btn-xs"><i class="fas fa-file-upload"></i></a>
            <a href="<?php echo site_url('serie/remove/'.$s['id']); ?>" data-toggle="tooltip" title="Excluir Série" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $paginacao ?>    
</div>