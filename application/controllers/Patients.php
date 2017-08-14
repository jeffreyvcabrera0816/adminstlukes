<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {

	public function index() {
		$this->patients_list();
	}

	public function patients_list() {
		$tab['tab'] = 2;
		
		$result = $this->patients_model->getInfoList();

		$data['status'] = array('Admission', 'Referral', 'Surgical', 'In-Patient', 'Discharge', 'Emergency', 'Mortalities', 'Sign Out', 'Fall', 'Medication Error', 'Morbidities', 'Sentinel Events');
		$data['data'] = array();

		if ($result['success']) {
			$data['data'] = $result['data'];
		} 

		$this->load->view('header', $tab);
		$this->load->view('patients_list', $data);
		$this->load->view('footer');
	}

	public function patients_add() {

		$this->load->view('header');
		$this->load->view('patients_add');
		$this->load->view('footer');
	}

	public function add_execute() {
		
		$firstname = trim($this->input->post('firstname'));
		$middlename = trim($this->input->post('middlename'));
		$lastname = trim($this->input->post('lastname'));
		$age = trim($this->input->post('age'));
		$gender = trim($this->input->post('gender'));
		$room = trim($this->input->post('room'));

		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('age', 'Age', 'required');
		$this->form_validation->set_rules('room', 'Room', 'required');

		if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('response', '0');
			$this->session->set_flashdata('message', validation_errors());
			redirect('patients/patients_add');
        	return;
        }
 
		$result = $this->patients_model->addExecute ($firstname, $middlename, $lastname, $age, $gender, $room);
		
		if ($result['success']) {
			$this->session->set_flashdata('response', '1');
			$this->session->set_flashdata('message', 'Success');
			redirect('patients/patients_list');
			return;
		}

		$this->session->set_flashdata('response', '0');
			$this->session->set_flashdata('message', "An error occured. Please try again.");
			redirect('patients/patients_add');

	}

	public function get_details($id = "") {

		$result = $this->patients_model->getDetails($id);
		$notes = $this->patients_model->getNotes($id);
		$procedures = $this->patients_model->getSurgicalProcedures($id);
		$diagnosis = $this->patients_model->getDiagnosis($id);
		$actions = $this->patients_model->getActions($id);
		$physicians = $this->patients_model->getPhysicians($id);
		$physicians_list = $this->physicians_model->getPhysicians();

		// var_dump($result);
		// return;

		$data['status'] = array('Admission', 'Referral', 'Surgical', 'In-Patient', 'Discharge', 'Emergency', 'Mortalities', 'Sign Out', 'Fall', 'Medication Error', 'Morbidities', 'Sentinel Events');
		$data['details'] = array();
		// var_dump($result);
		// return;
		$data['notes'] = array();
		$data['procedures'] = array();
		$data['diagnosis'] = array();
		$data['actions'] = array();
		$data['physicians'] = array();
		$data['physicians_list'] = array();

		if ($result) {
			$data['details'] = $result;
		} 

		if ($notes) {
			$data['notes'] = $notes;
		} 

		if ($procedures) {
			$data['procedures'] = $procedures;
		} 

		if ($diagnosis) {
			$data['diagnosis'] = $diagnosis;
		} 

		if ($actions) {
			$data['actions'] = $actions;
		} 

		if ($physicians) {
			$data['physicians'] = $physicians;
		} 

		if ($physicians_list['success']) {
			$data['physicians_list'] = $physicians_list['data'];
		} 

		$this->load->view('header');
		$this->load->view('patients_details', $data);
		$this->load->view('footer');
	}

	public function change_status() {
		$id = trim($this->input->post('id'));
		$status = trim($this->input->post('status'));

		$result = $this->patients_model->changeStatusAjax($status, $id);

		if ($result['success']) {
			echo json_encode(array('success'=>$result['success'], 'msg'=>$result['msg'], 'id'=>$id));	
		} else {
			echo json_encode(array('success'=>$result['success'], 'msg'=>$result['error'], 'id'=>$id));	
		} 

	}

	public function add_patient_physicians() {
		$patient_id = trim($this->input->post('id'));
		$physician_id = trim($this->input->post('phid'));
		$engage = trim($this->input->post('engage'));

		$result = $this->patients_model->addPatientPhysician($patient_id, $physician_id, $engage);

		if ($result['success']) {
			echo json_encode(array('success'=>$result['success'], 'msg'=>$result['msg'], 'id'=>$patient_id));	
		} else {
			echo json_encode(array('success'=>$result['success'], 'msg'=>$result['error'], 'id'=>$patient_id));	
		} 

	}

	public function deleteph($id, $ppid) {

		$result = $this->patients_model->deleteph($ppid);

		if ($result['success']) {
			$this->session->set_flashdata('response', '1');
			$this->session->set_flashdata('message', 'Success');
			redirect('patients/get_details/'.$id);
			return;
		}

		$this->session->set_flashdata('response', '0');
		$this->session->set_flashdata('message', "An error occured. Please try again.");
		redirect('patients/get_details/'.$id);

	}

}
