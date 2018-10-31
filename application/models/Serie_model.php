<?php

class Serie_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Get serie by id
     */

    function get_serie($id) {
        
        
          $this->db->select('serie.*,avg(avaliacao_serie.nota) as media,
                        pessoa.nome as nomediretor,
                        p1.nome as nomeator1,
                        p2.nome as nomeator2,
                        p3.nome as nomeator3,
                        p4.nome as nomeator4 ');
        $this->db->join('avaliacao_serie', 'avaliacao_serie.id_serie = serie.id', 'left');
        $this->db->join('pessoa', 'pessoa.id = serie.diretor', 'left');
        $this->db->join('pessoa as p1', 'p1.id = serie.ator1', 'left');
        $this->db->join('pessoa as p2', 'p2.id = serie.ator2', 'left');
        $this->db->join('pessoa as p3', 'p3.id = serie.ator3', 'left');
        $this->db->join('pessoa as p4', 'p4.id = serie.ator4', 'left');
        $this->db->join('genero', 'genero.id = serie.id_genero', 'left');
        $this->db->group_by('serie.id');
        
        return $this->db->get_where('serie', array('serie.id' => $id))->row_array();
    }

    /*
     * Get all serie count
     */

    function get_all_serie_count() {
        $this->db->select('serie.id, serie.titulo, serie.episodios, serie.temporadas, serie.sinopse, pessoa.nome as nome_diretor, genero.descricao as genero');
        $this->db->from('serie');
        $this->db->join('pessoa', 'pessoa.id = serie.diretor', 'left');
        $this->db->join('genero', 'genero.id = serie.id_genero', 'left');
        return $this->db->count_all_results();
    }

    /*
     * Get all serie
     */

    function get_all_serie($params = array()) {
        $this->db->order_by('id', 'desc');
        $this->db->select('serie.id, serie.titulo, serie.episodios, serie.temporadas, serie.sinopse, pessoa.nome as nome_diretor, genero.descricao as genero');
        $this->db->from('serie');
        $this->db->join('pessoa', 'pessoa.id = serie.diretor', 'left');
        $this->db->join('genero', 'genero.id = serie.id_genero', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }

    /*
     * function to add new serie
     */

    function add_serie($params) {
        $this->db->insert('serie', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update serie
     */

    function update_serie($id, $params) {
        $this->db->where('id', $id);
        return $this->db->update('serie', $params);
    }

    /*
     * function to delete serie
     */

    function delete_serie($id) {
        return $this->db->delete('serie', array('id' => $id));
    }

    function get_recentes() {
        $this->db->select('serie.*,avg(avaliacao_serie.nota) as media,
                        pessoa.nome as nomediretor,
                        p1.nome as nomeator1,
                        p2.nome as nomeator2,
                        p3.nome as nomeator3,
                        p4.nome as nomeator4 ');
        $this->db->join('avaliacao_serie', 'avaliacao_serie.id_serie = serie.id', 'left');
        $this->db->join('pessoa', 'pessoa.id = serie.diretor', 'left');
        $this->db->join('pessoa as p1', 'p1.id = serie.ator1', 'left');
        $this->db->join('pessoa as p2', 'p2.id = serie.ator2', 'left');
        $this->db->join('pessoa as p3', 'p3.id = serie.ator3', 'left');
        $this->db->join('pessoa as p4', 'p4.id = serie.ator4', 'left');
        $this->db->join('genero', 'genero.id = serie.id_genero', 'left');
        $this->db->group_by('serie.id');
        $this->db->limit(3);
        $this->db->order_by('id', 'desc');
        $this->db->from('serie');
        return $this->db->get()->result_array();
    }

    function get_pesquisa($match) {
         $this->db->select('serie.*,avg(avaliacao_serie.nota) as media,
                        pessoa.nome as nomediretor,
                        p1.nome as nomeator1,
                        p2.nome as nomeator2,
                        p3.nome as nomeator3,
                        p4.nome as nomeator4 ');
        $this->db->join('avaliacao_serie', 'avaliacao_serie.id_serie = serie.id', 'left');
        $this->db->join('pessoa', 'pessoa.id = serie.diretor', 'left');
        $this->db->join('pessoa as p1', 'p1.id = serie.ator1', 'left');
        $this->db->join('pessoa as p2', 'p2.id = serie.ator2', 'left');
        $this->db->join('pessoa as p3', 'p3.id = serie.ator3', 'left');
        $this->db->join('pessoa as p4', 'p4.id = serie.ator4', 'left');
        $this->db->join('genero', 'genero.id = serie.id_genero', 'left');
        $this->db->group_by('serie.id');
        $this->db->order_by('id', 'desc');       
        $this->db->like('titulo', $match, 'both');
        $this->db->or_like('sinopse', $match, 'both');
        $this->db->from('serie');
        return $this->db->get()->result_array();
    }

}
