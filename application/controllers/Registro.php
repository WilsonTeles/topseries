<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Registro extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    /*
     * Listing of alunos
     */

    function index() {


        $data['Título_da_pagina'] = 'Registro no Sistema';
        $data['_view'] = 'registro/index';
        $this->load->view('layouts/main', $data);
    }

    function registrar() {

        $this->form_validation->set_rules('tipo_usuario', 'Tipo do Usuário', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $tipo_usuario = $this->input->post('tipo_usuario');

            switch ($tipo_usuario) {
                case "aluno":
                    $this->load->model('Area_atuacao_model');
                    $data['all_area_atuacao'] = $this->Area_atuacao_model->get_all_area_atuacao();
                    $data['Título_da_pagina'] = 'Registro do Aluno no Sistema';
                    $data['_view'] = 'registro/add_aluno';
                    $this->load->view('layouts/main', $data);
                    break;
                case "empresa":
                    $data['Título_da_pagina'] = 'Registro da Empresa no Sistema';
                    $data['_view'] = 'registro/add_empresa';
                    $this->load->view('layouts/main', $data);
                    break;
            }
        }
    }

    /*
     * Adding a new aluno
     */

    function add_aluno() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[50]');
        $this->form_validation->set_rules('cpf', 'Cpf', 'required|max_length[14]');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required|max_length[8]');

        if ($this->form_validation->run()) {
            $params = array(
                'nome' => $this->input->post('nome'),
                'cpf' => $this->input->post('cpf'),
                'email' => $this->input->post('email'),
                'senha' => $this->input->post('senha'),
            );
            $this->load->model('Usuario_model');
            $usuario_id = $this->Usuario_model->add_usuario($params);
            $data['Título_da_pagina'] = 'Registro do Usuário';
            $data['_view'] = 'registro/sucesso_cadastro';
            $this->load->view('layouts/main', $data);
        } else {
            $this->load->model('Area_atuacao_model');
            $data['all_area_atuacao'] = $this->Area_atuacao_model->get_all_area_atuacao();
            $data['Título_da_pagina'] = 'Registro do Aluno no Sistema';
            $data['_view'] = 'registro/add_aluno';
            $this->load->view('layouts/main', $data);
        }
    }

}
