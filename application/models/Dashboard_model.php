<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model 
{
    var $response = array();
    
    function __construct()
    {
        parent::__construct();
    }

    function getStatusCount() {
    	
    	$sql = "SELECT DISTINCT status, COUNT(status) as status_count FROM `patients` GROUP BY status";

    	$query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return array( 'success' => true, 'data' => $query->result_array());

        }

        return array( 'success' => false, 'error' => 'No data found' );
    }

}
    