<?php


class Avaliacao_livro_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get avaliacao_livro by id
     */
    function get_avaliacao_livro($id)
    {
        return $this->db->get_where('avaliacao_livro',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all avaliacao_livro count
     */
    function get_all_avaliacao_livro_count($id)
    {
        $this->db->where('id_livro', $id);
        $this->db->from('avaliacao_livro');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all avaliacao_livro
     */
    function get_all_avaliacao_livro($id ,$params = array())
    {
        $this->db->where('id_livro', $id);
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('avaliacao_livro')->result_array();
    }
        
    /*
     * function to add new avaliacao_livro
     */
    function add_avaliacao_livro($params)
    {
        $this->db->insert('avaliacao_livro',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update avaliacao_livro
     */
    function update_avaliacao_livro($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('avaliacao_livro',$params);
    }
    
    /*
     * function to delete avaliacao_livro
     */
    function delete_avaliacao_livro($id)
    {
        return $this->db->delete('avaliacao_livro',array('id'=>$id));
    }
}
