<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
		parent::__construct(false);
	}

	/**
	 * @api {get} /user Request User Information
	 * @apiName UserGet
	 * @apiGroup User
	 * @apiVersion 1.0.0
	 * 
	 * @apiSuccess {Number} id Id of the User.
	 * @apiSuccess {String} name Name of the User.
	 * @apiSuccess {String} email Email of the User.
	 * @apiSuccess {Boolean} verified_email Whether the User has verified it's email address.
	 * @apiSuccess {DateTime} created_at Creation date of the User.
	 * 
	 * @apiUse ErrorPostValidation
	 */
	public function get() : void {
		$this->_require_token();

		$user_id = $this->token_model->get_user_id($this->token);
		
		$output_fields = ['id', 'name', 'email', 'verified_email', 'created_at'];

		$user = $this->user_model->get_by_id($user_id);
		$user = get_array_values($user, $output_fields);
		
		echo json_encode(['result' => $user]);
	}

	/**
	 * @api {post} /user Creates a new User
	 * @apiName UserPost
	 * @apiGroup User
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {String} name New User name.
	 * @apiParam {String} email New User email address.
	 * @apiParam {String} password New User password.
	 * 
	 * @apiUse ErrorPostValidation
	 * @apiError (500) {Object} USER_POST_FAIL The user couldn't be created on the database. Probably, the email is already registered.
	 */
	public function post() : void {
		if (!$this->_post_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		$user = get_array_values($this->data, ['name', 'email', 'password']);
		if (!$user_id = $this->user_model->save($user)) {
			echo json_encode(['error_code' => 'USER_POST_FAIL']);
			$this->_exit(500);
		}

		$this->_exit(204);
	}

	private function _post_validate() : bool {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('name', 'Name', 'strip_tags|trim|required|max_length[60]');
		$this->form_validation->set_rules('email', 'Email', 'strip_tags|trim|required|valid_email|max_length[200]|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[50]|min_length[6]');
		return $this->form_validation->run();
	}

	/**
	 * @api {put} /user Updates the current User
	 * @apiName UserPut
	 * @apiGroup User
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {String} [name] New User name.
	 * @apiParam {String} [email] New User email address.
	 * @apiParam {String} [new_password] New User password.
	 * @apiParam {String} password User password confirmation.
	 * 
	 * @apiUse ErrorPostValidation
	 * @apiError (401) {Object} USER_PUT_INVALID_PASSWORD The password is wrong.
	 * @apiError (500) {Object} USER_PUT_FAIL The user couldn't be updated on the database. Probably, the email is already registered.
	 */
	public function put() : void {
		$this->_require_token();
		if (!$this->_put_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		$user = get_array_values($this->data, ['name', 'email']);
		$user['id'] = $this->token_model->get_user_id($this->token);
		$user['password'] = $this->data['new_password'] ?? null;
		$user = array_filter($user);

		if (!$this->user_model->password_check($user['id'], $this->data['password'])) {
			echo json_encode(['error_code' => 'USER_PUT_INVALID_PASSWORD']);
			$this->_exit(401);
		}

		if (!$this->user_model->update($user)) {
			echo json_encode(['error_code' => 'USER_PUT_FAIL']);
			$this->_exit(500);
		}

		$this->_exit(204);
	}

	private function _put_validate() : bool {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('name', 'Name', 'strip_tags|trim|max_length[60]');
		$this->form_validation->set_rules('email', 'Email', 'strip_tags|trim|valid_email|max_length[200]');
		$this->form_validation->set_rules('new_password', 'Password', 'max_length[50]|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[50]|min_length[6]');
		return $this->form_validation->run();
	}

	/**
	 * @api {delete} /user Deletes the current User
	 * @apiName UserDelete
	 * @apiGroup User
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {String} password User password.
	 * 
	 * @apiUse ErrorPostValidation
	 * @apiError (401) {Object} USER_DELETE_INVALID_PASSWORD The password is wrong.
	 * @apiError (500) {Object} USER_DELETE_FAIL The user couldn't be deleted from the database.
	 */
	public function delete() : void {
		$this->_require_token();
		if (!$this->_delete_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}
		
		$user_id = $this->token_model->get_user_id($this->token);
		if (!$this->user_model->password_check($user_id, $this->data['password'])) {
			echo json_encode(['error_code' => 'USER_DELETE_INVALID_PASSWORD']);
			$this->_exit(401);
		}

		if (!$this->user_model->update(['id' => $user_id, 'enabled' => false])) {
			echo json_encode(['error_code' => 'USER_DELETE_FAIL']);
			$this->_exit(500);
		}

		$this->_exit(204);
	}

	private function _delete_validate() : bool {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[50]|min_length[6]');
		return $this->form_validation->run();
	}
}
