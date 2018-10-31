<?php

 
class Pessoa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pessoa by id
     */
    function get_pessoa($id)
    {
        return $this->db->get_where('pessoa',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all pessoa count
     */
    function get_all_pessoa_count()
    {
        $this->db->from('pessoa');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all pessoa
     */
    function get_all_pessoa($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('pessoa')->result_array();
    }
        
    /*
     * function to add new pessoa
     */
    function add_pessoa($params)
    {
        $this->db->insert('pessoa',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pessoa
     */
    function update_pessoa($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('pessoa',$params);
    }
    
    /*
     * function to delete pessoa
     */
    function delete_pessoa($id)
    {
        return $this->db->delete('pessoa',array('id'=>$id));
    }
}
