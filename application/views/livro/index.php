<div class="pull-right">
	<a href="<?php echo site_url('livro/add'); ?>" data-toggle="tooltip" title="Adicionar Livro" class="btn btn-success"><i class="fas fa-plus"></i></a> 
</div>
<p></p>
<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Autor</th>
		<th>Id Genero</th>
		<th>Titulo</th>
		<th>Publicacao</th>
		<th>Sinopse</th>
		<th>Ações</th>
    </tr>
	<?php foreach($livro as $l){ ?>
    <tr>
		<td><?php echo $l['id']; ?></td>
		<td><?php echo $l['nome_autor']; ?></td>
		<td><?php echo $l['genero']; ?></td>
		<td><?php echo $l['titulo']; ?></td>
		<td><?php echo $l['publicacao']; ?></td>
		<td><?php echo $l['sinopse']; ?></td>
		<td>
            <a href="<?php echo site_url('livro/edit/'.$l['id']); ?>" data-toggle="tooltip" title="Editar dados do Livro" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a> 
            <a href="<?php echo site_url('livro/capa/'.$l['id']); ?>" data-toggle="tooltip" title="Upload da Capa do Livro" class="btn btn-secondary btn-xs"><i class="fas fa-file-upload"></i></a>
            <a href="<?php echo site_url('livro/remove/'.$l['id']); ?>" data-toggle="tooltip" title="Excluir Livro" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $paginacao ?>    
</div>