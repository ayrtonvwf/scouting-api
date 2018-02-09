<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Token_model extends CI_Model {
    
    private $table = 'token';

    public function __construct() {
        parent::__construct();
    }

    public function new_token(int $user_id) : ?string {
        $encrypt_data = array(
            'user_id' => $user_id,
            'timestamp' => time()
        );
        if (!$token = $this->encryption->encrypt(json_encode($encrypt_data))) {
            return null;
        }

        if (!$this->db->insert($this->table, ['user_id' => $user_id, 'value' => $token])) {
            return null;
        }

        return $token;
    }

    public function is_valid_token(string $token) : bool {
        $this->db->where('value', $token);
        $this->db->where('DATE_SUM(CURDATE(), INTERVAL 12 HOURS) <= `created_at`');
        return (bool) $this->db->count_all_results();
    }
}