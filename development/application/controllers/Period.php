<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Period extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('period_model');
	}
	/**
	 * @api {get} /period Request Period List
	 * @apiName PeriodGet
	 * @apiGroup Period
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} [id] Period id.
	 * @apiParam {Number} [position_start] First position of the Period.
	 * @apiParam {Number} [position_end] End position of the Period.
	 * @apiParam {String} [search] Search string.
	 *
	 * @apiSuccess {Object[]} periods List of Periods
	 * @apiSuccess {Number} periods.id Id of the Period.
	 * @apiSuccess {String} periods.name Name of the Period.
	 * @apiSuccess {Number} periods.position Position of the Period.
	 * @apiSuccess {DateTime} periods.created_at Creation date of the Period.
	 */
	public function get() : void {
		$this->_require_token();
		if (!$this->_get_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		$input_fields = ['id', 'position_start', 'position_end', 'search'];
		if ($this->data) {
			$search = get_array_values($this->data, $input_fields);
		} else {
			$search = array_fill_keys($input_fields, null);
		}
		
		$periods = $this->period_model->search($search['id'], $search['position_start'], $search['position_end'], $search['search']);
		$periods = array_map(function($period) {
			return get_array_values($period, ['id', 'name', 'position', 'created_at']);
		}, $periods);
		
		echo json_encode(['result' => $periods]);
	}

	private function _get_validate() : bool {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('id', 'Id', 'strip_tags|trim|integer');
		$this->form_validation->set_rules('position_start', 'Position start', 'strip_tags|trim|integer|greater_than[0]');
		$this->form_validation->set_rules('position_end', 'Position end', 'strip_tags|trim|greater_than[0]');
		$this->form_validation->set_rules('search', 'Search', 'strip_tags|trim');
		$this->form_validation->run();
		return !$this->form_validation->error_array();
	}
}
