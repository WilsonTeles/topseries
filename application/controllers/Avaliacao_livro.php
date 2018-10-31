<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao_livro extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Avaliacao_livro_model');
    }

    function selecao_livro($id) {
        $this->session->set_userdata('id_livro', $id);
        $this->index();
    }

    function index() {
        $id = $this->session->userdata('id_livro');
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('avaliacao_livro/index?');
        $config['total_rows'] = $this->Avaliacao_livro_model->get_all_avaliacao_livro_count($id);
        $this->pagination->initialize($config);

        $data['avaliacao_livro'] = $this->Avaliacao_livro_model->get_all_avaliacao_livro($id, $params);
        $data['Título_da_pagina'] = 'Avaliações do Livro';
        $data['paginacao'] = $this->pagination->create_links();

        $this->load->model('Livro_model');
        $data['livro'] = $this->Livro_model->get_livro($id);

        $data['_view'] = 'avaliacao_livro/index';
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
            $id = $this->session->userdata('id_livro');
            $params = array(
                'id_livro' => $id,
                'avaliacao' => $this->input->post('avaliacao'),
                'nota' => $this->input->post('nota'),
            );

            $avaliacao_livro_id = $this->Avaliacao_livro_model->add_avaliacao_livro($params);
            redirect('avaliacao_livro/index');
        } else {
            $data['Título_da_pagina'] = 'Avaliação do Livro';
            $data['_view'] = 'avaliacao_livro/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a avaliacao_livro
     */

    function edit($id) {
        // check if the avaliacao_livro exists before trying to edit it
        $data['avaliacao_livro'] = $this->Avaliacao_livro_model->get_avaliacao_livro($id);

        if (isset($data['avaliacao_livro']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('id_livro', 'Id Livro', 'required|integer');
            $this->form_validation->set_rules('avaliacao', 'Avaliacao', 'required|max_length[255]');
            $this->form_validation->set_rules('nota', 'Nota', 'required|numeric');

            if ($this->form_validation->run()) {
                $params = array(
                    'id_livro' => $this->input->post('id_livro'),
                    'avaliacao' => $this->input->post('avaliacao'),
                    'nota' => $this->input->post('nota'),
                );

                $this->Avaliacao_livro_model->update_avaliacao_livro($id, $params);
                redirect('avaliacao_livro/index');
            } else {
                $data['_view'] = 'avaliacao_livro/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The avaliacao_livro you are trying to edit does not exist.');
    }

    /*
     * Deleting avaliacao_livro
     */

    function remove($id) {
        $avaliacao_livro = $this->Avaliacao_livro_model->get_avaliacao_livro($id);

        // check if the avaliacao_livro exists before trying to delete it
        if (isset($avaliacao_livro['id'])) {
            $this->Avaliacao_livro_model->delete_avaliacao_livro($id);
            redirect('avaliacao_livro/index');
        } else
            show_error('The avaliacao_livro you are trying to delete does not exist.');
    }

}
