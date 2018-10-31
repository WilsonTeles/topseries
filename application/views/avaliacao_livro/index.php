<div class="row">

    <div class="col-4">
        <div class="card ml-4 shadow p-3 mb-3 bg-white rounded" style="width: 20rem;">
            <h5 class="card-title"><?php echo $livro['titulo']; ?></h5>
            <img class="card-img-top show_livro" 

                 data-sinopse_livro="<?php echo $livro['sinopse'] ?>" 
                 data-autor="<?php echo $livro['nomeautor'] ?>" 
                 data-personagem1="<?php echo $livro['nomepersonagem1'] ?>"  data-personagem3="<?php echo $livro['nomepersonagem3'] ?>"
                 data-personagem2="<?php echo $livro['nomepersonagem2'] ?>"  data-personagem4="<?php echo $livro['nomepersonagem4'] ?>"
                 alt="<?php echo $livro['titulo']; ?>"


                 src="<?php echo base_url("uploads/livro/" . $livro['id'] . ".png"); ?>" alt="<?php echo $livro['titulo']; ?>">
            <div class="card-body">
                <p class="card-text"><?php echo $livro['sinopse']; ?></p>
                <a href="<?php echo site_url('avaliacao_livro/add'); ?>" data-toggle="tooltip" title="Avalie o livro" class="btn btn-success">Avalie!</a> 

                <?php if ($livro['wiki'] != "") { ?>
                    <a href="<?php echo ($livro['wiki']) ?>"data-toggle="tooltip" title="Mais informações na Wikipedia" target="_blank"><i class="btn btn-secondary fab fa-wikipedia-w"></i></a>
                <?php } ?>
                <?php
                if ($livro['media'] >= 8) {

                    $aux = '<i class="btn btn-secondary far fa-smile"> ' . number_format($livro['media'], 1) . '</i>';
                } else {
                    if (($livro['media'] < 8) && ($livro['media'] > 5)) {
                        $aux = '<i class="btn btn-secondary far fa-meh"> ' . number_format($livro['media'], 1) . '</i>';
                    } else {
                        $aux = '<i class="btn btn-secondary far fa-angry"> ' . number_format($livro['media'], 1) . '</i>';
                    }
                }
                ?>
                <a href="#" alt="Notas dos usuários"><?php echo $aux; ?></a>  
            </div>

        </div>
    </div>   

    <div class="col-8">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Avaliação</th>
                <th>Nota</th	
            </tr>
            <?php foreach ($avaliacao_livro as $a) { ?>
                <tr>
                    <td><?php echo $a['avaliacao']; ?></td>
                    <td><?php echo $a['nota']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <div class="pull-right">
            <?php echo $paginacao ?>    
        </div>
    </div>
</div>
