<?php

/**
 * @apiDefine ErrorPostValidation
 * @apiError (400) {Object} INVALID_POST_DATA There's something wrong with the posted data.
 */

 defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $data;
    protected $token;

    public function __construct($token_needed = TRUE) {
        parent::__construct();
        
        $this->load->helper('help_helper');
        $this->load->model(['token_model', 'user_model']);
        $this->load->library(['form_validation', 'encryption']);

        $this->output->set_content_type('application/json', 'utf-8');

        if ($this->input->get_request_header('Accept') !== 'application/json') {
            echo json_encode(['error_code' => 'UNNACEPTABLE']);
            $this->_exit(406);
        }

        if ($token_needed) {
            $this->_require_token();
        }

        $data = json_decode($this->input->raw_input_stream, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['error_code' => 'UNPARSABLE_JSON']);
            $this->_exit(400);
        }

        $this->data = $data;
    }

    protected function _exit(int $status_code = 200) : void {
        $this->output->set_status_header($status_code);
        $this->output->_display();
        exit();
    }

    protected function _has_valid_token() : bool {
        $this->token = $this->input->get_request_header('Token');
        if (!$this->token) {
            return false;
        }
        return $this->token_model->is_valid_token($this->token);
    }

    protected function _require_token() : void {
        if (!$this->_has_valid_token()) {
            echo json_encode(['error_code' => 'INVALID_TOKEN']);
            $this->_exit(401);
        }
    }

    protected function _output_validation_errors() : void {
        $output = array('error_code' => 'INVALID_POST_DATA', 'error_messages' => $this->form_validation->error_array());
        echo json_encode($output);
    }
}
?>