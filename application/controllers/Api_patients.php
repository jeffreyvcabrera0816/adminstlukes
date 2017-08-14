<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api_patients extends MY_Controller {

	public function list_post($p1 = "", $p2 = "", $p3 = "") {
		$this->service_name = 'list_patients';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->get($p1, $p2, $p3);

		$this->response(array_merge(array('service' => $this->service_name), $result), 200);	
	}

	public function search_post($p1 = "", $p2 = "", $p3 = "") {
		$this->service_name = 'search_patients';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->search($p1, $p2, $p3);

		$this->response(array_merge(array('service' => $this->service_name), $result), 200);	
	}

	public function listaction_post($p1 = "", $p2 = "") {
		$this->service_name = '';
		extract($this->require_params(get_defined_vars()));

		if ($p2 == 1) {
			$this->service_name = 'list_actions';
		}

		if ($p2 == 2) {
			$this->service_name = 'list_diagnosis';
		}

		if ($p2 == 3) {
			$this->service_name = 'list_notes';
		}

		if ($p2 == 4) {
			$this->service_name = 'list_surgical_procedures';
		}

		$result = $this->patients_model->listAction($p1, $p2);

		$this->response(array_merge(array('service' => $this->service_name), $result), 200);	
	}

	public function getphysicians_post($p1 = "") {
		$this->service_name = 'get_physicians';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->get_physicians($p1);
		$this->response(array_merge(array('service' => $this->service_name), $result), 200);
	}

	public function getnotes_post($p1 = "") {
		$this->service_name = 'get_notes';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->get_notes($p1);

		$this->response(array_merge(array('service' => $this->service_name), $result), 200);	
	}

	public function changestatus_post($type, $patient_id, $status) {
		$this->service_name = 'change_patient_status_type';
		extract($this->require_params(get_defined_vars()));
	
		$query = $this->patients_model->changeStatus($patient_id, $type, $status);
		$this->response(array_merge(array('service' => $this->service_name), $query), 200);
		
	}

	public function changestat_post($status, $patient_id) {
		$this->service_name = 'change_patient_status';
		extract($this->require_params(get_defined_vars()));
	
		$query = $this->patients_model->changeStatusAjax($status, $patient_id);
		$this->response(array_merge(array('service' => $this->service_name), $query), 200);
		
	}

	public function dailycensus_post() {
		$this->service_name = 'daily_census';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->dailyCensus();

		$this->response(array_merge(array('service' => $this->service_name), $result), 200);	
	}

	public function actionsneeded_post($p1 = "") {
		$this->service_name = 'actions_needed';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->actionsNeeded($p1);
		$this->response(array_merge(array('service' => $this->service_name), $result), 200);
	}

	public function addaction_post($p1 = "", $p2 = "", $p3 = "") {
		$this->service_name = 'add_action';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->addAction($p1, $p2, $p3);
		$this->response(array_merge(array('service' => $this->service_name), $result), 200);
	}

	public function addnote_post($p1 = "", $p2 = "", $p3 = "") {
		$this->service_name = 'add_note';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->addNote($p1, $p2, $p3);
		$this->response(array_merge(array('service' => $this->service_name), $result), 200);
	}

	public function adddiagnosis_post($p1 = "", $p2 = "", $p3 = "") {
		$this->service_name = 'add_diagnosis';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->addDiagnosis($p1, $p2, $p3);
		$this->response(array_merge(array('service' => $this->service_name), $result), 200);
	}

	public function addprocedure_post($p1 = "", $p2 = "", $p3 = "") {
		$this->service_name = 'add_surgical_procedure';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->addProcedure($p1, $p2, $p3);
		$this->response(array_merge(array('service' => $this->service_name), $result), 200);
	}

	public function addpatient_post($p1 = "", $p2 = "", $p3 = "", $p4 = "", $p5 = "", $p6 = "") {
		$this->service_name = 'add_patient';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->addPatient($p1, $p2, $p3, $p4, $p5, $p6);
		$this->response(array_merge(array('service' => $this->service_name), $result), 200);
	}

	public function editpatient_post($p1 = "", $p2 = "", $p3 = "", $p4 = "", $p5 = "", $p6 = "", $p7 = "") {
		$this->service_name = 'edit_patient';
		extract($this->require_params(get_defined_vars()));

		$result = $this->patients_model->editPatient($p1, $p2, $p3, $p4, $p5, $p6, $p7);
		$this->response(array_merge(array('service' => $this->service_name), $result), 200);
	}

	public function upload_image_post($directory = null) {
		$this->service_name = 'upload_image';
		extract($this->require_params(get_defined_vars()));

		if ( $directory != 'patients') {
			$this->response(array('service' => $this->service_name, 'success' => false, 'error' => 'Invalid Directory'), 200);
		} else {
			$query  = array('success' => false);
			if (isset($_POST['image']) && isset($_POST['filename'])) {
				$base = $_POST['image'];
				$filename = $_POST['filename'];
				$id = $_POST['id'];	
				
				$binary=base64_decode($base);
				header('Content-Type: bitmap; charset=utf-8');

				$file = fopen('assets/img/images/patients/'.$filename, 'wb');
				fwrite($file, $binary);	
				fclose($file);
				if ($file) {
					$query = array('success' => true);
					$this->patients_model->updateImage($id, $filename);	
				} else {
					$query = array('success' => false);
				}	
			} else {
				$query = array('success' => false);
			}

			$this->response(array_merge(array('service' => $this->service_name), $query), 200);
		}
	}

	public function upload_image_add_post($directory = null) {
		$this->service_name = 'upload_image';
		extract($this->require_params(get_defined_vars()));

		if ( $directory != 'patients') {
			$this->response(array('service' => $this->service_name, 'success' => false, 'error' => 'Invalid Directory'), 200);
		} else {
			$query  = array('success' => false);
			if (isset($_POST['image']) && isset($_POST['filename'])) {
				$base = $_POST['image'];
				$filename = $_POST['filename'];
				
				$binary=base64_decode($base);
				header('Content-Type: bitmap; charset=utf-8');

				$file = fopen('assets/img/images/patients/'.$filename, 'wb');
				fwrite($file, $binary);	
				fclose($file);
				if ($file) {
					$query = array('success' => true);
				} else {
					$query = array('success' => false);
				}	
			} else {
				$query = array('success' => false);
			}

			$this->response(array_merge(array('service' => $this->service_name), $query), 200);
		}
	}


}