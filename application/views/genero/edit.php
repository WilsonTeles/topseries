<?php echo form_open('genero/edit/' . $genero['id'], array("class" => "form-horizontal")); ?>

<div class="form-group">
    <label for="descricao" class="col-md-4 control-label"><span class="text-danger">*</span>Descrição</label>
    <div class="col-md-8">
        <input type="text" name="descricao" value="<?php echo ($this->input->post('descricao') ? $this->input->post('descricao') : $genero['descricao']); ?>" class="form-control" id="descricao" />
        <span class="text-danger"><?php echo form_error('descricao'); ?></span>
    </div>
</div>
<p></p>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" data-toggle="tooltip" title="Incluir" class="btn btn-success"><i class="fas fa-check"></i></button>
        <a href="<?php echo site_url('Genero') ?>" data-toggle="tooltip" title="Retornar" class="btn btn-warning btn-xs"><i class="fas fa-undo-alt"></i></a>
    </div>
</div>

<?php echo form_close(); ?>