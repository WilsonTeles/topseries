<?php

class Filme_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Get filme by id
     */

    function get_filme($id) {

        $this->db->select('filme.*,avg(avaliacao_filme.nota) as media,
                        pessoa.nome as nomediretor,
                        p1.nome as nomeator1,
                        p2.nome as nomeator2,
                        p3.nome as nomeator3,
                        p4.nome as nomeator4 ');
        $this->db->join('avaliacao_filme', 'avaliacao_filme.id_filme = filme.id', 'left');
        $this->db->join('pessoa', 'pessoa.id = filme.diretor', 'left');
        $this->db->join('pessoa as p1', 'p1.id = filme.ator1', 'left');
        $this->db->join('pessoa as p2', 'p2.id = filme.ator2', 'left');
        $this->db->join('pessoa as p3', 'p3.id = filme.ator3', 'left');
        $this->db->join('pessoa as p4', 'p4.id = filme.ator4', 'left');
        $this->db->join('genero', 'genero.id = filme.id_genero', 'left');
        $this->db->group_by('filme.id');


        return $this->db->get_where('filme', array('filme.id' => $id))->row_array();
    }

    /*
     * Get all filme count
     */

    function get_all_filme_count() {
        $this->db->select('filme.id, filme.titulo, filme.sinopse, filme.duracao, filme.nota, filme.ano, pessoa.nome as nome_diretor, genero.descricao as descricao');
        $this->db->from('filme');
        $this->db->join('pessoa', 'pessoa.id = filme.diretor', 'left');
        $this->db->join('genero', 'genero.id = filme.id_genero', 'left');
        return $this->db->count_all_results();
    }

    /*
     * Get all filme
     */

    function get_all_filme($params = array()) {
        $this->db->order_by('id', 'desc');
        $this->db->select('filme.id, filme.titulo, filme.sinopse, filme.duracao, filme.ano, pessoa.nome as nome_diretor, genero.descricao as genero');
        $this->db->from('filme');
        $this->db->join('pessoa', 'pessoa.id = filme.diretor', 'left');
        $this->db->join('genero', 'genero.id = filme.id_genero', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }

    /*
     * function to add new filme
     */

    function add_filme($params) {
        $this->db->insert('filme', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update filme
     */

    function update_filme($id, $params) {
        $this->db->where('id', $id);
        return $this->db->update('filme', $params);
    }

    /*
     * function to delete filme
     */

    function delete_filme($id) {
        return $this->db->delete('filme', array('id' => $id));
    }

    function get_recentes() {

        $this->db->select('filme.*,avg(avaliacao_filme.nota) as media,
                        pessoa.nome as nomediretor,
                        p1.nome as nomeator1,
                        p2.nome as nomeator2,
                        p3.nome as nomeator3,
                        p4.nome as nomeator4 ');
        $this->db->join('avaliacao_filme', 'avaliacao_filme.id_filme = filme.id', 'left');
        $this->db->join('pessoa', 'pessoa.id = filme.diretor', 'left');
        $this->db->join('pessoa as p1', 'p1.id = filme.ator1', 'left');
        $this->db->join('pessoa as p2', 'p2.id = filme.ator2', 'left');
        $this->db->join('pessoa as p3', 'p3.id = filme.ator3', 'left');
        $this->db->join('pessoa as p4', 'p4.id = filme.ator4', 'left');
        $this->db->join('genero', 'genero.id = filme.id_genero', 'left');
        $this->db->group_by('filme.id');
        $this->db->limit(3);
        $this->db->order_by('id', 'desc');
        $this->db->from('filme');
        return $this->db->get()->result_array();
    }

    function get_pesquisa($match) {

        $this->db->select('filme.*,avg(avaliacao_filme.nota) as media,
                        pessoa.nome as nomediretor,
                        p1.nome as nomeator1,
                        p2.nome as nomeator2,
                        p3.nome as nomeator3,
                        p4.nome as nomeator4 ');
        $this->db->join('avaliacao_filme', 'avaliacao_filme.id_filme = filme.id', 'left');
        $this->db->join('pessoa', 'pessoa.id = filme.diretor', 'left');
        $this->db->join('pessoa as p1', 'p1.id = filme.ator1', 'left');
        $this->db->join('pessoa as p2', 'p2.id = filme.ator2', 'left');
        $this->db->join('pessoa as p3', 'p3.id = filme.ator3', 'left');
        $this->db->join('pessoa as p4', 'p4.id = filme.ator4', 'left');
        $this->db->join('genero', 'genero.id = filme.id_genero', 'left');
        $this->db->group_by('filme.id');
        $this->db->like('titulo', $match, 'both');
        $this->db->or_like('sinopse', $match, 'both');
        $this->db->order_by('id', 'desc');
        $this->db->from('filme');

        return $this->db->get()->result_array();
    }

}
