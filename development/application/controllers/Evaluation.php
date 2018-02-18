<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(['evaluation_model', 'question_model']);
	}
	/**
	 * @api {get} /evaluation Request Evaluation List
	 * @apiName EvaluationGet
	 * @apiGroup Evaluation
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} [id] Id of the evaluation.
	 * @apiParam {Number} [team_id] Id of the evaluated Team.
	 * @apiParam {DateTime} [date_start] Start date of the evaluation.
	 * @apiParam {DateTime} [end_start] End date of the evaluation.
	 *
	 * @apiSuccess {Object[]} evaluations List of Evaluations
	 * @apiSuccess {Number} evaluations.id Id of the Evaluation.
	 * @apiSuccess {Boolean} evaluations.self Whether the Evaluation was created by the current user.
	 * @apiSuccess {Number} evaluations.team_id Id of the evaluated Team.
	 * @apiSuccess {DateTime} evaluations.created_at Creation date of the Evaluation.
	 * @apiSuccess {Object[]} evaluations.answers List of Answers in the Evaluation.
	 * @apiSuccess {Number} evaluations.answers.id Id of the Answer.
	 * @apiSuccess {Number} evaluations.answers.question_id Id of the Question.
	 * @apiSuccess {String} evaluations.answers.value Value of the Answer.
	 */
	public function get() : void {
		if (!$this->_get_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		$input_fields = ['id', 'team_id', 'date_start', 'date_end'];
		if ($this->data) {
			$search = get_array_values($this->data, $input_fields);
		} else {
			$search = array_fill_keys($input_fields, null);
		}

		$user_id = $this->token_model->get_user_id($this->token);

		$evaluations = $this->evaluation_model->search($user_id, $search['id'], $search['team_id'], $search['date_start'], $search['date_end']);
		$evaluations = array_map(function($evaluation) {
			return $this->_prepare_evaluation($evaluation);
		}, $evaluations);
		
		echo json_encode(['result' => $evaluations]);
	}

	private function _get_validate() : bool {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('id', 'Id', 'strip_tags|trim|integer');
		$this->form_validation->set_rules('team_id', 'Team id', 'strip_tags|trim|integer');
		$this->form_validation->set_rules('date_start', 'Start Date', 'strip_tags|trim|exact_length[10]');
		$this->form_validation->set_rules('date_end', 'End Date', 'strip_tags|trim|exact_length[10]');
		$this->form_validation->run();
		return !$this->form_validation->error_array();
	}

	private function _prepare_evaluation(array $evaluation) {
		$evaluation = get_array_values($evaluation, ['id', 'self', 'team_id', 'created_at']);
		$answers = $this->evaluation_model->get_evaluation_answers($evaluation['id']);
		$evaluation['answers'] = $this->_prepare_answers($answers);
		return $evaluation;
	}

	private function _prepare_answers(array $answers) {
		return array_map(function($answer) {
			return get_array_values($answer, ['id', 'question_id', 'value']);
		}, $answers);
	}
	
	/**
	 * @api {post} /evaluation Save Evaluation
	 * @apiName EvaluationPost
	 * @apiGroup Evaluation
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} team_id Id of the evaluated Team.
	 * @apiParam {Object[]} answers Answers of the Evaluation.
	 * @apiParam {Number} answers.question_id Id of the Question.
	 * @apiParam {Number} answers.value Value of the Answer.
	 */
	public function post() : void {
		if (!$this->_post_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		$data = [
			'team_id' => $this->data['team_id'],
			'user_id' => $this->token_model->get_user_id($this->token)
		];

		echo json_encode($this->evaluation_model->save($data, $this->data['answers']));
	}

	private function _post_validate() : bool {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('team_id', 'Team Id', 'strip_tags|trim|integer|required');
		$this->form_validation->run();
		if ($this->form_validation->error_array()) {
			return false;
		}

		foreach ($this->data['answers'] as $index => $answer) {
			if ($error_message = $this->_answer_error($answer)) {
				$safe_index = trim(strip_tags($index));
				$this->custom_error_array["answers[$safe_index]"] = $error_message;
			}
		}

		return !$this->custom_error_array;
	}
	
	/**
	 * @api {put} /evaluation Update the Evaluation
	 * @apiName EvaluationPut
	 * @apiGroup Evaluation
	 * @apiVersion 1.0.0
	 * 
	 * @apiDescription The server deletes all the answers that are not sent in the update.
	 * If the client wants to update only one answer, it needs to send all the answers anyway.
	 * 
	 * @apiParam {Number} id Id of the Evaluation.
	 * @apiParam {Object[]} answers Answers of the Evaluation.
	 * @apiParam {Number} answers.question_id Id of the Question.
	 * @apiParam {Number} answers.value Value of the Answer.
	 */
	public function put() : void {
		if (!$this->_put_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		echo json_encode($this->evaluation_model->update($this->data['id'], $this->data['answers']));
	}

	private function _put_validate() : bool {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('id', 'Id', 'strip_tags|trim|integer|required');
		$this->form_validation->run();
		if ($this->form_validation->error_array()) {
			return false;
		}

		foreach ($this->data['answers'] as $index => $answer) {
			if ($error_message = $this->_answer_error($answer)) {
				$safe_index = trim(strip_tags($index));
				$this->custom_error_array["answers[$safe_index]"] = $error_message;
			}
		}

		return !$this->custom_error_array;
	}
	
	private function _answer_error($answer) : ?string {
		if (!is_array($answer)) {
			return 'The answer is not an object';
		}

		if (!$answer) {
			return 'The answer is empty';
		}

		if (!isset($answer['question_id'])) {
			return 'The answer has not a question_id';
		}

		if (!isset($answer['value'])) {
			return 'The answer has not a value';
		}
		
		if (!is_numeric($answer['question_id']) || !$this->question_model->get_by_id($answer['question_id'])) {
			return 'The answer has not a valid question_id';
		}

		if (!$this->_is_valid_answer_value($answer['question_id'], $answer['value'])) {
			return 'The answer has not a valid value';
		}

		return null;
	}

	private function _is_valid_answer_value(int $question_id, $answer_value) : bool {
		$question = $this->question_model->get_by_id($question_id);
		switch ($question->question_type_id) {
			case QUESTION_TYPE['BOOLEAN'] :
				return is_int_string($answer_value) && in_array($answer_value, ['0', '1']);

			case QUESTION_TYPE['POSITIVE_INTEGER'] :
				return is_int_string($answer_value) && $answer_value >= 0 && $answer_value <= 1000000;

			case QUESTION_TYPE['PERCENT'] :
				return is_int_string($answer_value) && $answer_value >= 0 && $answer_value <= 100;

			case QUESTION_TYPE['PHRASE'] :
				return strlen($answer_value) <= 100;

			case QUESTION_TYPE['TEXT'] :
				return strlen($answer_value) <= 1000;

			case QUESTION_TYPE['SECONDS'] :
				return is_int_string($answer_value) && $answer_value >= 0 && $answer_value <= 60 * 60 * 24;
		}

		$this->_exit(500);
	}
}
