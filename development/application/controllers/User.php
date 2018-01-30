<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	/**
	 * @api {get} /user/:id Request User Information
	 * @apiName UserGet
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

	/**
	 * @api {post} /user Creates a new User
	 * @apiName UserPost
	 * @apiGroup User
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {String} name User name.
	 * @apiParam {String} email User email address.
	 * @apiParam {String} password User password.
	 */
	public function post(){ }

	/**
	 * @api {put} /user Updates the current User
	 * @apiName UserPut
	 * @apiGroup User
	 * @apiVersion 1.0.0
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
