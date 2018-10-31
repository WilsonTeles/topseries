<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_logado extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('logado') != 'S'){
            redirect("Welcome");
        }
    }

    /*
     * Listing of pessoa
     */

    function index() {
        $data['Título_da_pagina'] = 'Usuário Logado';
        $data['_view'] = 'usuario_logado/index';
        $this->load->view('layouts/main', $data);
    }

   

}
