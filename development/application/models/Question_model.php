<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_model extends CI_Model {
    
    private $table = 'question';

    public function __construct() {
        parent::__construct();
    }
    
    public function search(?int $id = null, ?int $question_type_id = null, ?string $search_string = null) : array {
        if ($id) {
            $this->db->where('id', $id);
        }
        if ($question_type_id) {
            $this->db->where('question_type_id', $question_type_id);
        }
        if ($search_string) {
            $this->db->like('description', $search_string);
        }
        
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_id(int $id) : ?stdClass {
        $this->db->where('id', $id);
        $result = $this->db->get($this->table);
        return $result->num_rows() ? $result->row() : null;
    }

}