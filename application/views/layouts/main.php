<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Top Séries</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
        <link  href="<?php echo base_url('assets/vendor/fontawesome/css/all.css') ?>" rel="stylesheet" >
        <link  href="<?php echo base_url('assets/vendor/jquery-ui/jquery-ui.css') ?>" rel="stylesheet" >
        <link  href="<?php echo base_url('assets/estilo.css') ?>" rel="stylesheet" >

    </head>

    <body>


        <!-- Navigation -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url() ?>">Top Séries</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">


                        <!-- MENU PÚBLICO --> 

                        <li class="nav-item text-white">
                            <div class="justify-content-md-center">
                                <form class="form-inline my-2 my-lg-0 my-lg-0" method="Post" action="<?php echo base_url('Pesquisa') ?>">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio" value="Filme" checked="checked">Filme
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Serie" name="optradio">Série
                                        </label>
                                    </div>
                                    <div class="form-check-inline disabled">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Livro" name="optradio">Livro
                                        </label>
                                    </div>
                                    <input id="termo" name="termo" class="form-control mr-sm-2" type="text" placeholder="Pesquise..." aria-label="Search" style="width: 300px;">

                                    <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Serie') ?>">Séries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Filme') ?>">Filmes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Livro') ?>">Livros</a>
                        </li>

                        <!-- MENU do COORDENADOR --> 

                        <?php if ($this->session->userdata('logado') == "coordenador") { ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('Coordenador/home') ?>">Home</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cadastro
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                                    <a class="dropdown-item" href="<?php echo base_url('Usuários') ?>">Usuários</a>
                                    <a class="dropdown-item" href="<?php echo base_url('Livros') ?>">Livros</a>
                                    <a class="dropdown-item" href="<?php echo base_url('Séries') ?>">Séries</a>
                                    <a class="dropdown-item" href="<?php echo base_url('Filmes') ?>">Filmes</a>
                                </div>
                            </li>


                        <?php } ?>


                        <!--  MENU GERAL -->        
                        <!--  Verifica se está logado para apresentar no menu o login e registro  ou logout -->

                        <?php
                        if (($this->session->userdata('logado') == "coordenador") ||
                                ($this->session->userdata('logado') == "aluno")) {
                            ?> 

                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Logout') ?>">Logout</a></li><li class="nav-item"></li>     


                        <?php } else { ?>  

                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Registro') ?>">Sign Up</a></li><li class="nav-item"></li>  
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Login') ?>">Login</a></li><li class="nav-item"></li>   
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container">
            <p></p>
            <?php
            echo "<h1> $Título_da_pagina </h1><br>";

            if (isset($_view) && $_view)
                $this->load->view($_view);
            ?>
            <br>
        </div>
        <!-- /.container -->

        <!-- Modal Para exibicao de info. de Filme-->
        <div class="modal fade" id="modal_show_imagem">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 id="titulo_imagem" class="modal-title">titulo</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <img class="d-block mx-auto img-fluid" id="auximg">
                        <p></p>
                        Sinopse:
                        <h6 id="modal_sinopse"></h6>
                        <p></p>
                        Diretor:
                        <h6 id="modal_diretor"></h6>
                        <br>
                        Atores:
                        <h6 id="modal_ator1"></h6>
                        <h6 id="modal_ator2"></h6>
                        <h6 id="modal_ator3"></h6>
                        <h6 id="modal_ator4"></h6>
                        <br>
                        <br>
                    </div>


                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!-- Modal Para exibicao de info. de Livro-->
        <div class="modal fade" id="modal_show_livro">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 id="titulo_imagem_livro" class="modal-title">titulo</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <img class="d-block mx-auto img-fluid" id="auximg_livro">
                        <p></p>
                        Sinopse:
                        <h6 id="modal_sinopse_livro"></h6>
                        <p></p>
                        Autor:
                        <h6 id="modal_diretor_livro"></h6>
                        <br>
                        Personagens:
                        <h6 id="modal_ator1_livro"></h6>
                        <h6 id="modal_ator2_livro"></h6>
                        <h6 id="modal_ator3_livro"></h6>
                        <h6 id="modal_ator4_livro"></h6>
                        <br>
                        <br>
                    </div>


                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; UFF - IC - BSI - GPMS - 2018</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>

        <script>
            $(document).ready(function () {

                $('[data-toggle="tooltip"]').tooltip();

            });

            $('.show_img').on('click', function (e) {
                e.preventDefault();
                var newSrc = this.src;
                var sinopse = $(this).data('sinopse');
                var diretor = $(this).data('diretor');

                var ator1 = $(this).data('ator1');
                var ator2 = $(this).data('ator2');
                var ator3 = $(this).data('ator3');
                var ator4 = $(this).data('ator4');

                var modalImg = $("#auximg");
                var captionText = document.getElementById("titulo_imagem");

                modalImg.attr('src', newSrc)
                captionText.innerHTML = this.alt;


                var aux_sinopse = document.getElementById("modal_sinopse");
                aux_sinopse.innerHTML = sinopse;

                var aux_diretor = document.getElementById("modal_diretor");
                aux_diretor.innerHTML = diretor;

                var aux_ator1 = document.getElementById("modal_ator1");
                if (ator1 != "") {
                    aux_ator1.innerHTML = ator1;
                } else {
                    aux_ator1.innerHTML = "";
                }
                ;

                var aux_ator2 = document.getElementById("modal_ator2");
                if (ator2 != "") {
                    aux_ator2.innerHTML = ator2;
                } else {
                    aux_ator2.innerHTML = "";
                }
                ;

                var aux_ator3 = document.getElementById("modal_ator3");
                if (ator3 != "") {

                    aux_ator3.innerHTML = ator3;
                } else {
                    aux_ator3.innerHTML = ""
                }
                ;

                var aux_ator4 = document.getElementById("modal_ator4");
                if (ator4 != "") {
                    aux_ator4.innerHTML = ator4;
                } else {
                    aux_ator4.innerHTML = "";
                }
                ;

                $('#modal_show_imagem').modal('show');


            });














            $('.show_livro').on('click', function (e) {
                e.preventDefault();
                var newSrc = this.src;
                var sinopse_livro = $(this).data('sinopse_livro');
                var autor = $(this).data('autor');
                var persona1 = $(this).data('personagem1');
                var persona2 = $(this).data('personagem2');
                var persona3 = $(this).data('personagem3');
                var persona4 = $(this).data('personagem4');


                var modalImg = $("#auximg_livro");
                var captionText = document.getElementById("titulo_imagem_livro");

                modalImg.attr('src', newSrc)
                captionText.innerHTML = this.alt;


                var aux_sinopse = document.getElementById("modal_sinopse_livro");
                aux_sinopse.innerHTML = sinopse_livro;

                var aux_diretor = document.getElementById("modal_diretor_livro");
                aux_diretor.innerHTML = autor;

                var aux_ator1 = document.getElementById("modal_ator1_livro");
                if (persona1 != "") {

                    aux_ator1.innerHTML = persona1;
                } else {
                    aux_ator1.innerHTML = "";
                }
                ;

                var aux_ator2 = document.getElementById("modal_ator2_livro");
                if (persona2 != "") {

                    aux_ator2.innerHTML = persona2;
                } else {
                    aux_ator2.innerHTML = ""
                }
                ;


                var aux_ator3 = document.getElementById("modal_ator3_livro");
                if (persona3 != "") {

                    aux_ator3.innerHTML = persona3;
                } else {
                    aux_ator3.innerHTML = ""
                }
                ;

                var aux_ator4 = document.getElementById("modal_ator4_livro");
                if (persona4 != "") {

                    aux_ator4.innerHTML = persona4;
                } else {
                    aux_ator4.innerHTML = ""
                }
                ;

                $('#modal_show_livro').modal('show');


            });

        </script>

    </body>

</html>
