<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->helper('help_helper');
        $this->load->model('team_model');
	}
    
	public function index() {
        if (!ENABLE_TEAM_LOAD) {
            return;
        }

        ignore_user_abort(true);
        set_time_limit(0);

        for ($i = 0; $i < TBA_MAX_TEAM_PAGE; $i++) {
            $cSession = curl_init(); 
            
            curl_setopt($cSession, CURLOPT_URL, TBA_URL."/teams/$i/simple");
            curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($cSession, CURLOPT_HTTPHEADER, array(
                'X-TBA-Auth-Key: '.TBA_TOKEN,
                'User-Agent: Scouting API'
            ));
            
            $result = curl_exec($cSession);
            curl_close($cSession);
            $result = json_decode($result);
    
            $teams = array_map(function($team) {
                return [
                    'number' => $team->team_number,
                    'name' => $team->nickname
                ];
            }, $result);

            $this->team_model->save_batch($teams);
        }
	}
}
