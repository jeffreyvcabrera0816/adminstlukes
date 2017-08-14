<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index() {
		$this->dashboard_page();
	}

	public function dashboard_page() {
		
		$result = $this->dashboard_model->getStatusCount();
		$announcements = $this->announcements_model->getAnnouncements();
		$onduty = $this->physicians_model->getPhysiciansDuty(1);
		$incomingduty = $this->physicians_model->getPhysiciansDuty(2);
		$data['classes'] = array('active', '', 'success', '', 'info', '', 'warning', '', 'danger', '', 'active', '');
		$data['status'] = array('Admission/s', 'Referral/s', 'Surgical/s', 'In-Patient/s' ,'Discharge/s', 'Emergency', 'Mortalities', 'Sign Out', 'Fall/s', 'Medication Error/s', 'Morbidities', 'Sentinel Events');
		$data['data'] = array();
		$data['announcements'] = array();
		$data['onduty'] = array();
		$data['incomingduty'] = array();

		if ($announcements['success']) {
			$data['announcements'] = $announcements['data'];
		} 

		if ($result['success']) {
			$data['data'] = $result['data'];
		}

		if ($onduty['success']) {
			$data['onduty'] = $onduty['data'];
		}

		if ($incomingduty['success']) {
			$data['incomingduty'] = $incomingduty['data'];
		}

		$this->load->view('header');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}

	public function printData() {
		$onduty = $this->physicians_model->getPhysiciansDuty(1);
		$incomingduty = $this->physicians_model->getPhysiciansDuty(2);
		$count = $this->dashboard_model->getStatusCount();
		$result = $this->patients_model->getInfoList();
		$data['data'] = array();
		$data['count'] = array();
		$data['onduty'] = array();
		$data['incomingduty'] = array();

		if ($onduty['success']) {
			$data['onduty'] = $onduty['data'];
		}

		if ($incomingduty['success']) {
			$data['incomingduty'] = $incomingduty['data'];
		}

		if ($result['success']) {
			$data['data'] = $result['data'];
		}

		if ($count['success']) {
			$data['count'] = $count['data'];
		}

		$this->load->view('print_data', $data);
	}



}
