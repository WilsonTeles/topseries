<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao_serie extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Avaliacao_serie_model');
    }

    function selecao_serie($id) {
        $this->session->set_userdata('id_serie', $id);
        $this->index();
    }

    function index() {
        $id = $this->session->userdata('id_serie');
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('avaliacao_serie/index?');
        $config['total_rows'] = $this->Avaliacao_serie_model->get_all_avaliacao_serie_count($id);
        $this->pagination->initialize($config);

        $data['avaliacao_serie'] = $this->Avaliacao_serie_model->get_all_avaliacao_serie($id, $params);
        $data['Título_da_pagina'] = 'Avaliações da Série';
        $data['paginacao'] = $this->pagination->create_links();

        $this->load->model('Serie_model');
        $data['serie'] = $this->Serie_model->get_serie($id);

        $data['_view'] = 'avaliacao_serie/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new avaliacao_serie
     */

    function add() {
        $this->load->library('form_validation');

 
        $this->form_validation->set_rules('avaliacao', 'Avaliacao', 'required|max_length[255]');
        $this->form_validation->set_rules('nota', 'Nota', 'required|numeric');

        if ($this->form_validation->run()) {
            $id = $this->session->userdata('id_serie');
            $params = array(
                'id_serie' => $id,
                'avaliacao' => $this->input->post('avaliacao'),
                'nota' => $this->input->post('nota'),
            );

            $avaliacao_serie_id = $this->Avaliacao_serie_model->add_avaliacao_serie($params);
            redirect('avaliacao_serie/index');
        } else {
            $data['Título_da_pagina'] = 'Avaliação da Série';
            $data['_view'] = 'avaliacao_serie/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a avaliacao_serie
     */

    function edit($id) {
        // check if the avaliacao_serie exists before trying to edit it
        $data['avaliacao_serie'] = $this->Avaliacao_serie_model->get_avaliacao_serie($id);

        if (isset($data['avaliacao_serie']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('id_serie', 'Id Serie', 'required|integer');
            $this->form_validation->set_rules('avaliacao', 'Avaliacao', 'required|max_length[255]');
            $this->form_validation->set_rules('nota', 'Nota', 'required|numeric');

            if ($this->form_validation->run()) {
                $params = array(
                    'id_serie' => $this->input->post('id_serie'),
                    'avaliacao' => $this->input->post('avaliacao'),
                    'nota' => $this->input->post('nota'),
                );

                $this->Avaliacao_serie_model->update_avaliacao_serie($id, $params);
                redirect('avaliacao_serie/index');
            } else {
                $data['_view'] = 'avaliacao_serie/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The avaliacao_serie you are trying to edit does not exist.');
    }

    /*
     * Deleting avaliacao_serie
     */

    function remove($id) {
        $avaliacao_serie = $this->Avaliacao_serie_model->get_avaliacao_serie($id);

        // check if the avaliacao_livro exists before trying to delete it
        if (isset($avaliacao_serie['id'])) {
            $this->Avaliacao_serie_model->delete_avaliacao_serie($id);
            redirect('avaliacao_serie/index');
        } else
            show_error('The avaliacao_serie you are trying to delete does not exist.');
    }

}
