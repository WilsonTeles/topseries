<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {


        $this->load->model('Filme_model');
        $data['filmes'] = $this->Filme_model->get_recentes();

        $this->load->model('Serie_model');
        $data['series'] = $this->Serie_model->get_recentes();

        $this->load->model('Livro_model');
        $data['livros'] = $this->Livro_model->get_recentes();


        $data['Título_da_pagina'] = 'Topséries';
        $data['_view'] = 'welcome/index';
        $this->load->view('layouts/main', $data);
    }

}
