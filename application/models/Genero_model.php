<?php

 
class Genero_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get genero by id
     */
    function get_genero($id)
    {
        return $this->db->get_where('genero',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all genero count
     */
    function get_all_genero_count()
    {
        $this->db->from('genero');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all genero
     */
    function get_all_genero($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('genero')->result_array();
    }
        
    /*
     * function to add new genero
     */
    function add_genero($params)
    {
        $this->db->insert('genero',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update genero
     */
    function update_genero($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('genero',$params);
    }
    
    /*
     * function to delete genero
     */
    function delete_genero($id)
    {
        return $this->db->delete('genero',array('id'=>$id));
    }
}