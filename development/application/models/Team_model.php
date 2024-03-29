<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {
    
    private $table = 'team';

    public function __construct() {
        parent::__construct();
    }

    public function search(?int $id = null, ?int $start_number = null, ?int $end_number = null, ?string $search_string = null) : array {
        if ($id) {
            $this->db->where('id', $id);
        }
        if ($start_number) {
            $this->db->where('number >=', $start_number);
        }
        if ($end_number) {
            $this->db->where('number <=', $end_number);
        }
        if ($search_string) {
            $this->db->group_start();
            $this->db->like('name', $search_string);
            $this->db->or_like('number', $search_string);
            $this->db->group_end();
        }
        
        return $this->db->get($this->table)->result_array();
    }

    public function save_batch(array $teams) : bool {
        return $this->db->insert_batch($this->table, $teams);
    }
}