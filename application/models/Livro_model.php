<?php

class Livro_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Get livro by id
     */

    function get_livro($id) {
        
                $this->db->select('livro.*,avg(avaliacao_livro.nota) as media,
                        pessoa.nome as nomeautor,
                        p1.nome as nomepersonagem1,
                        p2.nome as nomepersonagem2,
                        p3.nome as nomepersonagem3,
                        p4.nome as nomepersonagem4 ');
        $this->db->join('avaliacao_livro', 'avaliacao_livro.id_livro = livro.id', 'left');
        $this->db->join('pessoa', 'pessoa.id = livro.autor', 'left');
        $this->db->join('pessoa as p1', 'p1.id = livro.personagem1', 'left');
        $this->db->join('pessoa as p2', 'p2.id = livro.personagem2', 'left');
        $this->db->join('pessoa as p3', 'p3.id = livro.personagem3', 'left');
        $this->db->join('pessoa as p4', 'p4.id = livro.personagem4', 'left');
        $this->db->join('genero', 'genero.id = livro.id_genero', 'left');
        $this->db->group_by('livro.id');
        $this->db->order_by('id', 'desc');
        return $this->db->get_where('livro', array('livro.id' => $id))->row_array();
    }

    /*
     * Get all livro count
     */

    function get_all_livro_count() {
        $this->db->select('livro.id, livro.titulo, livro.publicacao, livro.sinopse, pessoa.nome as nome_autor, genero.descricao as genero');
        $this->db->from('livro');
        $this->db->join('pessoa', 'pessoa.id = livro.autor', 'left');
        $this->db->join('genero', 'genero.id = livro.id_genero', 'left');
        return $this->db->count_all_results();
    }

    /*
     * Get all livro
     */

    function get_all_livro($params = array()) {
        $this->db->order_by('id', 'desc');
        $this->db->select('livro.id, livro.titulo, livro.publicacao, livro.sinopse, pessoa.nome as nome_autor, genero.descricao as genero');
        $this->db->from('livro');
        $this->db->join('pessoa', 'pessoa.id = livro.autor', 'left');
        $this->db->join('genero', 'genero.id = livro.id_genero', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }

    /*
     * function to add new livro
     */

    function add_livro($params) {
        $this->db->insert('livro', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update livro
     */

    function update_livro($id, $params) {
        $this->db->where('id', $id);
        return $this->db->update('livro', $params);
    }

    /*
     * function to delete livro
     */

    function delete_livro($id) {
        return $this->db->delete('livro', array('id' => $id));
    }

    function get_recentes() {
        $this->db->select('livro.*,avg(avaliacao_livro.nota) as media,
                        pessoa.nome as nomeautor,
                        p1.nome as nomepersonagem1,
                        p2.nome as nomepersonagem2,
                        p3.nome as nomepersonagem3,
                        p4.nome as nomepersonagem4 ');
        $this->db->join('avaliacao_livro', 'avaliacao_livro.id_livro = livro.id', 'left');
        $this->db->join('pessoa', 'pessoa.id = livro.autor', 'left');
        $this->db->join('pessoa as p1', 'p1.id = livro.personagem1', 'left');
        $this->db->join('pessoa as p2', 'p2.id = livro.personagem2', 'left');
        $this->db->join('pessoa as p3', 'p3.id = livro.personagem3', 'left');
        $this->db->join('pessoa as p4', 'p4.id = livro.personagem4', 'left');
        $this->db->join('genero', 'genero.id = livro.id_genero', 'left');
        $this->db->group_by('livro.id');
        $this->db->limit(3);
        $this->db->order_by('id', 'desc');
        $this->db->from('livro');
        return $this->db->get()->result_array();
    }

    function get_pesquisa($match) {
        $this->db->select('livro.*,avg(avaliacao_livro.nota) as media,
                        pessoa.nome as nomeautor,
                        p1.nome as nomepersonagem1,
                        p2.nome as nomepersonagem2,
                        p3.nome as nomepersonagem3,
                        p4.nome as nomepersonagem4 ');
        $this->db->join('avaliacao_livro', 'avaliacao_livro.id_livro = livro.id', 'left');
        $this->db->join('pessoa', 'pessoa.id = livro.autor', 'left');
        $this->db->join('pessoa as p1', 'p1.id = livro.personagem1', 'left');
        $this->db->join('pessoa as p2', 'p2.id = livro.personagem2', 'left');
        $this->db->join('pessoa as p3', 'p3.id = livro.personagem3', 'left');
        $this->db->join('pessoa as p4', 'p4.id = livro.personagem4', 'left');
        $this->db->join('genero', 'genero.id = livro.id_genero', 'left');
        $this->db->group_by('livro.id');
        $this->db->order_by('id', 'desc');
        $this->db->like('titulo', $match, 'both');
        $this->db->or_like('sinopse', $match, 'both');
        $this->db->from('livro');
        return $this->db->get()->result_array();
    }

}
