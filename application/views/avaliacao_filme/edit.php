<?php echo form_open('avaliacao_filme/edit/'.$avaliacao_filme['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_filme" class="col-md-4 control-label"><span class="text-danger">*</span>Id Filme</label>
		<div class="col-md-8">
			<input type="text" name="id_filme" value="<?php echo ($this->input->post('id_filme') ? $this->input->post('id_filme') : $avaliacao_filme['id_filme']); ?>" class="form-control" id="id_filme" />
			<span class="text-danger"><?php echo form_error('id_filme');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="avaliacao" class="col-md-4 control-label"><span class="text-danger">*</span>Avaliação</label>
		<div class="col-md-8">
			<input type="text" name="avaliacao" value="<?php echo ($this->input->post('avaliacao') ? $this->input->post('avaliacao') : $avaliacao_filme['avaliacao']); ?>" class="form-control" id="avaliacao" />
			<span class="text-danger"><?php echo form_error('avaliacao');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nota" class="col-md-4 control-label"><span class="text-danger">*</span>Nota</label>
		<div class="col-md-8">
			<input type="text" name="nota" value="<?php echo ($this->input->post('nota') ? $this->input->post('nota') : $avaliacao_filme['nota']); ?>" class="form-control" id="nota" />
			<span class="text-danger"><?php echo form_error('nota');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Salvar</button>
        </div>
	</div>
	
<?php echo form_close(); ?>