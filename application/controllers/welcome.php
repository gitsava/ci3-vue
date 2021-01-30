<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','file');
        $this->_init();
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	private function _init()
    {
        $this->output->set_template('default');

        $this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */