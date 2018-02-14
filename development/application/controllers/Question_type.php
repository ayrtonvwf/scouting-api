<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_type extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('question_type_model');
	}
	/**
	 * @api {get} /question_type Request Question Type List
	 * @apiName QuestionTypeGet
	 * @apiGroup QuestionType
	 * @apiVersion 1.0.0
	 * 
	 * @apiDescription These are the available question types:
	 * 
	 * | Id | Name				| Description							|
	 * |---|--------------------|---------------------------------------|
	 * | 1 | Boolean			| 0 or 1								|
	 * | 2 | Positive Integer	| Integer from 0 to 1,000,000			|
	 * | 3 | Percent			| Integer from 0 to 100					|
	 * | 4 | Phrase				| Small string (max 100 characters)		|
	 * | 5 | Text				| Big string (max 1000 characters		|
	 * | 6 | Seconds			| 0 to 86,400 (60 * 60 * 24 or 1 day)	|
	 * 
	 * @apiParam {Number} [id] Id of the Question Type.
	 * @apiParam {String} [search] Search string.
	 * 
	 * @apiSuccess {Object[]} question_types List of Question Types
	 * @apiSuccess {Number} question_types.id Id of the Question Type.
	 * @apiSuccess {String} question_types.name Name of the Question Type.
	 * @apiSuccess {DateTime} question_types.created_at Creation date of the Question Type.
	 */
	public function get() : void {
		$this->_require_token();
		if (!$this->_get_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		$input_fields = ['id', 'search'];
		if ($this->data) {
			$search = get_array_values($this->data, $input_fields);
		} else {
			$search = array_fill_keys($input_fields, null);
		}
		
		$question_types = $this->question_type_model->search($search['id'], $search['search']);
		$question_types = array_map(function($question_type) {
			return get_array_values($question_type, ['id', 'name', 'created_at']);
		}, $question_types);
		
		echo json_encode(['result' => $question_types]);
	}

	private function _get_validate() : bool {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('id', 'Id', 'strip_tags|trim|integer');
		$this->form_validation->set_rules('search', 'Search', 'strip_tags|trim');
		$this->form_validation->run();
		return !$this->form_validation->error_array();
	}
	
}
