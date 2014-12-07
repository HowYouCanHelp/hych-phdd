<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index() {
		//launch page? (sign-up emails)
		echo "Hello world!";
	}
	
	public function login() {
		print_r($_POST);
	}
	
	public function payment_options() {
		$this->load->view('payment_options');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */