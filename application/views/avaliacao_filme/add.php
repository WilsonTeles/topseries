<?php echo form_open('avaliacao_filme/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="avaliacao" class="col-md-4 control-label"><span class="text-danger">*</span>Avaliação</label>
		<div class="col-md-8">
			<input type="text" name="avaliacao" value="<?php echo $this->input->post('avaliacao'); ?>" class="form-control" id="avaliacao" />
			<span class="text-danger"><?php echo form_error('avaliacao');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nota" class="col-md-4 control-label"><span class="text-danger">*</span>Nota</label>
		<div class="col-md-8">
			<input type="text" name="nota" value="<?php echo $this->input->post('nota'); ?>" class="form-control" id="nota" />
			<span class="text-danger"><?php echo form_error('nota');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Salvar</button>
                        <a href="<?php echo base_url("Avaliacao_filme/")?>" data-toggle="tooltip" title="Retornar" class="btn btn-warning btn-xs"><i class="fas fa-undo-alt"></i></a>
        </div>
	</div>

<?php echo form_close(); ?>