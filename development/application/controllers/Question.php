<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('question_model');
	}
	/**
	 * @api {get} /question Request Question List
	 * @apiName QuestionGet
	 * @apiGroup Question
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} [id] Id of the Question.
	 * @apiParam {Number} [question_type_id] Id of the Type of the Question.
	 * @apiParam {String} [search] Search string.
	 *
	 * @apiSuccess {Object[]} questions List of Questions
	 * @apiSuccess {Number} questions.id Id of the Question.
	 * @apiSuccess {Number} questions.question_type_id Id of the Type of the Question.
	 * @apiSuccess {String} questions.description Description of the Question.
	 * @apiSuccess {DateTime} questions.created_at Creation date of the Question.
	 */
	public function get() : void {
		$this->_require_token();
		if (!$this->_get_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		$input_fields = ['id', 'question_type_id', 'search'];
		if ($this->data) {
			$search = get_array_values($this->data, $input_fields);
		} else {
			$search = array_fill_keys($input_fields, null);
		}
		
		$questions = $this->question_model->search($search['id'], $search['question_type_id'], $search['search']);
		$questions = array_map(function($question) {
			return get_array_values($question, ['id', 'question_type_id', 'description', 'created_at']);
		}, $questions);
		
		echo json_encode(['result' => $questions]);
	}

	private function _get_validate() : bool {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('id', 'Id', 'strip_tags|trim|integer');
		$this->form_validation->set_rules('question_type_id', 'Question Type Id', 'strip_tags|trim|integer');
		$this->form_validation->set_rules('search', 'Search', 'strip_tags|trim');
		$this->form_validation->run();
		return !$this->form_validation->error_array();
	}
}
