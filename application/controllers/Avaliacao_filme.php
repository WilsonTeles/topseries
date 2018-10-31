<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao_filme extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Avaliacao_filme_model');
    }

    function selecao_filme($id) {
        $this->session->set_userdata('id_filme', $id);
        $this->index();
    }

    function index() {
        $id = $this->session->userdata('id_filme');
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('avaliacao_filme/index?');
        $config['total_rows'] = $this->Avaliacao_filme_model->get_all_avaliacao_filme_count($id);
        $this->pagination->initialize($config);

        $data['avaliacao_filme'] = $this->Avaliacao_filme_model->get_all_avaliacao_filme($id, $params);
        $data['Título_da_pagina'] = 'Avaliações do Filme';
        $data['paginacao'] = $this->pagination->create_links();

        $this->load->model('Filme_model');
        $data['filme'] = $this->Filme_model->get_filme($id);

        $data['_view'] = 'avaliacao_filme/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new avaliacao_livro
     */

    function add() {
        $this->load->library('form_validation');

 
        $this->form_validation->set_rules('avaliacao', 'Avaliacao', 'required|max_length[255]');
        $this->form_validation->set_rules('nota', 'Nota', 'required|numeric');

        if ($this->form_validation->run()) {
            $id = $this->session->userdata('id_filme');
            $params = array(
                'id_filme' => $id,
                'avaliacao' => $this->input->post('avaliacao'),
                'nota' => $this->input->post('nota'),
            );

            $avaliacao_filme_id = $this->Avaliacao_filme_model->add_avaliacao_filme($params);
            redirect('avaliacao_filme/index');
        } else {
            $data['Título_da_pagina'] = 'Avaliação do Filme';
            $data['_view'] = 'avaliacao_filme/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a avaliacao_livro
     */

    function edit($id) {
        // check if the avaliacao_livro exists before trying to edit it
        $data['avaliacao_filme'] = $this->Avaliacao_filme_model->get_avaliacao_filme($id);

        if (isset($data['avaliacao_filme']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('id_filme', 'Id Filme', 'required|integer');
            $this->form_validation->set_rules('avaliacao', 'Avaliacao', 'required|max_length[255]');
            $this->form_validation->set_rules('nota', 'Nota', 'required|numeric');

            if ($this->form_validation->run()) {
                $params = array(
                    'id_filme' => $this->input->post('id_filme'),
                    'avaliacao' => $this->input->post('avaliacao'),
                    'nota' => $this->input->post('nota'),
                );

                $this->Avaliacao_filme_model->update_avaliacao_filme($id, $params);
                redirect('avaliacao_filme/index');
            } else {
                $data['_view'] = 'avaliacao_filme/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The avaliacao_filme you are trying to edit does not exist.');
    }

    /*
     * Deleting avaliacao_livro
     */

    function remove($id) {
        $avaliacao_filme = $this->Avaliacao_filme_model->get_avaliacao_filme($id);

        // check if the avaliacao_filme exists before trying to delete it
        if (isset($avaliacao_filme['id'])) {
            $this->Avaliacao_filme_model->delete_avaliacao_filme($id);
            redirect('avaliacao_filme/index');
        } else
            show_error('The avaliacao_filme you are trying to delete does not exist.');
    }

}
