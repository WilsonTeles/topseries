<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesquisa extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('Termo', 'Titulo', 'required');
        $this->form_validation->set_rules('optradio', 'optradio', 'required');
        if ($this->form_validation->run()) {
            redirect("Welcome");
        } else {
            $optradio = $this->input->post('optradio');
            $match = $this->input->post('termo');
            
            
            if ($optradio == 'Filme') {
                $this->load->model('Filme_model');
                $data['filmes'] = $this->Filme_model->get_pesquisa($match);
                $data['Título_da_pagina'] = 'Resultado da Pesquisa de Filmes';
                $data['_view'] = 'pesquisa/filme';
                $this->load->view('layouts/main', $data);
            } else {
                if ($optradio == 'Livro') {
                    $this->load->model('Livro_model');
                    $data['livros'] = $resultado = $this->Livro_model->get_pesquisa($match);
                    $data['Título_da_pagina'] = 'Resultado da Pesquisa de Livros';
                    $data['_view'] = 'pesquisa/livro';
                    $this->load->view('layouts/main', $data);
                } else {
                    $this->load->model('Serie_model');
                    $data['series'] = $resultado = $this->Serie_model->get_pesquisa($match);
                    $data['Título_da_pagina'] = 'Resultado da Pesquisa de Séries';
                    $data['_view'] = 'pesquisa/serie';
                    $this->load->view('layouts/main', $data);
                }
            }
        }
    }

}
