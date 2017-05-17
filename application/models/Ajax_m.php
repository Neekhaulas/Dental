<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_m extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getAppointment($date){
        $sql = "SELECT * FROM tbl_appointment tbla,tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND tbla.appointment_date='".$date."' ORDER BY tbla.appointment_hour_start ASC;";
		$query=$this->db->query($sql);
        return $query->result();
    }

    function getAppointmentByDoctor($date, $idDoctor){
        $sql = "SELECT * FROM tbl_appointment tbla,tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND tbla.appointment_date='".$date."' AND tbla.id_staff=".$idDoctor." ORDER BY tbla.appointment_hour_start ASC;";
		$query=$this->db->query($sql);
        return $query->result();
    }

    function getJobDoneByTooth($idPatient,$idTooth){

            $sql = "SELECT * FROM tbl_job_done tblj,tbl_treatment tblt,tbl_appointment tbla,tbl_tooth tbltth,tbl_patient tblp WHERE tblj.id_treatment=tblt.id_treatment AND tbla.id_appointment=tblj.id_appointment AND tblj.id_tooth=tbltth.id_tooth AND tbla.id_patient=tblp.id_patient AND tbla.id_patient =".$idPatient." AND tbltth.id_tooth=".$idTooth.";";
            $query=$this->db->query($sql);
            return $query->result();
    }

    function getUnfinishedJob($idPatient){
        $sql = "SELECT * FROM tbl_job_done tblj,tbl_appointment tbla,tbl_treatment tblt,tbl_patient tblp WHERE tblj.job_complete=0 AND tbla.id_appointment=tblj.id_appointment AND tblj.id_treatment=tblt.id_treatment AND tbla.id_patient=tblp.id_patient AND tbla.id_patient =".$idPatient." ORDER BY tbla.appointment_date ASC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    function getAllJobs($idPatient){
        $sql = "SELECT * FROM tbl_job_done tblj,tbl_appointment tbla,tbl_treatment tblt,tbl_patient tblp WHERE tbla.id_appointment=tblj.id_appointment AND tblj.id_treatment=tblt.id_treatment AND tbla.id_patient=tblp.id_patient AND CONCAT(tbla.appointment_date,' ',tbla.appointment_hour_start)<NOW() AND tbla.id_patient=".$idPatient." ORDER BY tbla.appointment_date DESC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    function getDateAppointment()
    {
        $sql = "SELECT DISTINCT(DATE_FORMAT(`appointment_date`, '%m-%d-%Y')) FROM tbl_appointment";
        $query=$this->db->query($sql);
        $date = array();
        foreach ($query->result_array() as $row)
        {
            array_push($date, reset($row));
        }
        return $date;
    }

    function getDateAppointmentByDoctor($idDoctor)
    {
        $sql = "SELECT DISTINCT(DATE_FORMAT(`appointment_date`, '%m-%d-%Y')) FROM tbl_appointment WHERE id_staff='".$idDoctor."'";
        $query=$this->db->query($sql);
        $date = array();
        foreach ($query->result_array() as $row)
        {
            array_push($date, reset($row));
        }
        return $date;
    }

    function getAppointmentsByDoctor($idDoctor)
    {
        $sql = "SELECT tbla.id_appointment, tbla.id_patient, tbla.appointment_emergency, DATE_FORMAT(`appointment_date`, '%d') AS DAY, DATE_FORMAT(`appointment_date`, '%m') AS MONTH, DATE_FORMAT(`appointment_date`, '%Y') AS YEAR, TIME_FORMAT(`appointment_hour_start`, \"%H\") AS HOUR_START, TIME_FORMAT(`appointment_hour_start`, \"%i\") AS MINUTE_START, TIME_FORMAT(`appointment_hour_end`, \"%H\") AS HOUR_END, TIME_FORMAT(`appointment_hour_end`, \"%i\") AS MINUTE_END, tblp.patient_name, tblp.patient_surname, tbla.appointment_informations FROM tbl_appointment tbla, tbl_patient tblp WHERE tbla.id_staff=".$idDoctor." AND tblp.id_patient = tbla.id_patient";
        $query=$this->db->query($sql);

        return $query->result_array();
    }
}
