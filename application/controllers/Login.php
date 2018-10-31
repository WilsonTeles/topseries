<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {

        $data['Título_da_pagina'] = 'Login';
        $data['_view'] = 'login';
        $this->load->view('layouts/main', $data);
    }

    public function validar() {

        $this->form_validation->set_rules('cpf', 'cpf', 'required|valid_cpf');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $cpf = $this->input->post('cpf');
            $senha = $this->input->post('senha');

            $data = array("cpf" => "$cpf", "senha" => "$senha");

            $this->load->model("Usuario_model");
            $dados = $this->Usuario_model->login($data);
            if (empty($dados)) {
                $this->index();
            } else {

                $this->session->set_userdata($dados);
                $this->session->set_userdata('logado', 'S');
                redirect("Usuario_logado");
            }
        }
    }

}
