
<h2>Filmes recentes</h2>
<div class="row">
    <?php foreach ($filmes as $f) { ?>
        <div class="card ml-4 shadow p-3 mb-3 bg-white rounded" style="width: 20rem;">
            <h5 class="card-title"><?php echo $f['titulo']; ?></h5>
            <img class="card-img-top  show_img" src="<?php echo base_url("uploads/filme/" . $f['id'] . ".png"); ?>"
                 data-sinopse="<?php echo $f['sinopse'] ?>" 
                 data-diretor="<?php echo $f['nomediretor'] ?>" 
                 data-ator1="<?php echo $f['nomeator1'] ?>"  data-ator2="<?php echo $f['nomeator2'] ?>"
                 data-ator3="<?php echo $f['nomeator3'] ?>"  data-ator4="<?php echo $f['nomeator4'] ?>"

                 alt="<?php echo $f['titulo']; ?>">
            <div class="card-body">
                <p class="card-text"><?php echo $f['sinopse']; ?></p>
            </div>
            <div class="card-footer">
                <a href="<?php echo base_url("Avaliacao_filme/selecao_filme/") . $f['id'] ?>" data-toggle="tooltip" title="Veja as avaliações e Avalie!" class="btn btn-success">Avaliações</a>

                <?php if ($f['wiki'] != "") { ?>
                    <a href="<?php echo ($f['wiki']) ?>" data-toggle="tooltip" title="Mais informações na Wikipedia" target="_blank"><i class="btn btn-secondary fab fa-wikipedia-w"></i></a>
                <?php } ?>

                <?php
                if ($f['media'] >= 8) {

                    $aux = '<i class="btn btn-secondary far fa-smile"> ' . number_format($f['media'], 1) . '</i>';
                } else {
                    if (($f['media'] < 8) && ($f['media'] > 5)) {
                        $aux = '<i class="btn btn-secondary far fa-meh"> ' . number_format($f['media'], 1) . '</i>';
                    } else {
                        $aux = '<i class="btn btn-secondary far fa-angry"> ' . number_format($f['media'], 1) . '</i>';
                    }
                }
                ?>

                <a href="#" data-toggle="tooltip" title="Avaliação dos usuários" alt="Notas dos usuários"><?php echo $aux; ?></a>

            </div>
        </div>

    <?php } ?>
</div>

<h2>Séries Recentes</h2>
<div class="row">
    <?php foreach ($series as $f) { ?>
        <div class="card ml-4 shadow p-3 mb-3 bg-white rounded" style="width: 20rem;">
            <h5 class="card-title"><?php echo $f['titulo']; ?></h5>
            <img class="card-img-top show_img"

                 data-sinopse="<?php echo $f['sinopse'] ?>" 
                 data-diretor="<?php echo $f['nomediretor'] ?>" 
                 data-ator1="<?php echo $f['nomeator1'] ?>"  data-ator2="<?php echo $f['nomeator2'] ?>"
                 data-ator3="<?php echo $f['nomeator3'] ?>"  data-ator4="<?php echo $f['nomeator4'] ?>"
                 src="<?php echo base_url("uploads/serie/" . $f['id'] . ".png"); ?>" alt="sem folder">
            <div class="card-body">
                <p class="card-text"><?php echo $f['sinopse']; ?></p>
            </div>
            <div class="card-footer">
                <a href="<?php echo base_url("Avaliacao_serie/selecao_serie/") . $f['id'] ?>" data-toggle="tooltip" title="Veja as avaliações e Avalie!" class="btn btn-success">Avaliações</a>
                <?php if ($f['wiki'] != "") { ?>
                    <a href="<?php echo ($f['wiki']) ?>" data-toggle="tooltip" title="Mais informações na Wikipedia" target="_blank"><i class="btn btn-secondary fab fa-wikipedia-w"></i></a>
                <?php } ?>
                <?php
                if ($f['media'] >= 8) {

                    $aux = '<i class="btn btn-secondary far fa-smile"> ' . number_format($f['media'], 1) . '</i>';
                } else {
                    if (($f['media'] < 8) && ($f['media'] > 5)) {
                        $aux = '<i class="btn btn-secondary far fa-meh"> ' . number_format($f['media'], 1) . '</i>';
                    } else {
                        $aux = '<i class="btn btn-secondary far fa-angry"> ' . number_format($f['media'], 1) . '</i>';
                    }
                }
                ?>
                <a href="#" data-toggle="tooltip" title="Avaliação dos usuários" alt="Notas dos usuários"><?php echo $aux; ?></a>
            </div>

        </div>

    <?php } ?>
</div>  

<h2>Livros recentes</h2>
<div class="row">
    <?php foreach ($livros as $f) { ?>
        <div class="card ml-4 shadow p-3 mb-3 bg-white rounded" style="width: 20rem;">
            <h5 class="card-title"><?php echo $f['titulo']; ?></h5>
            <img class="card-img-top show_livro" 

                 data-sinopse_livro="<?php echo $f['sinopse'] ?>" 
                 data-autor="<?php echo $f['nomeautor'] ?>" 
                 data-personagem1="<?php echo $f['nomepersonagem1'] ?>"  data-personagem3="<?php echo $f['nomepersonagem3'] ?>"
                 data-personagem2="<?php echo $f['nomepersonagem2'] ?>"  data-personagem4="<?php echo $f['nomepersonagem4'] ?>"

                 src="<?php echo base_url("uploads/livro/" . $f['id'] . ".png"); ?>" alt="<?php echo $f['titulo']; ?>">
            <div class="card-body">
                <p class="card-text"><?php echo $f['sinopse']; ?></p>
            </div>
            <div class="card-footer">
                <a href="<?php echo base_url("Avaliacao_livro/selecao_livro/") . $f['id'] ?>" data-toggle="tooltip" title="Veja as avaliações e Avalie!" class="btn btn-success">Avaliações</a>
                <?php if ($f['wiki'] != "") { ?>
                    <a href="<?php echo ($f['wiki']) ?>" data-toggle="tooltip" title="Mais informações na Wikipedia" target="_blank"><i class="btn btn-secondary fab fa-wikipedia-w"></i></a>
                    <?php } ?>
                    <?php
                    if ($f['media'] >= 8) {

                        $aux = '<i class="btn btn-secondary far fa-smile"> ' . number_format($f['media'], 1) . '</i>';
                    } else {
                        if (($f['media'] < 8) && ($f['media'] > 5)) {
                            $aux = '<i class="btn btn-secondary far fa-meh"> ' . number_format($f['media'], 1) . '</i>';
                        } else {
                            $aux = '<i class="btn btn-secondary far fa-angry"> ' . number_format($f['media'], 1) . '</i>';
                        }
                    }
                    ?>
                <a href="#" data-toggle="tooltip" title="Avaliação dos usuários" alt="Notas dos usuários"><?php echo $aux; ?></a>    
            </div>
        </div>

    <?php } ?>
</div>
