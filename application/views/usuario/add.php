<?php echo form_open('usuario/add', array("class" => "form-horizontal")); ?>


<div class="form-group">
    <label for="cpf" class="col-md-4 control-label"><span class="text-danger">*</span>Cpf</label>
    <div class="col-md-8">
        <input type="text" name="cpf" value="<?php echo $this->input->post('cpf'); ?>" class="form-control" id="cpf" />
        <span class="text-danger"><?php echo form_error('cpf'); ?></span>
    </div>
</div>


<div class="form-group">
    <label for="nome" class="col-md-4 control-label"><span class="text-danger">*</span>Nome</label>
    <div class="col-md-8">
        <input type="text" name="nome" value="<?php echo $this->input->post('nome'); ?>" class="form-control" id="nome" />
        <span class="text-danger"><?php echo form_error('nome'); ?></span>
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
    <div class="col-md-8">
        <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
        <span class="text-danger"><?php echo form_error('email'); ?></span>
    </div>
</div>

<div class="form-group">
    <label for="senha" class="col-md-4 control-label"><span class="text-danger">*</span>Senha</label>
    <div class="col-md-8">
        <input type="text" name="senha" value="<?php echo $this->input->post('senha'); ?>" class="form-control" id="senha" />
        <span class="text-danger"><?php echo form_error('senha'); ?></span>
    </div>
</div>


<p></p>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" data-toggle="tooltip" title="Incluir" class="btn btn-success"><i class="fas fa-check"></i></button>
        <a href="<?php echo site_url('Usuario') ?>" data-toggle="tooltip" title="Retornar" class="btn btn-warning btn-xs"><i class="fas fa-undo-alt"></i></a>
    </div>
</div>

<?php echo form_close(); ?>