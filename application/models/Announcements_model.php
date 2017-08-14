<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcements_model extends CI_Model 
{
    var $response = array();
    
    function __construct()
    {
        parent::__construct();
    }

    function getAnnouncements() {
        
        $sql = "SELECT title, date_format(date_added, '%m/%d/%Y %h:%i%p') as date_added, announcement, id, active FROM announcements WHERE active = ?";

        $query = $this->db->query($sql, array(1));

        if ($query->num_rows() > 0) {

            return array( 'success' => true, 'data' => $query->result_array());

        }

        return array( 'success' => false, 'error' => 'No data found' );
    }

    function addExecute ($title, $content) {
        $sql = "INSERT INTO `announcements`(`title`, `announcement`, `date_added`) VALUES (?, ?, ?)";
    
        $this->db->query($sql, array($title, $content, date('Y-m-d H:i:s')));

        if ($this->db->affected_rows() > 0) {

            return array( 'success' => true, 'msg' => 'Success');

        }

        return array( 'success' => false, 'error' => 'Error' );

    }

    function details($id) {
        $sql = "SELECT * FROM `announcements` WHERE id = ? AND active = ?";

        $query = $this->db->query($sql, array($id, 1));

        if ($query->num_rows() > 0) {

          return $query->result_array()[0];

        } else {

          return false;

        }                    
    }

    function edit($id, $announcement) {

        $sql = "UPDATE `announcements` SET `announcement` = ? WHERE id = ?";

        $this->db->query($sql, array($announcement, $id));

        if ($this->db->affected_rows() > 0) {

            return true;

        }

        return false;

    }

    function delete($id) {
    	$sql = "UPDATE announcements SET active= ? WHERE id = ?";

        $this->db->query($sql, array(0, $id));

        if ($this->db->affected_rows() > 0) {
            return array('success' => true, 'msg' => 'Success');
        }

        return array('success' => false, 'error' => 'Error');
    }
}