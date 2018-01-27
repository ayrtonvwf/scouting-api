<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	/**
	 * @api {get} /user/:id Request User Information
	 * @apiName GetUser
	 * @apiGroup User
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Number} [id] User id (if not specified, the current user will be used).
	 *
	 * @apiSuccess {Number} id Id of the User.
	 * @apiSuccess {String} name Name of the User.
	 * @apiSuccess {String} email Email of the User.
	 * @apiSuccess {Boolean} verified_email Whether the User has verified it's email address.
	 * @apiSuccess {Boolean} enabled Whether the User is enabled for submiting evaluations.
	 * @apiSuccess {DateTime} created_at Creation date of the User.
	 */
	public function get(?int $id = null){ }
}
