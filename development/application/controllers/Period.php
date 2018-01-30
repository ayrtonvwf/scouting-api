<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Period extends MY_Controller {
	
	/**
	 * @api {get} /period/:id Request Question information
	 * @apiName PeriodGet
	 * @apiGroup Period
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} id Period id.
	 *
	 * @apiSuccess {Number} id Id of the Period.
	 * @apiSuccess {String} name Name of the Period.
	 * @apiSuccess {Number} position Position of the Period.
	 * @apiSuccess {DateTime} created_at Creation date of the Period.
	 */
	public function get(int $id){ }

	/**
	 * @api {get} /period/list Request Periods List
	 * @apiName PeriodGetList
	 * @apiGroup Period
	 * @apiVersion 1.0.0
	 * 
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
	public function list(){ }
}
}
