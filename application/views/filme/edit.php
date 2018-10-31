<?php echo form_open('filme/edit/' . $filme['id'], array("class" => "form-horizontal")); ?>

<div class="form-group">
    <label for="ator1" class="col-md-4 control-label">Ator 1</label>
    <div class="col-md-8">
        <select name="ator1" class="form-control">
            <option value="">Selecione o Ator</option>
            <?php
            foreach ($all_pessoa as $pessoa) {
                $selected = ($pessoa['id'] == $filme['ator1']) ? ' selected="selected"' : "";

                echo '<option value="' . $pessoa['id'] . '" ' . $selected . '>' . $pessoa['nome'] . '</option>';
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="ator2" class="col-md-4 control-label">Ator 2</label>
    <div class="col-md-8">
        <select name="ator2" class="form-control">
            <option value="">Selecione o Ator</option>
            <?php
            foreach ($all_pessoa as $pessoa) {
                $selected = ($pessoa['id'] == $filme['ator2']) ? ' selected="selected"' : "";

                echo '<option value="' . $pessoa['id'] . '" ' . $selected . '>' . $pessoa['nome'] . '</option>';
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="ator3" class="col-md-4 control-label">Ator 3</label>
    <div class="col-md-8">
        <select name="ator3" class="form-control">
            <option value="">Selecione o Ator</option>
<?php
foreach ($all_pessoa as $pessoa) {
    $selected = ($pessoa['id'] == $filme['ator3']) ? ' selected="selected"' : "";

    echo '<option value="' . $pessoa['id'] . '" ' . $selected . '>' . $pessoa['nome'] . '</option>';
}
?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="ator4" class="col-md-4 control-label">Ator 4</label>
    <div class="col-md-8">
        <select name="ator4" class="form-control">
            <option value="">Selecione o Ator</option>
<?php
foreach ($all_pessoa as $pessoa) {
    $selected = ($pessoa['id'] == $filme['ator4']) ? ' selected="selected"' : "";

    echo '<option value="' . $pessoa['id'] . '" ' . $selected . '>' . $pessoa['nome'] . '</option>';
}
?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="diretor" class="col-md-4 control-label"><span class="text-danger">*</span>Diretor</label>
    <div class="col-md-8">
        <select name="diretor" class="form-control">
            <option value="">Selecione o Diretor</option>
<?php
foreach ($all_pessoa as $pessoa) {
    $selected = ($pessoa['id'] == $filme['diretor']) ? ' selected="selected"' : "";

    echo '<option value="' . $pessoa['id'] . '" ' . $selected . '>' . $pessoa['nome'] . '</option>';
}
?>
        </select>
        <span class="text-danger"><?php echo form_error('diretor'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="id_genero" class="col-md-4 control-label">Genero</label>
    <div class="col-md-8">
        <select name="id_genero" class="form-control">
            <option value="">select genero</option>
<?php
foreach ($all_genero as $genero) {
    $selected = ($genero['id'] == $filme['id_genero']) ? ' selected="selected"' : "";

    echo '<option value="' . $genero['id'] . '" ' . $selected . '>' . $genero['descricao'] . '</option>';
}
?>
        </select>
        <span class="text-danger"><?php echo form_error('id_genero'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="titulo" class="col-md-4 control-label"><span class="text-danger">*</span>Titulo</label>
    <div class="col-md-8">
        <input type="text" name="titulo" value="<?php echo ($this->input->post('titulo') ? $this->input->post('titulo') : $filme['titulo']); ?>" class="form-control" id="titulo" />
        <span class="text-danger"><?php echo form_error('titulo'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="sinopse" class="col-md-4 control-label">Sinopse</label>
    <div class="col-md-8">
        <input type="text" name="sinopse" value="<?php echo ($this->input->post('sinopse') ? $this->input->post('sinopse') : $filme['sinopse']); ?>" class="form-control" id="sinopse" />
        <span class="text-danger"><?php echo form_error('sinopse'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="duracao" class="col-md-4 control-label">Duracao</label>
    <div class="col-md-8">
        <input type="text" name="duracao" value="<?php echo ($this->input->post('duracao') ? $this->input->post('duracao') : $filme['duracao']); ?>" class="form-control" id="duracao" />
        <span class="text-danger"><?php echo form_error('duracao'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="ano" class="col-md-4 control-label">Ano</label>
    <div class="col-md-8">
        <input type="text" name="ano" value="<?php echo ($this->input->post('ano') ? $this->input->post('ano') : $filme['ano']); ?>" class="form-control" id="ano" />
        <span class="text-danger"><?php echo form_error('ano'); ?></span>
    </div>
</div>

<div class="form-group">
    <label for="wiki" class="col-md-4 control-label">Link Wikipédia</label>
    <div class="col-md-8">
        <input type="text" name="wiki" value="<?php echo $this->input->post('wiki'); ?>" class="form-control" id="wiki" />
        <span class="text-danger"><?php echo form_error('wiki'); ?></span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" data-toggle="tooltip" title="Incluir" class="btn btn-success"><i class="fas fa-check"></i></button>
        <a href="<?php echo site_url('Filme') ?>" data-toggle="tooltip" title="Retornar" class="btn btn-warning btn-xs"><i class="fas fa-undo-alt"></i></a>
    </div>
</div>

<?php echo form_close(); ?>