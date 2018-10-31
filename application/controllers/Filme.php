<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Filme extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Filme_model');
    }

    /*
     * Listing of filme
     */

    function index() {
        $params['limit'] = 5;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('filme/index?');
        $config['total_rows'] = $this->Filme_model->get_all_filme_count();
        $this->pagination->initialize($config);

        $data['paginacao'] = $this->pagination->create_links();
        $data['filme'] = $this->Filme_model->get_all_filme($params);

        $data['Título_da_pagina'] = 'Lista de Filmes';
        $data['_view'] = 'filme/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new filme
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[50]');
        $this->form_validation->set_rules('diretor', 'Diretor', 'required|integer');
        $this->form_validation->set_rules('sinopse', 'Sinopse', 'max_length[200]');
        $this->form_validation->set_rules('duracao', 'Duracao', 'integer');
        $this->form_validation->set_rules('ano', 'Ano', 'integer');
        $this->form_validation->set_rules('id_genero', 'Id Genero', 'integer');

        if ($this->form_validation->run()) {
            $params = array(
                'ator1' => $this->input->post('ator1'),
                'ator2' => $this->input->post('ator2'),
                'ator3' => $this->input->post('ator3'),
                'ator4' => $this->input->post('ator4'),
                'diretor' => $this->input->post('diretor'),
                'id_genero' => $this->input->post('id_genero'),
                'titulo' => $this->input->post('titulo'),
                'sinopse' => $this->input->post('sinopse'),
                'duracao' => $this->input->post('duracao'),
                'ano' => $this->input->post('ano'),
                'wiki' => $this->input->post('wiki'),
            );

            $filme_id = $this->Filme_model->add_filme($params);
            redirect('filme/index');
        } else {
            $this->load->model('Pessoa_model');
            $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();

            $this->load->model('Genero_model');
            $data['all_genero'] = $this->Genero_model->get_all_genero();

            $data['Título_da_pagina'] = 'Adicionar Filme';
            $data['_view'] = 'filme/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a filme
     */

    function edit($id) {
        // check if the filme exists before trying to edit it
        $data['filme'] = $this->Filme_model->get_filme($id);

        if (isset($data['filme']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[50]');
            $this->form_validation->set_rules('diretor', 'Diretor', 'required|integer');
            $this->form_validation->set_rules('sinopse', 'Sinopse', 'max_length[200]');
            $this->form_validation->set_rules('duracao', 'Duracao', 'integer');
            $this->form_validation->set_rules('ano', 'Ano', 'integer');
            $this->form_validation->set_rules('id_genero', 'Id Genero', 'integer');

            if ($this->form_validation->run()) {
                $params = array(
                    'ator1' => $this->input->post('ator1'),
                    'ator2' => $this->input->post('ator2'),
                    'ator3' => $this->input->post('ator3'),
                    'ator4' => $this->input->post('ator4'),
                    'diretor' => $this->input->post('diretor'),
                    'id_genero' => $this->input->post('id_genero'),
                    'titulo' => $this->input->post('titulo'),
                    'sinopse' => $this->input->post('sinopse'),
                    'duracao' => $this->input->post('duracao'),
                    'ano' => $this->input->post('ano'),
                    'wiki' => $this->input->post('wiki'),
                );

                $this->Filme_model->update_filme($id, $params);
                redirect('filme/index');
            } else {
                $this->load->model('Pessoa_model');
                $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();

                $this->load->model('Genero_model');
                $data['all_genero'] = $this->Genero_model->get_all_genero();

                $data['Título_da_pagina'] = 'Editar Filme';
                $data['_view'] = 'filme/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The filme you are trying to edit does not exist.');
    }

    /*
     * Deleting filme
     */

    function remove($id) {
        $filme = $this->Filme_model->get_filme($id);

        // check if the filme exists before trying to delete it
        if (isset($filme['id'])) {
            $this->Filme_model->delete_filme($id);
            redirect('filme/index');
        } else
            show_error('The filme you are trying to delete does not exist.');
    }

    public function capa($id) {

        $data['id'] = $id;
        $data['Título_da_pagina'] = 'Upload da Capa do Filme';
        $data['_view'] = 'filme/capa';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Faz upload da imagem do logotipo
     */

    public function do_upload() {

        $id = $this->input->post('id');
        $config['upload_path'] = './uploads/filme/';
        $config['allowed_types'] = 'png';
        $config['max_size'] = 300;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;
        $config['file_name'] = $id;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('capa')) {
            $data['Título_da_pagina'] = 'Upload da Capa do Filme';
            $data['_view'] = 'filme/capa';
            $this->load->view('layouts/main', $data);
        } else {


            $data['Título_da_pagina'] = '';
            $data['messagem'] = 'Capa do filme foi atualizada com sucesso!';
            $data['link'] = 'Filme';
            $data['_view'] = 'menssagem';
            $this->load->view('layouts/main', $data);
        }
    }

}
