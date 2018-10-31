<?php echo form_open_multipart('filme/do_upload', array("class" => "form-horizontal")); ?>

<?php echo validation_errors(); ?>

<input type="hidden" name="id"  class="form-control" id="id" value="<?php echo $id ?>" />

<div class="form-group">
    <label for="capa" class="col-md-4 control-label"><span class="text-danger">*</span>Capa do Filme:</label>
    <div class="col-md-8">
        <input type="file" name="capa"  class="form-control" id="capa" />
        <span class="text-danger"><?php echo form_error('capa'); ?></span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" data-toggle="tooltip" title="Incluir" class="btn btn-success"><i class="fas fa-check"></i></button>
        <a href="<?php echo site_url('Filme') ?>" data-toggle="tooltip" title="Retornar" class="btn btn-warning btn-xs"><i class="fas fa-undo-alt"></i></a>
    </div>
</div>

<?php echo form_close(); ?>