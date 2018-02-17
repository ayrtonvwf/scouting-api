<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {
    
    private $table = 'team';

    public function __construct() {
        parent::__construct();
    }

    public function get_user_teams(int $user_id) : array {
        $this->db->select('team.*');
        $this->db->join('user_has_team', 'user_has_team.team_id = team.id');
        $this->db->join('user', 'user.id = user_has_team.user_id');
        $this->db->where('user.id', $user_id);
        return $this->db->get($this->table)->result_array();
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

    public function join(int $team_id, int $user_id) : bool {
        $this->db->where('team_id', $team_id);
        $this->db->where('is_admin', true);
        $has_admin = (bool) $this->db->count_all_results('user_has_team');

        $data = [
            'team_id' => $team_id,
            'user_id' => $user_id,
            'is_admin' => !$has_admin
        ];
        return $this->db->insert('user_has_team', $data);
    }

    public function leave(int $team_id, int $user_id) : bool {
        $this->db->where('team_id', $team_id);
        $this->db->where('user_id', $user_id);
        return $this->db->delete('user_has_team');
    }
    
    public function has_user(int $team_id, int $user_id) : bool {
        $this->db->where('team_id', $team_id);
        $this->db->where('user_id', $user_id);
        return (bool) $this->db->count_all_results('user_has_team');
    }

}