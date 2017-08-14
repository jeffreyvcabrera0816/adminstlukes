<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patients_model extends CI_Model 
{
    var $response = array();
    
    function __construct()
    {
        parent::__construct();
    }
    

    function get($sort, $role, $id) {

        
        if ($role == 2) {

            $sql = "SELECT 
                    p.id,
                    p.firstname,
                    p.middlename,
                    p.lastname,
                    p.age,
                    p.gender,
                    p.room,
                    p.image,
                    p.date_admitted,
                    p.date_released,
                    p.change_dressing,
                    p.priority,
                    p.post_op,
                    p.trach_care,
                    p.status,
                    (SELECT a.value FROM adref a LEFT JOIN patients_physicians pp ON pp.engage = a.id WHERE pp.engage = 2 LIMIT 1) as sss,
                    -- case ph.engage
                    --     when '0' then ''
                    --     when '1' then '@'
                    --     when '2' then '®'
                    -- end as amount,
                    -- (SELECT COUNT(*) FROM diagnosis LIMIT 1) as sss,
                    -- CONCAT_WS(' ', ph.engage) as engage,
                    -- IF(ph.engage = 1, 'asd', 'dsa') as ss,
                    GROUP_CONCAT(CONCAT_WS(' ', ps.lastname),CONCAT_WS(' ',(SELECT a.value FROM adref a LEFT JOIN patients_physicians pp ON pp.engage = a.id WHERE pp.engage = ph.engage LIMIT 1)) SEPARATOR '/') as physicians,
                    (SELECT content FROM diagnosis WHERE patient_id = p.id LIMIT 1) as diagnosis,
                    (SELECT table_id FROM statuses WHERE status_id = p.status LIMIT 1) as status_table
                    FROM patients p LEFT JOIN patients_physicians ph
                    ON p.id = ph.patient_id
                    LEFT JOIN physicians ps
                    ON ps.id = ph.physician_id WHERE p.active = ?
                    GROUP BY p.id ORDER BY $sort";  

            $query = $this->db->query($sql, array(1));
        
        } else {

            $sql = "SELECT 
                    p.id,
                    p.firstname,
                    p.middlename,
                    p.lastname,
                    p.age,
                    p.gender,
                    p.room,
                    p.image,
                    p.date_admitted,
                    p.date_released,
                    p.change_dressing,
                    p.priority,
                    p.post_op,
                    p.trach_care,
                    p.status,
                    (SELECT GROUP_CONCAT(CONCAT_WS(' ', ps2.lastname)) FROM patients p2 LEFT JOIN patients_physicians ph2 ON p2.id = ph2.patient_id LEFT JOIN physicians ps2 ON ps2.id = ph2.physician_id WHERE p2.active = 1 AND p2.id = p.id) as physicians,
                    (SELECT content FROM diagnosis WHERE patient_id = p.id LIMIT 1) as diagnosis,
                    (SELECT table_id FROM statuses WHERE status_id = p.status LIMIT 1) as status_table
                    FROM patients p LEFT JOIN patients_physicians ph
                    ON p.id = ph.patient_id
                    LEFT JOIN physicians ps
                    ON ps.id = ph.physician_id WHERE ps.id = ? AND p.active = ?
                    GROUP BY p.id ORDER BY $sort";  

            $query = $this->db->query($sql, array($id, 1));
        }
        

        if ($query->num_rows() > 0) {

            return array( 'success' => true, 'data' => $query->result_array());

        }

        return array( 'success' => false, 'error' => 'No data found' );

    }

    function get_physicians($patient_id) {
        $sql = "SELECT p.id, p.firstname, p.middlename, p.lastname, p.gender, p.email, p.mobile, p.role, p.on_duty, p.date_added, p.active FROM physicians p
                LEFT JOIN patients_physicians pp ON p.id = pp.physician_id
                WHERE pp.patient_id = ? AND p.active = ? AND pp.active = ?";
        $query = $this->db->query($sql, array($patient_id, 1, 1));

        if ($query->num_rows() > 0) {

            return array('success' => true, 'data' => $query->result_array());

        }

        return array('success' => false, 'error' => 'No data found');
        
    }

    function get_notes($patient_id) {
        $sql = "SELECT * FROM physicians_notes WHERE patient_id = ? AND active = ?";

        $query = $this->db->query($sql, array($patient_id, 1));

        if ($query->num_rows() > 0) {

            return array( 'success' => true, 'data' => $query->result_array());

        }

        return array( 'success' => false, 'error' => 'No data found' );

        
    }

    function search($string, $role, $id) {

        if ($role == 2) {

            $sql1 = "SELECT 
                    p.id,
                    p.firstname,
                    p.middlename,
                    p.lastname,
                    p.age,
                    p.gender,
                    p.room,
                    p.image,
                    p.date_admitted,
                    p.date_released,
                    p.change_dressing,
                    p.priority,
                    p.post_op,
                    p.trach_care,
                    p.status,
                    GROUP_CONCAT(' ', ps.lastname) as physicians,
                    (SELECT content FROM diagnosis WHERE patient_id = p.id LIMIT 1) as diagnosis,
                    (SELECT table_id FROM statuses WHERE status_id = p.status LIMIT 1) as status_table
                    FROM patients p LEFT JOIN patients_physicians ph
                    ON p.id = ph.patient_id
                    LEFT JOIN physicians ps
                    ON ps.id = ph.physician_id WHERE p.active = ?
                    AND CONCAT_WS(p.firstname,p.lastname,p.room,p.middlename,ps.firstname,ps.lastname) LIKE '%$string%'
                    GROUP BY p.id";

        $query = $this->db->query($sql1, array(1));

        } else {

            $sql1 = "SELECT 
                    p.id,
                    p.firstname,
                    p.middlename,
                    p.lastname,
                    p.age,
                    p.gender,
                    p.room,
                    p.image,
                    p.date_admitted,
                    p.date_released,
                    p.change_dressing,
                    p.priority,
                    p.post_op,
                    p.trach_care,
                    p.status,
                    (SELECT GROUP_CONCAT(CONCAT_WS(' ', ps2.lastname)) FROM patients p2 LEFT JOIN patients_physicians ph2 ON p2.id = ph2.patient_id LEFT JOIN physicians ps2 ON ps2.id = ph2.physician_id WHERE p2.active = 1 AND p2.id = p.id) as physicians,
                    (SELECT content FROM diagnosis WHERE patient_id = p.id LIMIT 1) as diagnosis,
                    (SELECT table_id FROM statuses WHERE status_id = p.status LIMIT 1) as status_table
                    FROM patients p LEFT JOIN patients_physicians ph
                    ON p.id = ph.patient_id
                    LEFT JOIN physicians ps
                    ON ps.id = ph.physician_id WHERE ps.id = ? AND p.active = ?
                    AND CONCAT_WS(p.firstname,p.lastname,p.room,p.middlename,ps.firstname,ps.lastname) LIKE '%$string%'
                    GROUP BY p.id";

        $query = $this->db->query($sql1, array($id, 1));

        }

        if ($query->num_rows() > 0) {

            return array( 'success' => true, 'data' => $query->result_array());

        }

        return array( 'success' => false, 'error' => 'No data found' );

    }

    function changeStatus($id, $type, $status) {

        $sql = "";

        if ($type == 1) {
            $sql = "UPDATE `patients` SET `change_dressing`= ? WHERE id = ?";
        }

        if ($type == 2) {
            $sql = "UPDATE `patients` SET `priority`= ? WHERE id = ?";
        }

        if ($type == 3) {
            $sql = "UPDATE `patients` SET `post_op`= ? WHERE id = ?";
        }

        if ($type == 4) {
            $sql = "UPDATE `patients` SET `trach_care`= ? WHERE id = ?";
        }
        
        $this->db->query($sql, array($status, $id));

        if ($this->db->affected_rows() > 0) {
            return array( 'success' => true, 'message' => 'Status Changed' );
        }
        return array( 'success' => false, 'message' => 'Error' );
    }

    function dailyCensus() {


        $arr = array(); 

        try {
            for ($x = 1; $x <= 12; $x++) {
                // -- $sql = "SELECT COUNT(s.id) as status FROM patients p LEFT JOIN statuses s ON p.status = s.status_id WHERE p.active = 1 AND p.status = $x";
                $sql = "SELECT status, 
                COUNT(id) as status_count, 
                (SELECT COUNT(s.id) as status FROM patients p LEFT JOIN statuses s ON p.status = s.status_id WHERE p.active = 1 AND s.table_id = 100) as inpatient, 
                (SELECT COUNT(s.id) as status FROM patients p LEFT JOIN statuses s ON p.status = s.status_id WHERE p.active = 1 AND s.table_id = 200) as discharged,
                (SELECT COUNT(s.id) as status FROM patients p LEFT JOIN statuses s ON p.status = s.status_id WHERE p.active = 1 AND s.table_id = 300) as mortality,
                (SELECT COUNT(s.id) as status FROM patients p LEFT JOIN statuses s ON p.status = s.status_id WHERE p.active = 1 AND s.table_id = 400) as signout
                FROM patients WHERE active = 1 AND status = $x";
                $query = $this->db->query($sql);
                $arr[] = $query->result_array()[0];

            }
        } catch (Exception $e) {
            $arr[] = 'An Error Occured';
        }

        
        try {
            $sql2 = "SELECT lastname, gender FROM physicians WHERE active = 1 AND on_duty = 1";
            $query2 = $this->db->query($sql2);
            $physicians = $query2->result_array();
        } catch (Exception $e) {
            $physicians = array('error' => 'An Error Occured');
        }

        try {
            $sql4 = "SELECT lastname, gender FROM physicians WHERE active = 1 AND on_duty = 2";
            $query4 = $this->db->query($sql4);
            $incomingphysicians = $query4->result_array();
        } catch (Exception $e) {
            $incomingphysicians = array('error' => 'An Error Occured');
        }
        
        try {
            $sql3 = "SELECT * FROM announcements WHERE active = 1";
            $query3 = $this->db->query($sql3);
            $announcements = $query3->result_array();
        } catch (Exception $e) {
            $announcements = array('error' => 'An Error Occured');
        }
        
        return array( 'success' => true, 'statuses' => $arr, 'on_duty' => $physicians, 'incoming_duty' => $incomingphysicians, 'announcements' => $announcements);
    

    }

    function actionsNeeded($patient_id) {
        $sql1 = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN actions_needed an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id desc";

        $sql2 = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN diagnosis an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id  desc";

        $sql3 = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN notes an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id  desc";

        $sql4 = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN surgical_procedures an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id  desc";

        $sql5 = "SELECT p.firstname, p.lastname FROM physicians p
                    LEFT JOIN patients_physicians an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ?";

        $actions_needed = $this->db->query($sql1, array($patient_id, 1));
        $diagnosis = $this->db->query($sql2, array($patient_id, 1));
        $notes = $this->db->query($sql3, array($patient_id, 1));
        $surgical_procedures = $this->db->query($sql4, array($patient_id, 1));
        $physicians = $this->db->query($sql5, array($patient_id, 1));

        return array( 'success' => true, 'actions_needed' => $actions_needed->result_array(), 'diagnosis' => $diagnosis->result_array(), 'notes' => $notes->result_array(), 'surgical_procedures' => $surgical_procedures->result_array(), 'physicians' => $physicians->result_array() );
           
    }

    function addAction($content, $patient_id, $physician_id) {

        $sql = "INSERT INTO `actions_needed`(`content`, `patient_id`, `physician_id`, `date_created`) VALUES (?, ?, ?, ?)";

        $this->db->query($sql, array($content, $patient_id, $physician_id, date('Y-m-d H:i:s')));

        if ($this->db->affected_rows() > 0) {

            return array( 'success' => true, 'msg' => 'Success');

        } else {

            return array( 'success' => false, 'error' => 'No data found' );

        }

    }

    function addNote($content, $patient_id, $physician_id) {

        $sql = "INSERT INTO `notes`(`content`, `patient_id`, `physician_id`, `date_created`) VALUES (?, ?, ?, ?)";

        $this->db->query($sql, array($content, $patient_id, $physician_id, date('Y-m-d H:i:s')));

        if ($this->db->affected_rows() > 0) {

            return array( 'success' => true, 'msg' => 'Success');

        } else {

            return array( 'success' => false, 'error' => 'No data found' );

        }
    }

    function addDiagnosis($content, $patient_id, $physician_id) {

        $sql = "INSERT INTO `diagnosis`(`content`, `patient_id`, `physician_id`, `date_created`) VALUES (?, ?, ?, ?)";

        $this->db->query($sql, array($content, $patient_id, $physician_id, date('Y-m-d H:i:s')));

        if ($this->db->affected_rows() > 0) {

            return array( 'success' => true, 'msg' => 'Success');

        } else {

            return array( 'success' => false, 'error' => 'No data found' );

        }

    }

    function addProcedure($content, $patient_id, $physician_id) {

        $sql = "INSERT INTO `surgical_procedures`(`content`, `patient_id`, `physician_id`, `date_created`) VALUES (?, ?, ?, ?)";

        $this->db->query($sql, array($content, $patient_id, $physician_id, date('Y-m-d H:i:s')));

        if ($this->db->affected_rows() > 0) {

            return array( 'success' => true, 'msg' => 'Success');

        } else {

            return array( 'success' => false, 'error' => 'No data found' );

        }

    }

    function listAction($patient_id, $action) {

        $sql = "";

        if ($action == 1) {
            $sql = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN actions_needed an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id desc";
        } else if ($action == 2) {
            $sql = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN diagnosis an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id  desc";
        } else if ($action == 3) {
            $sql = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN notes an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id  desc";
        } else if ($action == 4) {
            $sql = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN surgical_procedures an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id  desc";
        }

        $list = $this->db->query($sql, array($patient_id, 1));

        return array( 'success' => true, 'data' => $list->result_array());
           
    }

    function addPatient($firstname, $middlename, $lastname, $room, $age, $gender) {

        $sql = "INSERT INTO `patients`(`firstname`, `middlename`, `lastname`, `room`, `age`, `date_admitted`, `gender`) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $this->db->query($sql, array($firstname, $middlename, $lastname, $room, $age, date('Y-m-d H:i:s'), $gender));

        if ($this->db->affected_rows() > 0) {

            return array( 'success' => true, 'data' => $this->db->insert_id(), 'msg' => 'Success');

        } else {

            return array( 'success' => false, 'error' => 'An Error Occured' );

        }

    }

    function editPatient($id, $firstname, $middlename, $lastname, $room, $age, $gender) {
        $sql = "UPDATE patients SET firstname = ?, middlename = ?, lastname = ?, room = ?, age = ?, gender = ? WHERE id = ?";

        $this->db->query($sql, array($firstname, $middlename, $lastname, $room, $age, $gender, $id));

        if ($this->db->affected_rows() > 0) {
            return array('success' => true, 'msg' => 'Profile Updated');
        }

        return array('success' => false, 'error' => 'Error');
    }

    function updateImage($id, $filename) {
        $sql = "UPDATE patients SET image= ? WHERE id = ?";

        $this->db->query($sql, array($filename, $id));

        if ($this->db->affected_rows() > 0) {
            return array('success' => true, 'msg' => 'Image Changed');
        }

        return array('success' => false, 'error' => 'Error');
    }

    // PORTAL

    function getInfoList() {
        $sql = "SELECT 
                    p.id,
                    p.firstname,
                    p.middlename,
                    p.lastname,
                    p.age,
                    p.gender,
                    p.room,
                    p.image,
                    p.date_admitted,
                    p.date_released,
                    p.change_dressing,
                    p.priority,
                    p.post_op,
                    p.trach_care,
                    p.status,
                    ph.engage,
                    (SELECT GROUP_CONCAT(CONCAT_WS(' ', ps2.lastname),CONCAT_WS(' ',(SELECT a.value FROM adref a LEFT JOIN patients_physicians pp ON pp.engage = a.id WHERE pp.engage = ph2.engage LIMIT 1)) SEPARATOR '/') FROM patients_physicians ph2 LEFT JOIN physicians ps2 ON ps2.id = ph2.physician_id WHERE ph2.active = 1 AND ps2.active = 1 AND ph2.patient_id = p.id) as physicians,
                    GROUP_CONCAT(CONCAT_WS(' ', ps.lastname),(SELECT a.value FROM adref a LEFT JOIN patients_physicians pp ON pp.engage = a.id WHERE pp.active = 1 AND pp.engage = ph.engage LIMIT 1) SEPARATOR '/') as physicians2,
                    (SELECT content FROM diagnosis WHERE patient_id = p.id AND active = 1 AND date_created <= CURDATE() ORDER BY date_created LIMIT 1) as diagnosis,
                    (SELECT content FROM surgical_procedures WHERE patient_id = p.id AND active = 1 AND date_created <= CURDATE() ORDER BY date_created LIMIT 1) as surgical_procedures,
                    GROUP_CONCAT(ps.lastname) as physicians3
                FROM patients p LEFT JOIN patients_physicians ph
                ON p.id = ph.patient_id
                LEFT JOIN physicians ps
                ON ps.id = ph.physician_id
                WHERE p.active = 1
                GROUP BY p.id
                ";
 
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return array( 'success' => true, 'data' => $query->result_array());

        } else {

            return array( 'success' => false, 'error' => 'No data found' );

        }
    }

    function addExecute ($firstname, $middlename, $lastname, $age, $gender, $room) {
        $sql = "INSERT INTO `patients`(`firstname`, `middlename`, `lastname`, `age`, `gender`, `room`, `date_admitted`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
        $this->db->query($sql, array($firstname, $middlename, $lastname, $age, $gender, $room, date('Y-m-d H:i:s')));

        if ($this->db->affected_rows() > 0) {

            return array( 'success' => true, 'msg' => 'Success');

        }

        return array( 'success' => false, 'error' => 'Error' );

    }

    function getDetails($id) {
        $sql = "SELECT 
                    p.id,
                    p.firstname,
                    p.middlename,
                    p.lastname,
                    p.age,
                    p.gender,
                    p.room,
                    p.image,
                    p.date_admitted,
                    p.date_released,
                    p.change_dressing,
                    p.priority,
                    p.post_op,
                    p.trach_care,
                    p.status,
                    (SELECT GROUP_CONCAT(CONCAT_WS(' ', ps2.id)) FROM patients_physicians ph2 LEFT JOIN physicians ps2 ON ps2.id = ph2.physician_id WHERE ph2.active = 1 AND ps2.active = 1 AND ph2.patient_id = p.id) as physicians_id
                FROM patients p LEFT JOIN patients_physicians ph
                ON p.id = ph.patient_id
                LEFT JOIN physicians ps
                ON ps.id = ph.physician_id 
                WHERE p.id = ?
                GROUP BY p.id
                ";
 
        $query = $this->db->query($sql, array($id));

        if ($query->num_rows() > 0) {

            return $query->result_array()[0];

        }

        return false;

    }

    function getPhysicians($patient_id) {
        $sql = "SELECT p.id, 
                        p.firstname, 
                        p.middlename, 
                        p.lastname, 
                        pp.engage,
                        pp.id as ppid
                        FROM physicians p
                        LEFT JOIN patients_physicians pp 
                        ON p.id = pp.physician_id
                        WHERE pp.patient_id = ? 
                        AND p.active = ? 
                        AND pp.active = ?";
        $query = $this->db->query($sql, array($patient_id, 1, 1));

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }

    function getNotes ($id) {
        $sql = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN notes an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id desc";
 
        $query = $this->db->query($sql, array($id, 1));

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }

    function getActions ($id) {
        $sql = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN actions_needed an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id desc";
 
        $query = $this->db->query($sql, array($id, 1));

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }

    function getDiagnosis ($id) {
        $sql = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN diagnosis an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id desc";
 
        $query = $this->db->query($sql, array($id, 1));

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }

    function getSurgicalProcedures ($id) {
        $sql = "SELECT an.content, date_format(an.date_created, '%m/%d/%Y %h:%i%p') as date_created, p.firstname, p.lastname FROM physicians p
                    LEFT JOIN surgical_procedures an
                    ON p.id = an.physician_id
                    WHERE an.patient_id = ? AND an.active = ? ORDER BY an.id desc";
 
        $query = $this->db->query($sql, array($id, 1));

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }

    function changeStatusAjax($status, $id) {
        $sql = "UPDATE patients SET status= ? WHERE id = ?";

        $this->db->query($sql, array($status, $id));

        if ($this->db->affected_rows() > 0) {
            return array('success' => true, 'msg' => 'Status Changed');
        }

        return array('success' => false, 'error' => 'Error');
    }

    function addPatientPhysician($patient_id, $physician_id, $engage) {
        $sql = "INSERT INTO `patients_physicians`(`patient_id`, `physician_id`, `engage`, `date_added`) VALUES (?, ?, ?, ?)";

        $this->db->query($sql, array($patient_id, $physician_id, $engage, date('Y-m-d H:i:s')));

        if ($this->db->affected_rows() > 0) {
            return array('success' => true, 'msg' => 'Status Changed');
        }

        return array('success' => false, 'error' => 'Error');
    }

    function deleteph($ppid) {
        $sql = "UPDATE `patients_physicians` SET active= ? WHERE id = ?";

        $this->db->query($sql, array(0, $ppid));

        if ($this->db->affected_rows() > 0) {
            return array('success' => true, 'msg' => 'Success');
        }

        return array('success' => false, 'error' => 'Error');
    }
 }   