<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
		parent::__construct(false);
		$this->load->model('team_model');
	}

	/**
	 * @api {get} /user Request User Information
	 * @apiName UserGet
	 * @apiGroup User
	 * @apiVersion 1.0.0
	 * 
	 * @apiDescription The only users that are accessible are the ones in the same teams as the current user
	 * 
	 * @apiParam {Number} [id] User id.
	 * @apiParam {Number} [team_id] Id of the Team.
	 * @apiParam {String} [search] Search string.
	 *
	 * @apiSuccess {Object[]} users List of Users.
	 * @apiSuccess {Number} users.id Id of the User.
	 * @apiSuccess {String} users.name Name of the User.
	 * @apiSuccess {String} users.email Email of the User.
	 * @apiSuccess {Boolean} users.verified_email Whether the User has verified it's email address.
	 * @apiSuccess {Boolean} users.enabled Whether the User is enabled for submiting evaluations.
	 * @apiSuccess {DateTime} users.created_at Creation date of the User.
	 * @apiSuccess {Object[]} users.teams List of Teams that the user is in.
	 * @apiSuccess {Number} users.teams.id Id of the Team.
	 * @apiSuccess {String} users.teams.name Name of the Team.
	 * @apiSuccess {Number} users.teams.number Number of the Team.
	 * 
	 * @apiUse ErrorPostValidation
	 */
	public function get() : void {
		$this->_require_token();
		if (!$this->_get_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		if ($this->data) {
			$search = get_array_values($this->data, ['id', 'team_id', 'search']);
		} else {
			$search = ['id' => null, 'team_id' => null, 'search' => null];
		}

		$user_id = $this->token_model->get_user_id($this->token);
		
		$users = $this->user_model->search($user_id, $search['id'], $search['team_id'], $search['search']);
		$users = array_map(function($user) {
			return $this->_prepare_user($user);
		}, $users);
		
		echo json_encode(['result' => $users]);
	}

	private function _get_validate() : bool {
		$this->form_validation->set_data($this->data);
		$this->form_validation->set_rules('id', 'Id', 'strip_tags|trim|integer');
		$this->form_validation->set_rules('team_id', 'Team id', 'strip_tags|trim|integer');
		$this->form_validation->set_rules('search', 'Search', 'strip_tags|trim');
		return $this->form_validation->run();
	}

	private function _prepare_user(array $user) {
		$user = get_array_values($user, ['id', 'name', 'email', 'verified_email', 'enabled', 'created_at']);
		$teams = $this->team_model->get_user_teams($user['id']);
		$user['teams'] = $this->_prepare_teams($teams);
		return $user;
	}

	private function _prepare_teams(array $teams) {
		return array_map(function($team) {
			return get_array_values($team, ['id', 'name', 'number']);
		}, $teams);
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
	 * @apiParam {String} re_password Same password again.
	 * 
	 * @apiUse ErrorPostValidation
	 * @apiError (500) {Object} USER_POST_FAIL The usar couldn't be created on the database. Probably, the email is already registered.
	 */
	public function post() : void {
		if (!$this->_post_validate()) {
			$this->_output_validation_errors();
			$this->_exit(400);
		}

		$user = get_array_values($this->data, ['name', 'email', 'password']);
		$user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
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
		$this->form_validation->set_rules('re_password', 'Repeat password', 'required|matches[password]');
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
	 * @apiParam {String} [re_password] Same password again (only if changed the password).
	 * @apiParam {String} password User password confirmation.
	 */
	public function put() : void {
		$this->_require_token();
	}

	/**
	 * @api {delete} /user Deletes the current User
	 * @apiName UserDelete
	 * @apiGroup User
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {String} password User password.
	 */
	public function delete() : void {
		$this->_require_token();
	}
}
