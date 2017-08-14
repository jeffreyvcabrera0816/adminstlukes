<?php
class Users_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function login($email, $md5_password, $mac) {
		$values = array(`id`, `firstname`, `middlename`, `lastname`, `email`, `image`, `mobile`, `role`, `last_login`, `date_added`, `active`);
		$sql = "SELECT * FROM physicians WHERE email=? AND password=? AND mac_address=? AND active = ?";

		$query = $this->db->query($sql, array($email, $md5_password, $mac, 1));

		if ($query->num_rows() == 1)	//should only be 1
			if ($query->row()->active == '1') {
				$this->db->set('last_login', 'NOW()', FALSE);
				$this->db->where('id', $query->row()->id);
				$this->db->update('users');

				//limit returned data
				unset($query->row()->active);
				return array( 'success' => true, 'user_data' => $query->row() );
			} else {
				return array( 'success' => false, 'error' => 'User Account Inactive' );
			}
		else
			return array( 'success' => false, 'error' => 'Invalid Email or Password or Mac Address' );
	}

	//PORTAL

	function adminLogin($email, $md5_password) {
		$values = array(`id`, `firstname`, `lastname`, `email`, `mobile`, `position_type`, `last_login`, `date_registered`, `active`);
		$sql = "SELECT * FROM users WHERE email=? AND password=? AND active=? AND position_type=?";

		$query = $this->db->query($sql, array($email, $md5_password, 1, 1));

		if ($query->num_rows() == 1)	//should only be 1
			if ($query->row()->active == '1') {
				$this->db->set('last_login', 'NOW()', FALSE);
				$this->db->where('id', $query->row()->id);
				$this->db->update('users');

				//limit returned data
				unset($query->row()->active);
				return array( 'success' => true, 'user_data' => $query->row() );
			} else {
				return array( 'success' => false, 'error' => 'User Account Inactive' );
			}
		else
			return array( 'success' => false, 'error' => 'Invalid Email or Password' );
	}

}