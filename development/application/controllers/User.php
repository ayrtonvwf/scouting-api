<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
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
	 */
	public function get(){ }

	/**
	 * @api {put} /user Updates or creates a User
	 * @apiName UserPut
	 * @apiGroup User
	 * @apiVersion 1.0.0
	 * @apiDescription If there's no token, a new user is created. Else, the current user is updated.
	 * 
	 * @apiParam {String} [name] New User name.
	 * @apiParam {String} [email] New User email address.
	 * @apiParam {String} [password] New User password.
	 * @apiParam {String} old_password Old User password.
	 */
	public function put(){ }

	/**
	 * @api {delete} /user Deletes the current User
	 * @apiName UserDelete
	 * @apiGroup User
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {String} password User password.
	 */
	public function delete(){ }
}
