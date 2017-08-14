<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Physicians_model extends CI_Model 
{
    var $response = array();
    
    function __construct()
    {
        parent::__construct();
    }


    // ADMIN PORTAL
    function getPhysicians() {
    	$sql = "SELECT * FROM physicians WHERE active = ?";
 
        $query = $this->db->query($sql, array(1));

        if ($query->num_rows() > 0) {
        
            return array( 'success' => true, 'data' => $query->result_array());
        
        }

        return array( 'success' => false, 'error' => 'No data found' );
    }

    function getPhysiciansDuty ($duty) {
        $sql = "SELECT * FROM physicians WHERE on_duty = ? AND active = ?";
 
        $query = $this->db->query($sql, array($duty, 1));

        if ($query->num_rows() > 0) {
        
            return array( 'success' => true, 'data' => $query->result_array());
        
        }

        return array( 'success' => false, 'error' => 'No data found' );
    }

    function addExecute ($firstname, $middlename, $lastname, $mobile, $gender, $role, $mac, $email) {
        $md5_pass = md5('password');
        $sql = "INSERT INTO `physicians`(`firstname`, `middlename`, `lastname`, `mobile`, `gender`, `role`, `date_added`, mac_address, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $this->db->query($sql, array($firstname, $middlename, $lastname, $mobile, $gender, $role, date('Y-m-d H:i:s'), $mac, $email, $md5_pass));

        if ($this->db->affected_rows() > 0) {

            return array( 'success' => true, 'msg' => 'Success');

        }

        return array( 'success' => false, 'error' => 'Error' );

    }

    function details($id) {
        $sql = "SELECT * FROM `physicians` WHERE id = ? AND active = ?";

        $query = $this->db->query($sql, array($id, 1));

        if ($query->num_rows() > 0) {

          return $query->result_array()[0];

        } else {

          return false;

        }                    
    }

    function edit($id, $firstname, $middlename, $lastname, $mobile, $gender, $role, $mac, $email) {

        $sql = "UPDATE `physicians` SET `firstname`=?,`middlename`=?,`lastname`=?,`gender`=?,`email`=?,`mac_address`=?,`mobile`=?,`role`=? WHERE `id`=?";

        $this->db->query($sql, array($firstname, $middlename, $lastname, $gender, $email, $mac, $mobile, $role, $id));

        if ($this->db->affected_rows() > 0) {

            return true;

        }

        return false;

    }

    function changeDuty($duty, $id) {
        $sql = "UPDATE physicians SET on_duty= ? WHERE id = ?";

        $this->db->query($sql, array($duty, $id));

        if ($this->db->affected_rows() > 0) {
            return array('success' => true, 'msg' => 'Duty Changed');
        }

        return array('success' => false, 'error' => 'Error');
    }
    

    function delete($id) {
        $sql = "UPDATE physicians SET active= ? WHERE id = ?";

        $this->db->query($sql, array(0, $id));

        if ($this->db->affected_rows() > 0) {
            return array('success' => true, 'msg' => 'Success');
        }

        return array('success' => false, 'error' => 'Error');
    }

}