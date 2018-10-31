<div class="row">

    <div class="col-4">
        <div class="card ml-4 shadow p-3 mb-3 bg-white rounded" style="width: 20rem;">
            <h5 class="card-title"><?php echo $serie['titulo']; ?></h5>
            <img class="card-img-top show_img" 
                 
                 data-sinopse="<?php echo $serie['sinopse'] ?>" 
                 data-diretor="<?php echo $serie['nomediretor'] ?>" 
                 data-ator1="<?php echo $serie['nomeator1'] ?>"  data-ator2="<?php echo $serie['nomeator2'] ?>"
                 data-ator3="<?php echo $serie['nomeator3'] ?>"  data-ator4="<?php echo $serie['nomeator4'] ?>"

                 alt="<?php echo $serie['titulo']; ?>"
                    
                 src="<?php echo base_url("uploads/serie/" . $serie['id'] . ".png"); ?>" alt="<?php echo $serie['titulo']; ?>">
            <div class="card-body">
                <p class="card-text"><?php echo $serie['sinopse']; ?></p>
                <a href="<?php echo site_url('avaliacao_serie/add'); ?>"  data-toggle="tooltip" title="Avalie a Série" class="btn btn-success">Avalie!</a> 
                
                <?php if ($serie['wiki'] != "") { ?>
                    <a href="<?php echo ($serie['wiki']) ?>" data-toggle="tooltip" title="Mais informações na Wikipedia" target="_blank"><i class="btn btn-secondary fab fa-wikipedia-w"></i></a>
                <?php } ?>

                <?php
                if ($serie['media'] >= 8) {

                    $aux = '<i class="btn btn-secondary far fa-smile"> ' . number_format($serie['media'], 1) . '</i>';
                } else {
                    if (($serie['media'] < 8) && ($serie['media'] > 5)) {
                        $aux = '<i class="btn btn-secondary far fa-meh"> ' . number_format($serie['media'], 1) . '</i>';
                    } else {
                        $aux = '<i class="btn btn-secondary far fa-angry"> ' . number_format($serie['media'], 1) . '</i>';
                    }
                }
                ?>

                <a href="#" data-toggle="tooltip" title="Avaliação dos usuários" alt="Notas dos usuários"><?php echo $aux; ?></a>
                
                
                
                
            </div>

        </div>
    </div>   

    <div class="col-8">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Avaliação</th>
                <th>Nota</th	
            </tr>
            <?php foreach ($avaliacao_serie as $a) { ?>
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
