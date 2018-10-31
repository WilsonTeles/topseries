<?php

defined('BASEPATH') OR exit('No direct script access allowed');

 
class Usuario extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    } 

    /*
     * Listing of usuario
     */
    function index()
    {
        $params['limit'] = 5; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('usuario/index?');
        $config['total_rows'] = $this->Usuario_model->get_all_usuario_count();
        $this->pagination->initialize($config);

        $data['paginacao'] = $this->pagination->create_links();
        $data['usuario'] = $this->Usuario_model->get_all_usuario($params);
        
        $data['Título_da_pagina'] = 'Lista de Usuários';
        $data['_view'] = 'usuario/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new usuario
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('senha','Senha','required|max_length[50]');
		$this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
		$this->form_validation->set_rules('nome','Nome','required|max_length[50]');
		$this->form_validation->set_rules('cpf','Cpf','required|max_length[14]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'senha' => $this->input->post('senha'),
				'email' => $this->input->post('email'),
				'nome' => $this->input->post('nome'),
				'cpf' => $this->input->post('cpf'),
            );
            
            $usuario_id = $this->Usuario_model->add_usuario($params);
            redirect('usuario/index');
        }
        else
        {            
            $data['Título_da_pagina'] = 'Incluir Usuário';
            $data['_view'] = 'usuario/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a usuario
     */
    function edit($id)
    {   
        // check if the usuario exists before trying to edit it
        $data['usuario'] = $this->Usuario_model->get_usuario($id);
        
        if(isset($data['usuario']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('senha','Senha','required|max_length[50]');
			$this->form_validation->set_rules('email','Email','required|max_length[50]|valid_email');
			$this->form_validation->set_rules('nome','Nome','required|max_length[50]');
			$this->form_validation->set_rules('cpf','Cpf','required|max_length[14]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'senha' => $this->input->post('senha'),
					'email' => $this->input->post('email'),
					'nome' => $this->input->post('nome'),
					'cpf' => $this->input->post('cpf'),
                );

                $this->Usuario_model->update_usuario($id,$params);            
                redirect('usuario/index');
            }
            else
            {
                $data['Título_da_pagina'] = 'Editar Usuário';
                $data['_view'] = 'usuario/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The usuario you are trying to edit does not exist.');
    } 

    /*
     * Deleting usuario
     */
    function remove($id)
    {
        $usuario = $this->Usuario_model->get_usuario($id);

        // check if the usuario exists before trying to delete it
        if(isset($usuario['id']))
        {
            $this->Usuario_model->delete_usuario($id);
            redirect('usuario/index');
        }
        else
            show_error('The usuario you are trying to delete does not exist.');
    }
    
}