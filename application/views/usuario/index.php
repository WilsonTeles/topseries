<div class="pull-right">
	<a href="<?php echo site_url('usuario/add'); ?>" data-toggle="tooltip" title="Adicionar Usuários" class="btn btn-success"><i class="fas fa-plus"></i></a>  
</div>
<p></p>
<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Cpf</th>
		<th>Nome</th>
		<th>Email</th>
		<th>Senha</th>
		<th>Ações</th>
    </tr>
	<?php foreach($usuario as $u){ ?>
    <tr>
		<td><?php echo $u['id']; ?></td>
                <td><?php echo $u['cpf']; ?></td>
                <td><?php echo $u['nome']; ?></td>
                <td><?php echo $u['email']; ?></td>
		<td><?php echo $u['senha']; ?></td>
		
		
		
		<td>
            <a href="<?php echo site_url('usuario/edit/'.$u['id']); ?>" data-toggle="tooltip" title="Editar dados do Usuário" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>  
            <a href="<?php echo site_url('usuario/remove/'.$u['id']); ?>" data-toggle="tooltip" title="Excluir Usuário" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $paginacao ?>    
</div>