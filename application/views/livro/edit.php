<?php echo form_open('livro/edit/' . $livro['id'], array("class" => "form-horizontal")); ?>

<div class="form-group">
    <label for="personagem1" class="col-md-4 control-label">Personagem 1</label>
    <div class="col-md-8">
        <select name="personagem1" class="form-control">
            <option value="">Selecione o Personagem</option>
            <?php
            foreach ($all_pessoa as $pessoa) {
                $selected = ($pessoa['id'] == $livro['personagem1']) ? ' selected="selected"' : "";

                echo '<option value="' . $pessoa['id'] . '" ' . $selected . '>' . $pessoa['nome'] . '</option>';
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="personagem2" class="col-md-4 control-label">Personagem 2</label>
    <div class="col-md-8">
        <select name="personagem2" class="form-control">
            <option value="">Selecione o Personagem</option>
            <?php
            foreach ($all_pessoa as $pessoa) {
                $selected = ($pessoa['id'] == $livro['personagem2']) ? ' selected="selected"' : "";

                echo '<option value="' . $pessoa['id'] . '" ' . $selected . '>' . $pessoa['nome'] . '</option>';
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="personagem3" class="col-md-4 control-label">Personagem 3</label>
    <div class="col-md-8">
        <select name="personagem3" class="form-control">
            <option value="">Selecione o Personagem</option>
<?php
foreach ($all_pessoa as $pessoa) {
    $selected = ($pessoa['id'] == $livro['personagem3']) ? ' selected="selected"' : "";

    echo '<option value="' . $pessoa['id'] . '" ' . $selected . '>' . $pessoa['nome'] . '</option>';
}
?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="personagem4" class="col-md-4 control-label">Personagem 4</label>
    <div class="col-md-8">
        <select name="personagem4" class="form-control">
            <option value="">Selecione o Personagem</option>
<?php
foreach ($all_pessoa as $pessoa) {
    $selected = ($pessoa['id'] == $livro['personagem4']) ? ' selected="selected"' : "";

    echo '<option value="' . $pessoa['id'] . '" ' . $selected . '>' . $pessoa['nome'] . '</option>';
}
?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="autor" class="col-md-4 control-label">Autor</label>
    <div class="col-md-8">
        <select name="autor" class="form-control">
            <option value="">Selecione o Autor</option>
<?php
foreach ($all_pessoa as $pessoa) {
    $selected = ($pessoa['id'] == $livro['autor']) ? ' selected="selected"' : "";

    echo '<option value="' . $pessoa['id'] . '" ' . $selected . '>' . $pessoa['nome'] . '</option>';
}
?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="id_genero" class="col-md-4 control-label">Genero</label>
    <div class="col-md-8">
        <select name="id_genero" class="form-control">
            <option value="">select genero</option>
<?php
foreach ($all_genero as $genero) {
    $selected = ($genero['id'] == $livro['id_genero']) ? ' selected="selected"' : "";

    echo '<option value="' . $genero['id'] . '" ' . $selected . '>' . $genero['descricao'] . '</option>';
}
?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="titulo" class="col-md-4 control-label"><span class="text-danger">*</span>Titulo</label>
    <div class="col-md-8">
        <input type="text" name="titulo" value="<?php echo ($this->input->post('titulo') ? $this->input->post('titulo') : $livro['titulo']); ?>" class="form-control" id="titulo" />
        <span class="text-danger"><?php echo form_error('titulo'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="publicacao" class="col-md-4 control-label">Publicacao</label>
    <div class="col-md-8">
        <input type="text" name="publicacao" value="<?php echo ($this->input->post('publicacao') ? $this->input->post('publicacao') : $livro['publicacao']); ?>" class="form-control" id="publicacao" />
        <span class="text-danger"><?php echo form_error('publicacao'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="sinopse" class="col-md-4 control-label">Sinopse</label>
    <div class="col-md-8">
        <input type="text" name="sinopse" value="<?php echo ($this->input->post('sinopse') ? $this->input->post('sinopse') : $livro['sinopse']); ?>" class="form-control" id="sinopse" />
        <span class="text-danger"><?php echo form_error('sinopse'); ?></span>
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
        <a href="<?php echo site_url('Livro') ?>" data-toggle="tooltip" title="Retornar" class="btn btn-warning btn-xs"><i class="fas fa-undo-alt"></i></a>
    </div>
</div>

<?php echo form_close(); ?>