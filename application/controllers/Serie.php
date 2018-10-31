<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Serie extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Serie_model');
    }

    /*
     * Listing of serie
     */

    function index() {
        $params['limit'] = 5;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('serie/index?');
        $config['total_rows'] = $this->Serie_model->get_all_serie_count();
        $this->pagination->initialize($config);

        $data['paginacao'] = $this->pagination->create_links();
        $data['serie'] = $this->Serie_model->get_all_serie($params);

        $data['Título_da_pagina'] = 'Lista de Séries';
        $data['_view'] = 'serie/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new serie
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[50]');
        $this->form_validation->set_rules('diretor', 'Diretor', 'required|integer');
        $this->form_validation->set_rules('episodios', 'Episodios', 'required|integer');
        $this->form_validation->set_rules('temporadas', 'Temporadas', 'required|integer');
        $this->form_validation->set_rules('sinopse', 'Sinopse', 'max_length[200]');
        $this->form_validation->set_rules('id_genero', 'Id Genero', 'required|integer');

        if ($this->form_validation->run()) {
            $params = array(
                'ator1' => $this->input->post('ator1'),
                'ator2' => $this->input->post('ator2'),
                'ator3' => $this->input->post('ator3'),
                'ator4' => $this->input->post('ator4'),
                'diretor' => $this->input->post('diretor'),
                'id_genero' => $this->input->post('id_genero'),
                'titulo' => $this->input->post('titulo'),
                'episodios' => $this->input->post('episodios'),
                'temporadas' => $this->input->post('temporadas'),
                'sinopse' => $this->input->post('sinopse'),
                'wiki' => $this->input->post('wiki')
            );

            $serie_id = $this->Serie_model->add_serie($params);
            redirect('serie/index');
        } else {
            $this->load->model('Pessoa_model');
            $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
            $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
            $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
            $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
            $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();

            $this->load->model('Genero_model');
            $data['all_genero'] = $this->Genero_model->get_all_genero();

            $data['Título_da_pagina'] = 'Adicionar Série';
            $data['_view'] = 'serie/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a serie
     */

    function edit($id) {
        // check if the serie exists before trying to edit it
        $data['serie'] = $this->Serie_model->get_serie($id);

        if (isset($data['serie']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[50]');
            $this->form_validation->set_rules('diretor', 'Diretor', 'required|integer');
            $this->form_validation->set_rules('episodios', 'Episodios', 'required|integer');
            $this->form_validation->set_rules('temporadas', 'Temporadas', 'required|integer');
            $this->form_validation->set_rules('sinopse', 'Sinopse', 'max_length[200]');
            $this->form_validation->set_rules('id_genero', 'Id Genero', 'required|integer');

            if ($this->form_validation->run()) {
                $params = array(
                    'ator1' => $this->input->post('ator1'),
                    'ator2' => $this->input->post('ator2'),
                    'ator3' => $this->input->post('ator3'),
                    'ator4' => $this->input->post('ator4'),
                    'diretor' => $this->input->post('diretor'),
                    'id_genero' => $this->input->post('id_genero'),
                    'titulo' => $this->input->post('titulo'),
                    'episodios' => $this->input->post('episodios'),
                    'temporadas' => $this->input->post('temporadas'),
                    'sinopse' => $this->input->post('sinopse'),
                    'wiki' => $this->input->post('wiki')
                );

                $this->Serie_model->update_serie($id, $params);
                redirect('serie/index');
            } else {
                $this->load->model('Pessoa_model');
                $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
                $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
                $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
                $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();
                $data['all_pessoa'] = $this->Pessoa_model->get_all_pessoa();

                $this->load->model('Genero_model');
                $data['all_genero'] = $this->Genero_model->get_all_genero();

                $data['Título_da_pagina'] = 'Editar Série';
                $data['_view'] = 'serie/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The serie you are trying to edit does not exist.');
    }

    /*
     * Deleting serie
     */

    function remove($id) {
        $serie = $this->Serie_model->get_serie($id);

        // check if the serie exists before trying to delete it
        if (isset($serie['id'])) {
            $this->Serie_model->delete_serie($id);
            redirect('serie/index');
        } else
            show_error('The serie you are trying to delete does not exist.');
    }

    public function capa($id) {

        $data['id'] = $id;
        $data['Título_da_pagina'] = 'Upload da Capa da Série';
        $data['_view'] = 'serie/capa';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Faz upload da imagem do logotipo
     */

    public function do_upload() {

        $id = $this->input->post('id');
        $config['upload_path'] = './uploads/serie/';
        $config['allowed_types'] = 'png';
        $config['max_size'] = 300;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;
        $config['file_name'] = $id;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('capa')) {
            $data['Título_da_pagina'] = 'Upload da Capa da Série';
            $data['_view'] = 'serie/capa';
            $this->load->view('layouts/main', $data);
        } else {


            $data['Título_da_pagina'] = '';
            $data['messagem'] = 'Capa da série foi atualizada com sucesso!';
            $data['link'] = 'Serie';
            $data['_view'] = 'menssagem';
            $this->load->view('layouts/main', $data);
        }
    }

}
