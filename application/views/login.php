
  <?php echo validation_errors(); ?>
  <?php echo form_open('Login/validar'); ?>
    
    <div class="col col-lg-6">
    <div class="form-group">
      <label for="cpf">CPF:</label>
      <input type="cpf" class="form-control" id="cpf" value="" placeholder="Entre com o CPF" name="cpf">
    </div>
    <div class="form-group">
      <label for="senha">Senha:</label>
      <input type="password" class="form-control" id="senha" value="" placeholder="Entre com a sua senha" name="senha">
    </div>
    <button type="submit" class="btn btn-success">Confirmar</button>
    <a href="<?php echo base_url('Welcome')?>" class="btn btn-danger" role="button">Retornar</a>
  <?php echo form_close(); ?>
  <br>
</div>
 
