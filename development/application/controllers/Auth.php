<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct() {
		parent::__construct(false);
	}

	/**
	 * @api {post} /auth Retrieves a new token for the provided credentials
	 * @apiName PostAuth
	 * @apiGroup Auth
	 *
	 * @apiParam {String} email User's e-mail.
	 * @apiParam {String} password User's password.
	 *
	 * @apiSuccess {String} token A new token valid for 12 hours.
	 */
	public function post(){
		if (empty($this->data->email)) {
			echo json_encode(['error' => 'E-mail is required']);
			$this->_exit(400);
		}

		if (empty($this->data->password)) {
			echo json_encode(['error' => 'Password is required']);
			$this->_exit(400);
		}

		echo json_encode(['token' => 'test_token_123456']);
	}
}
