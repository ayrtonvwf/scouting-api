<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends MY_Controller {

	/**
	 * @api {get} /team/:id Request Team information
	 * @apiName TeamGet
	 * @apiGroup Team
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} id User id.
	 *
	 * @apiSuccess {Number} id Id of the Team.
	 * @apiSuccess {String} name Name of the Team.
	 * @apiSuccess {Number} number Number of the Team.
	 * @apiSuccess {Boolean} enabled Wether the Team is enabled to submit evaluations.
	 * @apiSuccess {DateTime} created_at Creation date of the Team.
	 */
	public function get(int $id){ }

	/**
	 * @api {get} /team/list Request Team List
	 * @apiName TeamGetList
	 * @apiGroup Team
	 * @apiVersion 1.0.0
	 * 
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
	public function list(){ }
}
