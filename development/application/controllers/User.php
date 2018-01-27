<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	/**
	 * @api {get} /user Request User information
	 * @apiName GetUser
	 * @apiGroup User
	 *
	 * @apiSuccess {String} name Name of the User.
	 * @apiSuccess {String} email Email of the User.
	 * @apiSuccess {Boolean} verified_email Whether the User has verified it's email address.
	 * @apiSuccess {Boolean} enabled Whether the User is enabled for submiting evaluations.
	 * @apiSuccess {DateTime} created_at Creation date of the User.
	 */
	public function get(){ }
}
