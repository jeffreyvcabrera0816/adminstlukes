<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends CI_Controller {

	public function index() {
		$this->announcements_list();
	}

	public function announcements_list() {
		$tab['tab'] = 2;
		
		$result = $this->announcements_model->getAnnouncements();

		$data['data'] = array();

		if ($result['success']) {
			$data['data'] = $result['data'];
		} 

		$this->load->view('header', $tab);
		$this->load->view('announcements_list', $data);
		$this->load->view('footer');
	}

	public function announcements_add() {

		$this->load->view('header');
		$this->load->view('announcements_add');
		$this->load->view('footer');
	}

	public function add_execute() {
		
		// $title = trim($this->input->post('title'));
		$content = trim($this->input->post('content'));

		// $this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Announcement', 'required');

		if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('response', '0');
			$this->session->set_flashdata('message', validation_errors());
			redirect('announcements/announcements_add');
        	return;
        }
 		
		$result = $this->announcements_model->addExecute ($title = "", $content);

		if ($result['success']) {
			$this->session->set_flashdata('response', '1');
			$this->session->set_flashdata('message', 'New announcement has been added');
			redirect('announcements/announcements_list');
			return;
		}

		$this->session->set_flashdata('response', '0');
		$this->session->set_flashdata('message', "An error occured. Please try again.");
		redirect('announcements/announcements_add');

	}

	public function announcement_edit($id) {

		$data['data'] = $this->announcements_model->details($id);

		$this->load->view('header');
		$this->load->view('announcement_edit', $data);
		$this->load->view('footer');
	}

	public function edit_execute() {
		
		$id = trim($this->input->post('id'));
		$content = trim($this->input->post('content'));

		$this->form_validation->set_rules('content', 'Announcement', 'required');

		if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('response', '0');
			$this->session->set_flashdata('message', validation_errors());
			redirect('announcements/announcement_edit/'.$id);
        	return;
        }
 		
		$result = $this->announcements_model->edit($id, $content);
		// var_dump($result);
		// return;
		if ($result) {
			$this->session->set_flashdata('response', '1');
			$this->session->set_flashdata('message', 'Updated');
			redirect('announcements/announcements_list');
			return;
		}

		$this->session->set_flashdata('response', '0');
		$this->session->set_flashdata('message', "An error occured. Please try again.");
		redirect('announcements/announcement_edit/'.$id);

	}

	public function delete($id) {

		$result = $this->announcements_model->delete($id);

		if ($result['success']) {
			$this->session->set_flashdata('response', '1');
			$this->session->set_flashdata('message', 'Success');
			redirect('announcements/announcements_list');
			return;
		}

		$this->session->set_flashdata('response', '0');
		$this->session->set_flashdata('message', "An error occured. Please try again.");
		redirect('announcements/announcements_list');
	}
}