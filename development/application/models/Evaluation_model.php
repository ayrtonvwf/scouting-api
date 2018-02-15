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

        return $this->db->trans_complete() ? $evaluation_id : null;
    }

    public function update(int $id, array $answers) : bool {
        $this->db->trans_start();
        
        $this->db->where('id', $id);
        $this->db->update($this->table, ['updated_at' => date('Y-m-d H:i:s')]);

        $this->db->where('evaluation_id', $id);
        $this->db->delete('answer');
        
        foreach ($answers as &$answer) {
            $answer['evaluation_id'] = $id;
        }
        $this->db->insert_batch('answer', $answers);

        return $this->db->trans_complete();
    }
    
    public function search(?int $id = null, ?int $team_id = null, ?string $date_start = null, ?string $date_end = null) : array {
        if ($id) {
            $this->db->where('id', $id);
        }
        if ($team_id) {
            $this->db->where('team_id', $team_id);
        }
        if ($date_start) {
            $this->db->where('DATE(created_at) >=', $date_start);
        }
        if ($date_end) {
            $this->db->where('DATE(created_at) <=', $date_end);
        }
        
        return $this->db->get($this->table)->result_array();
    }

    public function get_evaluation_answers(int $evaluation_id) : array {
        $this->db->where('evaluation_id', $evaluation_id);
        return $this->db->get('answer')->result_array();
    }
}