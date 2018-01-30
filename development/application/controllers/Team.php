<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends MY_Controller {

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
	public function get(){ }
}
