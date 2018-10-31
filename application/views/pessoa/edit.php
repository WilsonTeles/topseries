<?php echo form_open('pessoa/edit/' . $pessoa['id'], array("class" => "form-horizontal")); ?>

<div class="form-group">
    <label for="nome" class="col-md-4 control-label"><span class="text-danger">*</span>Nome</label>
    <div class="col-md-8">
        <input type="text" name="nome" value="<?php echo ($this->input->post('nome') ? $this->input->post('nome') : $pessoa['nome']); ?>" class="form-control" id="nome" />
        <span class="text-danger"><?php echo form_error('nome'); ?></span>
    </div>
</div>
<p></p>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" data-toggle="tooltip" title="Incluir" class="btn btn-success"><i class="fas fa-check"></i></button>
        <a href="<?php echo site_url('Pessoa') ?>" data-toggle="tooltip" title="Retornar" class="btn btn-warning btn-xs"><i class="fas fa-undo-alt"></i></a>
    </div>
</div>

<?php echo form_close(); ?>