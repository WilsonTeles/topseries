<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Livro extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Livro_model');
    }

    /*
     * Listing of livro
     */

    function index() {
        $params['limit'] = 5;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('livro/index?');
        $config['total_rows'] = $this->Livro_model->get_all_livro_count();
        $this->pagination->initialize($config);

        $data['paginacao'] = $this->pagination->create_links();
        $data['livro'] = $this->Livro_model->get_all_livro($params);

        $data['Título_da_pagina'] = 'Lista de Livros';
        $data['_view'] = 'livro/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new livro
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[50]');
        $this->form_validation->set_rules('publicacao', 'Publicacao', 'integer');
        $this->form_validation->set_rules('sinopse', 'Sinopse', 'max_length[200]');

        if ($this->form_validation->run()) {
            $params = array(
                'personagem1' => $this->input->post('personagem1'),
                'personagem2' => $this->input->post('personagem2'),
                'personagem3' => $this->input->post('personagem3'),
                'personagem4' => $this->input->post('personagem4'),
                'autor' => $this->input->post('autor'),
                'id_genero' => $this->input->post('id_genero'),
                'titulo' => $this->input->post('titulo'),
                'publicacao' => $this->input->post('publicacao'),
                'sinopse' => $this->input->post('sinopse'),
                'wiki' => $this->input->post('wiki')
            );

            $livro_id = $this->Livro_model->add_livro($params);
            redirect('livro/index');
        } else {
            $this->load->model('Pessoa_model');
            $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
            $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
            $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
            $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
            $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();

            $this->load->model('Genero_model');
            $data['all_genero'] = $this->Genero_model->get_all_genero();

            $data['Título_da_pagina'] = 'Adicionar Livro';
            $data['_view'] = 'livro/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a livro
     */

    function edit($id) {
        // check if the livro exists before trying to edit it
        $data['livro'] = $this->Livro_model->get_livro($id);

        if (isset($data['livro']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[50]');
            $this->form_validation->set_rules('publicacao', 'Publicacao', 'integer');
            $this->form_validation->set_rules('sinopse', 'Sinopse', 'max_length[200]');

            if ($this->form_validation->run()) {
                $params = array(
                    'personagem1' => $this->input->post('personagem1'),
                    'personagem2' => $this->input->post('personagem2'),
                    'personagem3' => $this->input->post('personagem3'),
                    'personagem4' => $this->input->post('personagem4'),
                    'autor' => $this->input->post('autor'),
                    'id_genero' => $this->input->post('id_genero'),
                    'titulo' => $this->input->post('titulo'),
                    'publicacao' => $this->input->post('publicacao'),
                    'sinopse' => $this->input->post('sinopse'),
                    'wiki' => $this->input->post('wiki')
                );

                $this->Livro_model->update_livro($id, $params);
                redirect('livro/index');
            } else {
                $this->load->model('Pessoa_model');
                $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
                $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
                $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
                $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
                $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();

                $this->load->model('Genero_model');
                $data['all_genero'] = $this->Genero_model->get_all_genero();

                $data['Título_da_pagina'] = 'Editar Livro';
                $data['_view'] = 'livro/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The livro you are trying to edit does not exist.');
    }

    /*
     * Deleting livro
     */

    function remove($id) {
        $livro = $this->Livro_model->get_livro($id);

        // check if the livro exists before trying to delete it
        if (isset($livro['id'])) {
            $this->Livro_model->delete_livro($id);
            redirect('livro/index');
        } else
            show_error('The livro you are trying to delete does not exist.');
    }

    public function capa($id) {

        $data['id'] = $id;
        $data['Título_da_pagina'] = 'Upload da Capa do Livro';
        $data['_view'] = 'livro/capa';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Faz upload da imagem do logotipo
     */

    public function do_upload() {

        $id = $this->input->post('id');
        $config['upload_path'] = './uploads/livro';
        $config['allowed_types'] = 'png';
        $config['max_size'] = 300;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;
        $config['file_name'] = $id;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('capa')) {
            $data['Título_da_pagina'] = 'Upload da Capa do Filme';
            $data['_view'] = 'livro/capa';
            $this->load->view('layouts/main', $data);
        } else {


            $data['Título_da_pagina'] = '';
            $data['messagem'] = 'Capa do livro foi atualizada com sucesso!';
            $data['link'] = 'Livro';
            $data['_view'] = 'menssagem';
            $this->load->view('layouts/main', $data);
        }
    }

}
