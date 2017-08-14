<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'libraries/REST_Controller.php';

class MY_Controller extends REST_Controller {
	protected $service_name = NULL;

	function __construct() {
		parent::__construct();
	}

	function require_params($args) {
		foreach ($args as &$value) {
			if ($value === null) {
				$this->response(array('service' => $this->service_name, 'success' => false, 'error' => 'Missing Arguments'), 200);
				break;
			} else {		//auto urldecode every argument
				$value = trim(urldecode($value));
			}
		}
		return $args;
	}

	function valid_login_type($login_type) {
		if ( is_numeric($login_type) ) {
			$login_types = array('1', '2');		// 1 = facebook, 2 = email
			for ($i = 0; $i < count($login_types); $i++) {
				if ($login_types[$i] == $login_type) return true;
			}
			return false;
		}
		return false;
	}

	function valid_md5_password($md5_password_str) {
		if (strlen($md5_password_str) == 32) {
			if (ctype_xdigit($md5_password_str))	return true;
			return false;
		}
		return false;
	}

	function valid_name($name_str) {
		if(preg_match("/^[\p{L}\p{N}.'-]+$/ui", $name_str)) {	//allows any letter in any language, space, period, single quote, dash
			return true;
		}
		return false;
	}

	function valid_date($date_str) {
		if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date_str)) {	//checking date format
			$date = explode("-", $date_str);
			if (checkdate($date[1], $date[2], $date[0]))	return true;	//checking if it's a real date
			else	return false;
		}
		return false;
	}

	function valid_mobile($mobile_str) {
		if (strlen($mobile_str) == 10) {
			if (is_numeric($mobile_str))	return true;
			return false;
		}
		return false;
	}

	function valid_filename($filename_str) {
		if(preg_match("/^[A-Za-z0-9 ._-]+$/ui", $filename_str)) {	//allows alphanumeric, space, period, underscore, dash
			return true;
		}
		return false;
	}

	function valid_user_id($user_id) {
		$existing = $this->users_model->is_existing($user_id);
		if ($existing)
			return true;
		else
			return false;
	}
}