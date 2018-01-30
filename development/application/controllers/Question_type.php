<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_type extends MY_Controller {
	
	/**
	 * @api {get} /question_type Request Question Type List
	 * @apiName QuestionTypeGet
	 * @apiGroup QuestionType
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} [id] Id of the Question Type.
	 * @apiParam {String} [search] Search string.
	 * 
	 * @apiSuccess {Object[]} question_types List of Question Types
	 * @apiSuccess {Number} question_types.id Id of the Question Type.
	 * @apiSuccess {String} question_types.name Name of the Question Type.
	 * @apiSuccess {DateTime} question_types.created_at Creation date of the Question Type.
	 */
	public function get(){ }
	
}
