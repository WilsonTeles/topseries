<?php echo form_open('coordenador/edit/'.$coordenador['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nome" class="col-md-4 control-label"><span class="text-danger">*</span>Nome</label>
		<div class="col-md-8">
			<input type="text" name="nome" value="<?php echo ($this->input->post('nome') ? $this->input->post('nome') : $coordenador['nome']); ?>" class="form-control" id="nome" />
			<span class="text-danger"><?php echo form_error('nome');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="cpf" class="col-md-4 control-label"><span class="text-danger">*</span>Cpf</label>
		<div class="col-md-8">
			<input type="text" name="cpf" value="<?php echo ($this->input->post('cpf') ? $this->input->post('cpf') : $coordenador['cpf']); ?>" class="form-control" id="cpf" />
			<span class="text-danger"><?php echo form_error('cpf');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="senha" class="col-md-4 control-label"><span class="text-danger">*</span>Senha</label>
		<div class="col-md-8">
			<input type="text" name="senha" value="<?php echo ($this->input->post('senha') ? $this->input->post('senha') : $coordenador['senha']); ?>" class="form-control" id="senha" />
			<span class="text-danger"><?php echo form_error('senha');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $coordenador['email']); ?>" class="form-control" id="email" />
			<span class="text-danger"><?php echo form_error('email');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Confirmar</button>
                        <a href="<?php echo base_url('Coordenador')?>" class="btn btn-danger" role="button">Retornar</a>
        </div>
	</div>
	
<?php echo form_close(); ?>