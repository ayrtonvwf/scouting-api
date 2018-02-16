<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cors extends MY_Controller {

	public function __construct() {
		parent::__construct(false);
	}

	public function options() {
        header('Content-Type: text/plain', true);
	}
}
