<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    private $table = 'user';

    public function __construct() {
        parent::__construct();
    }

    public function get_by_id(int $id) : ?array {
        $this->db->where('id', $id);
        $result = $this->db->get($this->table);
        return $result->num_rows() ? $result->row_array() : null;
    }

    public function get_by_email(string $email) : ?stdClass {
        $this->db->where('email', $email);
        $result = $this->db->get($this->table);
        return $result->num_rows() ? $result->row() : null;
    }

    public function password_hash(string $plain_password) : string {
        return password_hash($plain_password, PASSWORD_DEFAULT);
    }

    public function password_matches(string $plain_password, string $encrypted_password) : bool {
        return password_verify($plain_password, $encrypted_password);
    }
    
    public function password_rehash(int $id, string $plain_password, string $encrypted_password) : void {
        if (!password_needs_rehash($encrypted_password, PASSWORD_DEFAULT)) {
            return;
        }
        
        $new_password = $this->password_hash($plain_password);

        $this->db->where('id', $id);
        $this->db->update($this->table, ['password' => $new_password]);
    }

    public function password_check(int $user_id, string $plain_password) : bool {
        $this->db->where('id', $user_id);
        $user = $this->db->get($this->table);

        if (!$user->num_rows()) {
            return false;
        }

        $hash = $user->row()->password;
        return $this->password_matches($plain_password, $hash);
    }

    public function save(array $data) : ?int {
        $data['password'] = $this->password_hash($data['password']);
        return $this->db->insert($this->table, $data) ? $this->db->insert_id() : null;
    }

    public function update(array $data) : bool {
        if (!empty($data['password'])) {
            $data['password'] = $this->password_hash($data['password']);
        }
        $this->db->where('id', $data['id']);
        return $this->db->update($this->table, $data);
    }
}