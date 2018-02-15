<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation_model extends CI_Model {
    
    private $table = 'evaluation';

    public function __construct() {
        parent::__construct();
    }

    public function save(array $data, array $answers) : ?int {
        $this->db->trans_start();
        
        if (!$this->db->insert($this->table, $data)) {
            return null;
        }
        $evaluation_id = $this->db->insert_id();

        foreach ($answers as &$answer) {
            $answer['evaluation_id'] = $evaluation_id;
        }
        $this->db->insert_batch('answer', $answers);

        $this->db->trans_complete();
        return $evaluation_id;
    }

    public function update(array $data) : bool {
        if (!empty($data['password'])) {
            $data['password'] = $this->password_hash($data['password']);
        }
        $this->db->where('id', $data['id']);
        return $this->db->update($this->table, $data);
    }
}