<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    protected $data;

    public function __construct($token_needed = TRUE) {
        parent::__construct();
        
        $this->load->helper('help_helper');
        $this->load->model(array('token_model', 'user_model'));
        $this->load->library('form_validation');

        $this->output->set_content_type('application/json', 'utf-8');

        if ($this->input->get_request_header('Accept') !== 'application/json') {
            $this->_exit(406);
        }

        if ($token_needed) {
            $this->_require_token();
        }

        $data = json_decode($this->input->raw_input_stream, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
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
        $token = $this->input->server('Token');
        if (!$token) {
            return false;
        }
        return $this->token_model->is_valid_token($token);
    }

    protected function _require_token() : void {
        if (!$this->_has_valid_token()) {
            $this->_exit(401);
        }
    }

    protected function _output_validation_errors() : void {
        $output = array('errors' => $this->form_validation->error_array());
        echo json_encode($output);
    }
}
?>