<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$this->load->view('login_page');
	}

	public function login_process() {
		$username = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));

		if ($username == "" || $password == "") {
			$this->session->set_flashdata('response', '0');
			$this->session->set_flashdata('message', 'Missing fields');
			redirect('login');
			return;
		}

		$result = $this->users_model->adminLogin($username, md5($password));
	
		if ($result['success']) {
			redirect('dashboard');
		}
		
		$this->session->set_flashdata('response', '0');
		$this->session->set_flashdata('message', 'Incorrect Username/Password');
		redirect('login');
	}

	


}
