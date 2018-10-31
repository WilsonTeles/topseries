<?php

 
class Coordenador_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get coordenador by id
     */
    function get_coordenador($id)
    {
        return $this->db->get_where('coordenador',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all coordenador count
     */
    function get_all_coordenador_count()
    {
        $this->db->from('coordenador');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all coordenador
     */
    function get_all_coordenador($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('coordenador')->result_array();
    }
        
    /*
     * function to add new coordenador
     */
    function add_coordenador($params)
    {
        $this->db->insert('coordenador',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update coordenador
     */
    function update_coordenador($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('coordenador',$params);
    }
    
    /*
     * function to delete coordenador
     */
    function delete_coordenador($id)
    {
        return $this->db->delete('coordenador',array('id'=>$id));
    }
    
    
    function login($match) {

        $this->db->from('coordenador');
        $this->db->where($match);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }
}
