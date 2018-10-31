<?php


class Avaliacao_serie_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get avaliacao_livro by id
     */
    function get_avaliacao_serie($id)
    {
        return $this->db->get_where('avaliacao_serie',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all avaliacao_livro count
     */
    function get_all_avaliacao_serie_count($id)
    {
        $this->db->where('id_serie', $id);
        $this->db->from('avaliacao_serie');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all avaliacao_livro
     */
    function get_all_avaliacao_serie($id ,$params = array())
    {
        $this->db->where('id_serie', $id);
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('avaliacao_serie')->result_array();
    }
        
    /*
     * function to add new avaliacao_serie
     */
    function add_avaliacao_serie($params)
    {
        $this->db->insert('avaliacao_serie',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update avaliacao_livro
     */
    function update_avaliacao_serie($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('avaliacao_serie',$params);
    }
    
    /*
     * function to delete avaliacao_serie
     */
    function delete_avaliacao_serie($id)
    {
        return $this->db->delete('avaliacao_serie',array('id'=>$id));
    }
}
