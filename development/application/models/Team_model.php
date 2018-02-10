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
}