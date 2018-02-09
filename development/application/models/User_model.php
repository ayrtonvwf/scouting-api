<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    private $table = 'user';

    public function __construct() {
        parent::__construct();
    }

    public function save(array $data) : ?int {
        return $this->db->insert($this->table, $data) ? $this->db->insert_id() : null;
    }
}