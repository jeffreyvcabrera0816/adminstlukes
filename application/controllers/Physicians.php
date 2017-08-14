<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Physicians extends CI_Controller {

	public function index() {
		$this->physicians_list();
	}

	public function physicians_list() {
		$tab['tab'] = 2;
		
		$result = $this->physicians_model->getPhysicians();

		$data['data'] = array();

		if ($result['success']) {
			$data['data'] = $result['data'];
		} 

		$this->load->view('header', $tab);
		$this->load->view('physicians_list', $data);
		$this->load->view('footer');
	}

	public function physicians_add() {

		$this->load->view('header');
		$this->load->view('physicians_add');
		$this->load->view('footer');
	}

	public function add_execute() {
		
		$firstname = trim($this->input->post('firstname'));
		$middlename = trim($this->input->post('middlename'));
		$lastname = trim($this->input->post('lastname'));
		$email = trim($this->input->post('email'));
		$mac = trim($this->input->post('mac_address'));
		$gender = trim($this->input->post('gender'));
		$mobile = trim($this->input->post('mobile'));
		$role = trim($this->input->post('role'));

		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('mac_address', 'Mac Address', 'required');
		$this->form_validation->set_rules('role', 'role', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');

		if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('response', '0');
			$this->session->set_flashdata('message', validation_errors());
			redirect('physicians/physicians_add');
        	return;
        }
 
		$result = $this->physicians_model->addExecute ($firstname, $middlename, $lastname, $mobile, $gender, $role, $mac, $email);
		
		if ($result['success']) {
			$this->session->set_flashdata('response', '1');
			$this->session->set_flashdata('message', 'Success');
			redirect('physicians/physicians_list');
			return;
		}

		$this->session->set_flashdata('response', '0');
			$this->session->set_flashdata('message', "An error occured. Please try again.");
			redirect('physicians/physicians_add');

	}

	public function physicians_edit($id) {

		$data['data'] = $this->physicians_model->details($id);
		$this->load->view('header');
		$this->load->view('physicians_edit', $data);
		$this->load->view('footer');
	}

	public function edit_execute() {
		
		$id = trim($this->input->post('id')); 
		$firstname = trim($this->input->post('firstname'));
		$middlename = trim($this->input->post('middlename'));
		$lastname = trim($this->input->post('lastname'));
		$email = trim($this->input->post('email'));
		$mac = trim($this->input->post('mac_address'));
		$gender = trim($this->input->post('gender'));
		$mobile = trim($this->input->post('mobile'));
		$role = trim($this->input->post('role'));

		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('mac_address', 'Mac Address', 'required');
		$this->form_validation->set_rules('role', 'role', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');

		if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('response', '0');
			$this->session->set_flashdata('message', validation_errors());
			redirect('physicians/physicians_edit/'.$id);
        	return;
        }
 
		$result = $this->physicians_model->edit($id, $firstname, $middlename, $lastname, $mobile, $gender, $role, $mac, $email);
		
		if ($result) {
			$this->session->set_flashdata('response', '1');
			$this->session->set_flashdata('message', 'Success');
			redirect('physicians/physicians_list');
			return;
		}

		$this->session->set_flashdata('response', '0');
			$this->session->set_flashdata('message', "An error occured. Please try again.");
			redirect('physicians/physicians_edit/'.$id);

	}

	public function change_duty() {
		$id = trim($this->input->post('id'));
		$value = trim($this->input->post('value'));

		$result = $this->physicians_model->changeDuty($value, $id);

		if ($result['success']) {
			echo json_encode(array('success'=>$result['success'], 'msg'=>$result['msg'], 'id'=>$id));	
		} else {
			echo json_encode(array('success'=>$result['success'], 'msg'=>$result['error'], 'id'=>$id));	
		} 

	}

	public function delete($id) {

		$result = $this->physicians_model->delete($id);

		if ($result['success']) {
			$this->session->set_flashdata('response', '1');
			$this->session->set_flashdata('message', 'Success');
			redirect('physicians/physicians_list');
			return;
		}

		$this->session->set_flashdata('response', '0');
		$this->session->set_flashdata('message', "An error occured. Please try again.");
		redirect('physicians/physicians_list');
	}

}
