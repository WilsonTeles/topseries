<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Coordenador extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Coordenador_model');
    } 

    /*
     * Listing of coordenador
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('coordenador/index?');
        $config['total_rows'] = $this->Coordenador_model->get_all_coordenador_count();
        $this->pagination->initialize($config);

        $data['coordenador'] = $this->Coordenador_model->get_all_coordenador($params);
        $data['Título_da_pagina'] = 'Lista de Coordenadores';
        $data['_view'] = 'coordenador/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new coordenador
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Nome','required|max_length[255]');
		$this->form_validation->set_rules('cpf','Cpf','required|max_length[255]');
		$this->form_validation->set_rules('senha','Senha','required|max_length[255]');
		$this->form_validation->set_rules('email','Email','required|max_length[255]|valid_email');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nome' => $this->input->post('nome'),
				'cpf' => $this->input->post('cpf'),
				'senha' => $this->input->post('senha'),
				'email' => $this->input->post('email'),
            );
            
            $coordenador_id = $this->Coordenador_model->add_coordenador($params);
            redirect('coordenador/index');
        }
        else
        {           
            $data['Título_da_pagina'] = 'Incluir coordenador';
            $data['_view'] = 'coordenador/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a coordenador
     */
    function edit($id)
    {   
        // check if the coordenador exists before trying to edit it
        $data['coordenador'] = $this->Coordenador_model->get_coordenador($id);
        
        if(isset($data['coordenador']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nome','Nome','required|max_length[255]');
			$this->form_validation->set_rules('cpf','Cpf','required|max_length[255]');
			$this->form_validation->set_rules('senha','Senha','required|max_length[255]');
			$this->form_validation->set_rules('email','Email','required|max_length[255]|valid_email');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nome' => $this->input->post('nome'),
					'cpf' => $this->input->post('cpf'),
					'senha' => $this->input->post('senha'),
					'email' => $this->input->post('email'),
                );

                $this->Coordenador_model->update_coordenador($id,$params);            
                redirect('coordenador/index');
            }
            else
            {
                $data['Título_da_pagina'] = 'Editar coordenador';
                $data['_view'] = 'coordenador/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The coordenador you are trying to edit does not exist.');
    } 

    /*
     * Deleting coordenador
     */
    function remove($id)
    {
        $coordenador = $this->Coordenador_model->get_coordenador($id);

        // check if the coordenador exists before trying to delete it
        if(isset($coordenador['id']))
        {
            $this->Coordenador_model->delete_coordenador($id);
            redirect('coordenador/index');
        }
        else
            show_error('The coordenador you are trying to delete does not exist.');
    }
    
    function home()
    {
        $data['Título_da_pagina'] = 'Coordenador logado!';
        $data['_view'] = 'coordenador/home';
        $this->load->view('layouts/main',$data);
    }
    
}
