<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index() {
		$this->login();
	}

	public function login() {
		$this->load->view('header_login');
		$this->load->view('login_page.php');
		$this->load->view('footer');
	}


}
