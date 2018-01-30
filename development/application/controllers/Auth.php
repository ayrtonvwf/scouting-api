<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct() {
		parent::__construct(false);
	}

	/**
	 * @api {post} /auth Requests a new token for the provided credentials
	 * @apiName AuthPost
	 * @apiGroup Auth
	 * @apiVersion 1.0.0
	 *
	 * @apiParam {String} email User's e-mail.
	 * @apiParam {String} password User's password.
	 *
	 * @apiSuccess {String} token A new token valid for 12 hours.
	 */
	public function post() {}

	/**
	 * @api {get} /auth/renew Retrieves a new token and invalidates the current one
	 * @apiName AuthRenew
	 * @apiGroup Auth
	 * @apiVersion 1.0.0
	 *
	 * @apiSuccess {String} token A new token valid for 12 hours.
	 */
	public function renew() {}
}
