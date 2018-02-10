<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_type_model extends CI_Model {
    
    private $table = 'question_type';

    public function __construct() {
        parent::__construct();
    }
    
    public function search(?int $id = null, ?string $search_string = null) : array {
        if ($id) {
            $this->db->where('id', $id);
        }
        if ($search_string) {
            $this->db->like('name', $search_string);
        }
        
        return $this->db->get($this->table)->result_array();
    }

}