<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    private $data;

    public function __construct($token_needed = TRUE) {
        parent::__construct();
        
        $this->output->set_content_type('application/json', 'utf-8');

        if ($this->input->server('Accept') !== 'application/json') {
            $this->_exit(406);
        }

        if ($token_needed && !$token = $this->input->server('Token')) {
            $this->_exit(401);
        }

        $data = json_decode($this->input->raw_input_stream);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->_exit(400);
        }

        $this->data = $data;
    }

    protected function _exit(int $status_code = 200) {
        $this->output->set_status_header($status_code);
        $this->output->_display();
        exit();
    }
}
?>