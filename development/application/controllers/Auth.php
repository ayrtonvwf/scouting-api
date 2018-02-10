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
	 * @apiSuccess {String} user_id Id of the user which the token is attached on.
	 * 
	 * @apiUse ErrorPostValidation
	 * @apiError (404) {Object} AUTH_POST_INVALID_EMAIL The provided email was not found.
	 * @apiError (401) {Object} AUTH_POST_INVALID_PASSWORD The password is wrong.
	 * @apiError (401) {Object} AUTH_POST_DISABLED_USER The user is disabled. Contact suport to fix that.
	 */
	public function post() {
		if (!$this->_post_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		if (!$user = $this->user_model->get_by_email($this->data['email'])) {
			echo json_encode(['error_code' => 'AUTH_POST_INVALID_EMAIL']);
			$this->_exit(404);
		}
		
		if (!$this->user_model->password_matches($this->data['password'], $user->password)) {
			echo json_encode(['error_code' => 'AUTH_POST_INVALID_PASSWORD']);
			$this->_exit(401);
		}
		
		$this->user_model->password_rehash($user->id, $this->data['password'], $user->password);
		
		if (!$user->enabled) {
			echo json_encode(['error_code' => 'AUTH_POST_DISABLED_USER']);
			$this->_exit(401);
		}

		$token = $this->token_model->new_token($user->id);

		echo json_encode(['user_id' => $user->id, 'token' => $token]);
	}
	
	private function _post_validate() {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('email', 'Email', 'strip_tags|trim|required|valid_email|max_length[200]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[50]|min_length[6]');
		return $this->form_validation->run();
	}

	/**
	 * @api {get} /auth/renew Retrieves a new token and invalidates the current one
	 * @apiName AuthRenew
	 * @apiGroup Auth
	 * @apiVersion 1.0.0
	 *
	 * @apiSuccess {String} token A new token valid for 12 hours.
	 */
	public function renew() {
		$this->_require_token();
		$user_id = $this->token_model->get_user_id($this->token);
		$this->token_model->delete($this->token);
		$token = $this->token_model->new_token($user_id);
		echo json_encode(['token' => $token]);
	}
	
	/**
	 * @api {delete} /auth Deletes the current Token
	 * @apiName AuthDelete
	 * @apiGroup Auth
	 * @apiVersion 1.0.0
	 */
	public function delete() {
		$this->_require_token();
		$this->token_model->delete($this->token);
		$this->_exit(204);
	}
}
