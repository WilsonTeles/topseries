<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Pessoa_model');
    }

    /*
     * Listing of pessoa
     */

    function index() {
        $params['limit'] = 5;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('pessoa/index?');
        $config['total_rows'] = $this->Pessoa_model->get_all_pessoa_count();
        $this->pagination->initialize($config);

        $data['paginacao'] = $this->pagination->create_links();
        $data['pessoa'] = $this->Pessoa_model->get_all_pessoa($params);
        $data['Título_da_pagina'] = 'Lista de Pessoas - Autores, Atores e Diretores';
        $data['_view'] = 'pessoa/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new pessoa
     */

    function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[50]');

        if ($this->form_validation->run()) {
            $params = array(
                'nome' => $this->input->post('nome'),
            );

            $pessoa_id = $this->Pessoa_model->add_pessoa($params);
            redirect('pessoa/index');
        } else {
            $data['Título_da_pagina'] = 'Incluir Pessoa';
            $data['_view'] = 'pessoa/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a pessoa
     */

    function edit($id) {
        // check if the pessoa exists before trying to edit it
        $data['pessoa'] = $this->Pessoa_model->get_pessoa($id);

        if (isset($data['pessoa']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[50]');

            if ($this->form_validation->run()) {
                $params = array(
                    'nome' => $this->input->post('nome'),
                );

                $this->Pessoa_model->update_pessoa($id, $params);
                redirect('pessoa/index');
            } else {
                $data['Título_da_pagina'] = 'Editar Dados de Pessoa';
                $data['_view'] = 'pessoa/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The pessoa you are trying to edit does not exist.');
    }

    /*
     * Deleting pessoa
     */

    function remove($id) {
        $pessoa = $this->Pessoa_model->get_pessoa($id);

        // check if the pessoa exists before trying to delete it
        if (isset($pessoa['id'])) {
            $this->Pessoa_model->delete_pessoa($id);
            redirect('pessoa/index');
        } else
            show_error('The pessoa you are trying to delete does not exist.');
    }

}
