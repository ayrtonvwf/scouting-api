<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('team_model');
	}
	/**
	 * @api {get} /team Request Team List
	 * @apiName TeamGet
	 * @apiGroup Team
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} [id] Team id.
	 * @apiParam {Number} [number_start] First team number.
	 * @apiParam {Number} [number_end] Last team number.
	 * @apiParam {String} [search] Search string.
	 *
	 * @apiSuccess {Object[]} teams List of Teams.
	 * @apiSuccess {Number} teams.id Id of the Team.
	 * @apiSuccess {String} teams.name Name of the Team.
	 * @apiSuccess {Number} teams.number Number of the Team.
	 * @apiSuccess {Boolean} teams.enabled Wether the Team is enabled to submit evaluations.
	 * @apiSuccess {DateTime} teams.created_at Creation date of the Team.
	 */
	public function get() : void {
		$this->_require_token();
		if (!$this->_get_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		if ($this->data) {
			$search = get_array_values($this->data, ['id', 'number_start', 'number_end', 'search']);
		} else {
			$search = array_fill_keys(['id', 'number_start', 'number_end', 'search'], null);
		}
		
		$teams = $this->team_model->search($search['id'], $search['number_start'], $search['number_end'], $search['search']);
		$teams = array_map(function($team) {
			return get_array_values($team, ['id', 'name', 'number', 'enabled', 'created_at']);
		}, $teams);
		
		echo json_encode(['result' => $teams]);
	}

	private function _get_validate() : bool {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('id', 'Id', 'strip_tags|trim|integer');
		$this->form_validation->set_rules('number_start', 'Number start', 'strip_tags|trim|integer|greater_than[0]');
		$this->form_validation->set_rules('number_end', 'Number end', 'strip_tags|trim|greater_than[0]');
		$this->form_validation->set_rules('search', 'Search', 'strip_tags|trim');
		$this->form_validation->run();
		return !$this->form_validation->error_array();
	}
}
