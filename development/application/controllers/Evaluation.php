<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation extends MY_Controller {
	
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
	 * @apiSuccess {Number} evaluations.team_id Id of the evaluated Team.
	 * @apiSuccess {Number} evaluations.user_id Id of the User.
	 * @apiSuccess {DateTime} evaluations.created_at Creation date of the Evaluation.
	 * @apiSuccess {Object[]} evaluations.answers List of Answers in the Evaluation.
	 * @apiSuccess {Number} evaluations.answers.id Id of the Answer.
	 * @apiSuccess {Number} evaluations.answers.question_id Id of the Question.
	 * @apiSuccess {String} evaluations.answers.value Value of the Answer.
	 */
	public function get(){ }
	
	/**
	 * @api {put} /evaluation Save or update Evaluation
	 * @apiName EvaluationPut
	 * @apiGroup Evaluation
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} [id] Id of the Evaluation (if update).
	 * @apiParam {Number} team_id Id of the evaluated Team.
	 * @apiParam {Object[]} answers Answers of the Evaluation.
	 * @apiParam {Number} answers.question_id Id of the Question.
	 * @apiParam {Number} answers.value Value of the Answer.
	 */
	public function put(){ }
}
