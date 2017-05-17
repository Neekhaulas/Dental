<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient_m extends CI_Model{

    /**** LOAD NEXT APPOINTMENT BY PATIENT ****/
    function getNextAppointmentByPatient($idPatient){
        $sql = "SELECT * FROM tbl_appointment tbla, tbl_patient tblp, tbl_staff tbls WHERE tbla.id_patient=tblp.id_patient AND tbla.appointment_date >= CURDATE() AND tblp.id_patient=".$idPatient." AND tbls.id_staff = tbla.id_staff ORDER BY tbla.appointment_date DESC LIMIT 1";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ALL APPOINTMENTS BY PATIENT ****/
    function getAppointmentsByPatient($idPatient){
        $sql = "SELECT * FROM tbl_appointment tbla, tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND tblp.id_patient=".$idPatient.";";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD TOOTH FILE ****/
    function getToothFile($idPatient){
        $sql = "SELECT * FROM tbl_tooth tblt,tooth_file tf,tbl_patient tblp WHERE tblt.id_tooth=tf.id_tooth  AND tf.id_patient=tblp.id_patient AND tblp.id_patient=".$idPatient;
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ALL INVOICES BY PATIENT ****/
    function getAllInvoicesByPatient($idPatient){
        $sql = "SELECT * FROM tbl_invoice tbli, tbl_patient tblp WHERE tbli.id_patient=tblp.id_patient AND tblp.id_patient=".$idPatient." ORDER BY tbli.id_invoice DESC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD LAST FIVE INVOICES BY PATIENT ****/
    function getLastFiveInvoicesByPatient($idPatient){
        $sql = "SELECT * FROM tbl_invoice tbli, tbl_patient tblp WHERE tbli.id_patient=tblp.id_patient AND tblp.id_patient=".$idPatient." ORDER BY tbli.id_invoice DESC LIMIT 5;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ONE PATIENT ****/
    function getOnePatient($idPatient){
        $sql = "SELECT * FROM tbl_patient tblp,tbl_gender tblg WHERE id_patient=".$idPatient." AND tblp.id_gender=tblg.id_gender;";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** INSERT ANSWER SURVEY ****/
    function insertAnswer($data){
        $this->db->insert("tbl_survey",$data);
    }

    /**** LOAD ONE SURVEY ****/
    function getOneSurvey($idPatient){
        $sql = "SELECT * FROM tbl_survey WHERE id_patient=".$idPatient.";";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** JOB DONE PER TOOTH ***/
    function getCountJobsDone($idPatient){
        $sql = "SELECT tblt.id_tooth, COUNT(tblt.id_tooth) AS jobs_done FROM tbl_tooth tblt, tbl_job_done tbljd,tooth_file tf WHERE tbljd.id_tooth = tblt.id_tooth AND tf.id_patient=".$idPatient." AND tf.id_tooth = tblt.id_tooth GROUP BY tf.id_tooth";
        $query=$this->db->query($sql);
        $retour=array();
        if($query->num_rows()>0){
            foreach($query->result_array() as $row){
                $retour[$row['id_tooth']]=$row['jobs_done'];
            }
        }
        return $retour;
    }





}