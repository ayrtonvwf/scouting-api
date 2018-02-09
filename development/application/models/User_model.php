<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    private $table = 'user';

    public function __construct() {
        parent::__construct();
    }

    public function get_by_email(string $email) : ?stdClass {
        $this->db->where('email', $email);
        $result = $this->db->get($this->table);
        return $result->num_rows() ? $result->row() : null;
    }

    public function password_matches(string $plain_password, string $encrypted_password) : bool {
        return password_verify($plain_password, $encrypted_password);
    }
    
    public function password_rehash(int $id, string $plain_password, string $encrypted_password) : void {
        if (!password_needs_rehash($encrypted_password, PASSWORD_DEFAULT)) {
            return;
        }
        
        $new_password = password_hash($plain_password, PASSWORD_DEFAULT);

        $this->db->where('id', $id);
        $this->db->update($this->table, ['password' => $new_password]);
    }

    public function save(array $data) : ?int {
        return $this->db->insert($this->table, $data) ? $this->db->insert_id() : null;
    }
}