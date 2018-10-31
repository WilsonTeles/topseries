<?php


class Avaliacao_filme_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get avaliacao_livro by id
     */
    function get_avaliacao_filme($id)
    {
        return $this->db->get_where('avaliacao_filme',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all avaliacao_filme count
     */
    function get_all_avaliacao_filme_count($id)
    {
        $this->db->where('id_filme', $id);
        $this->db->from('avaliacao_filme');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all avaliacao_livro
     */
    function get_all_avaliacao_filme($id ,$params = array())
    {        
        $this->db->where('id_filme', $id);
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('avaliacao_filme')->result_array();
    }
        
    /*
     * function to add new avaliacao_filme
     */
    function add_avaliacao_filme($params)
    {
        $this->db->insert('avaliacao_filme',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update avaliacao_filme
     */
    function update_avaliacao_filme($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('avaliacao_filme',$params);
    }
    
    /*
     * function to delete avaliacao_filme
     */
    function delete_avaliacao_filme($id)
    {
        return $this->db->delete('avaliacao_filme',array('id'=>$id));
    }
}
