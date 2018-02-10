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

    public function search(int $current_user_id, ?int $search_user_id = null, ?int $search_team_id = null, ?int $search_string = null) : array {
        $this->db->select('team.id');
        $this->db->join('user_has_team', 'user_has_team.team_id = team.id');
        $this->db->join('user', 'user.id = user_has_team.user_id');
        $this->db->where('user.id', $current_user_id);
        $teams = $this->db->get('team')->result_array();
        if (!$teams) {
            return [];
        }
        $team_ids = array_column($teams, 'id');

        $this->db->select('user.*');
        $this->db->join('user_has_team', 'user_has_team.user_id = user.id');
        $this->db->join('team', 'team.id = user_has_team.team_id');
        $this->db->where_in('team.id', $team_ids);
        if ($search_user_id) {
            $this->db->where('user.id', $search_user_id);
        }
        if ($search_team_id) {
            $this->db->where('team.id', $search_team_id);
        }
        if ($search_string) {
            $this->db->group_start();
            $this->db->like('user.name', $search_string);
            $this->db->or_like('user.email', $search_string);
            $this->db->or_like('team.name', $search_string);
            $this->db->or_like('team.number', $search_string);
            $this->db->group_end();
        }
        return $this->db->get($this->table)->result_array();
    }
}