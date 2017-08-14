<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api_users extends MY_Controller {

	public function login_post($email = null, $md5_password = null, $mac = null) {
		$this->service_name = 'login';
		extract($this->require_params(get_defined_vars()));

		if ( $email != 'admin' && !valid_email($email) ) {
			$this->response(array('service' => $this->service_name, 'success' => false, 'error' => 'Invalid Email / Password / Mac Address'), 200);
		} else if ( !$this->valid_md5_password($md5_password) ) {
			$this->response(array('service' => $this->service_name, 'success' => false, 'error' => 'Invalid Email / Password / Mac Address'), 200);
		} else {
			$query = $this->users_model->login($email, $md5_password, $mac);
			$this->response(array_merge(array('service' => $this->service_name), $query), 200);
		}
	}

}