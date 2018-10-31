<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Genero extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Genero_model');
    }

    /*
     * Listing of genero
     */

    function index() {
        $params['limit'] = 5;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('genero/index?');
        $config['total_rows'] = $this->Genero_model->get_all_genero_count();
        $this->pagination->initialize($config);

        $data['paginacao'] = $this->pagination->create_links();
        $data['genero'] = $this->Genero_model->get_all_genero($params);

        $data['Título_da_pagina'] = 'Lista de Gêneros';
        $data['_view'] = 'genero/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new genero
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('descricao', 'Descricao', 'required|max_length[50]');

        if ($this->form_validation->run()) {
            $params = array(
                'descricao' => $this->input->post('descricao'),
            );

            $genero_id = $this->Genero_model->add_genero($params);
            redirect('genero/index');
        } else {
            $data['Título_da_pagina'] = 'Incluir Gênero';
            $data['_view'] = 'genero/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a genero
     */

    function edit($id) {
        // check if the genero exists before trying to edit it
        $data['genero'] = $this->Genero_model->get_genero($id);

        if (isset($data['genero']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('descricao', 'Descricao', 'required|max_length[50]');

            if ($this->form_validation->run()) {
                $params = array(
                    'descricao' => $this->input->post('descricao'),
                );

                $this->Genero_model->update_genero($id, $params);
                redirect('genero/index');
            } else {
                $data['Título_da_pagina'] = 'Editar Gênero';
                $data['_view'] = 'genero/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The genero you are trying to edit does not exist.');
    }

    /*
     * Deleting genero
     */

    function remove($id) {
        $genero = $this->Genero_model->get_genero($id);

        // check if the genero exists before trying to delete it
        if (isset($genero['id'])) {
            $this->Genero_model->delete_genero($id);
            redirect('genero/index');
        } else
            show_error('The genero you are trying to delete does not exist.');
    }

}
