<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends MY_Controller {
	
	/**
	 * @api {get} /question/:id Request Question information
	 * @apiName QuestionGet
	 * @apiGroup Question
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} id Question id.
	 *
	 * @apiSuccess {Number} id Id of the Team.
	 * @apiSuccess {Number} period_id Id of the Period of the Questions.
	 * @apiSuccess {String} description Description of the Question.
	 * @apiSuccess {Number} question_type_id Id of the Type of the Question.
	 * @apiSuccess {DateTime} created_at Creation date of the Question.
	 */
	public function get(int $id){ }

	/**
	 * @api {get} /question/list Request Questions List
	 * @apiName QuestionGetList
	 * @apiGroup Question
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} [period_id] Id of the Period of the Questions.
	 * @apiParam {Number} [question_type_id] Id of the Type of the Question.
	 * @apiParam {String} [search] Search string.
	 *
	 * @apiSuccess {Object[]} questions List of Questions
	 * @apiSuccess {Number} questions.id Id of the Team.
	 * @apiSuccess {Number} questions.period_id Id of the Period of the Questions.
	 * @apiSuccess {String} questions.description Description of the Question.
	 * @apiSuccess {Number} questions.question_type_id Id of the Type of the Question.
	 * @apiSuccess {DateTime} questions.created_at Creation date of the Question.
	 */
	public function list(){ }
}
