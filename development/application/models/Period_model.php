<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Period_model extends CI_Model {
    
    private $table = 'period';

    public function __construct() {
        parent::__construct();
    }
    
    public function search(?int $id = null, ?int $start_position = null, ?int $end_position = null, ?string $search_string = null) : array {
        if ($id) {
            $this->db->where('id', $id);
        }
        if ($start_position) {
            $this->db->where('position >=', $start_position);
        }
        if ($end_position) {
            $this->db->where('position <=', $end_position);
        }
        if ($search_string) {
            $this->db->like('name', $search_string);
        }
        
        $this->db->order_by('position');
        return $this->db->get($this->table)->result_array();
    }

}