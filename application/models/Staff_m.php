<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_m extends CI_Model{

     /***********************/
    /**** PATIENT QUERY ****/
   /***********************/

    /**** LOAD ALL GENDERS ****/
    function getAllGenders(){
        $this->db->from("tbl_gender")->order_by("id_gender");
        $result=$this->db->get();
        $retour=array();
        if($result->num_rows()>0){
            $retour['']="------";
            foreach($result->result_array() as $row){
                $retour[$row['id_gender']]=$row['gender'];
            }
        }
        return $retour;
    }

    /**** LOAD ALL PATIENTS ****/
    function getAllPatients(){
        $sql = "SELECT * FROM tbl_patient WHERE old_patient=0 ORDER BY patient_name ASC";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ALL PATIENT LIST ****/
    function getAllPatientsList(){
        $this->db->from("tbl_patient")->order_by("id_patient");
        $this->db->where("old_patient",0);
        $result=$this->db->get();
        $retour=array();
        if($result->num_rows()>0){
            $retour[0]="------";
            foreach($result->result_array() as $row){
                $retour[$row['id_patient']]=$row['patient_surname']." ".strtoupper($row['patient_name']);
            }
        }
        return $retour;
    }

    /**** DELETE PATIENT ***/
    function deletePatient($idPatient){
        $sql = "DELETE FROM tbl_patient WHERE id_patient=".$idPatient." AND old_patient = 1";
        $this->db->query($sql);
    }

    /**** LOAD ALL OLD PATIENTS ****/
    function getAllOldPatients(){
        $sql = "SELECT * FROM tbl_patient WHERE old_patient=1 ORDER BY patient_name ASC";
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

    /**** LOAD LAST PATIENT ****/
    function getLastPatient(){
        $sql = "SELECT id_patient FROM tbl_patient ORDER BY id_patient DESC LIMIT 1;";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** LOAD TOOTH FILE ****/
    function getToothFile($idPatient){
        $sql = "SELECT * FROM tbl_tooth tblt,tooth_file tf,tbl_patient tblp WHERE tblt.id_tooth=tf.id_tooth  AND tf.id_patient=tblp.id_patient AND tblp.id_patient=".$idPatient;
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** JOB DONE PER TOOTH ***/
    function getCountJobsDone($idPatient){
        $sql = "SELECT tblt.id_tooth, tbljd.id_appointment, COUNT(tblt.id_tooth)>0 AS jobs_done FROM tbl_tooth tblt, tbl_job_done tbljd,tooth_file tf, tbl_appointment tbla WHERE tbljd.id_tooth = tblt.id_tooth AND tbla.id_patient=".$idPatient." AND tf.id_tooth = tblt.id_tooth AND tbla.id_appointment = tbljd.id_appointment GROUP BY tf.id_tooth";
        $query=$this->db->query($sql);
        $retour=array();
        if($query->num_rows()>0){
            foreach($query->result_array() as $row){
                $retour[$row['id_tooth']]=$row['jobs_done'];
            }
        }
        return $retour;
    }

    /**** LOAD ONE TOOTH BY PATIENT ****/
    function getOneToothByPatient($idPatient,$idTooth){
        $sql = "SELECT * FROM tbl_tooth tblt,tooth_file tf, tbl_patient tblp WHERE tblt.id_tooth=tf.id_tooth AND tf.id_patient=tblp.id_patient AND tblp.id_patient=".$idPatient." AND tblt.id_tooth=".$idTooth;
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** LOAD ALL JOB DONE BY PATIENT ****/
    function getAllJobDoneByPatient($idPatient){
        $sql = "SELECT * FROM tbl_job_done tblj,tbl_treatment tblt,tbl_appointment tbla,tbl_patient tblp WHERE tblj.id_treatment=tblt.id_treatment AND tbla.id_appointment=tblj.id_appointment AND tbla.id_patient=tblp.id_patient AND tbla.id_patient =".$idPatient." ORDER BY tbla.appointment_date ASC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ONE RADIO ****/
    function getOneRadio($idRadio){
        $sql = "SELECT * FROM tbl_radio WHERE id_radio=".$idRadio.";";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** LOAD ALL RADIO BY PATIENT ****/
    function getRadioByPatient($idPatient){
        $sql = "SELECT * FROM tbl_radio tblr, tbl_patient tblp WHERE tblr.id_patient=tblp.id_patient AND tblp.id_patient=".$idPatient." ORDER BY tblr.radio_name ASC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** INSERT NEW RADIO ****/
    function insertRadio($data){
        $this->db->insert("tbl_radio",$data);
    }

    /**** INSERT NEW PATIENT ****/
    function insertPatient($data){
        $this->db->insert("tbl_patient",$data);
    }

    /**** INIT DENTAL FILE ****/
    function initDentalFile($idTooth,$idPatient){
        $sql = "INSERT INTO tooth_file VALUES (".$idTooth.",".$idPatient.",0);";
        $this->db->query($sql);
    }

    /**** UPDATE INFORMATION PATIENT ****/
    function updatePatient($idPatient,$data){
        $this->db->where("id_patient",$idPatient);
        $this->db->update("tbl_patient", $data);
    }

    /**** UPDATE TOOTH FILE ****/
    function updateToothFile($idTooth,$idPatient,$data){
        $this->db->where(array("id_tooth" => $idTooth, "id_patient" => $idPatient));
        $this->db->update("tooth_file", $data);
    }

    /**** DELETE RADIO ****/
    function deleteRadio($idRadio){
        $this->db->delete('tbl_radio',array('id_radio'=>$idRadio));
    }

    /***** ADD APPOINTMENT IN SCHEDULE ****/
    function addAppointment($idStaff, $idPatient, $day, $month, $year, $hour_start, $minute_start, $hour_end, $minute_end, $info, $emergency){
        $sql = "INSERT INTO tbl_appointment VALUES ('', '".$year."-".$month."-".$day."', '".$hour_start.":".$minute_start.":00', '".$hour_end.":".$minute_end.":00', ".$emergency.", 0, '".$info."', $idPatient, $idStaff)";
        $this->db->query($sql);
    }

    /***** MOVE APPOINTMENT IN SCHEDULE ****/
    function moveAppointment($idAppointement, $day, $month, $year, $hour_start, $minute_start, $hour_end, $minute_end){
        $sql = "UPDATE tbl_appointment SET appointment_date='".$year."-".$month."-".$day."', appointment_hour_start='".$hour_start.":".$minute_start.":00', appointment_hour_end='".$hour_end.":".$minute_end.":00' WHERE id_appointment=".$idAppointement;
        $this->db->query($sql);
    }

    /***** EDIT APPOINTMENT IN SCHEDULE ****/
    function editAppointment($idAppointement, $informations){
        $sql = "UPDATE tbl_appointment SET appointment_informations='".$informations."' WHERE id_appointment=".$idAppointement;
        $this->db->query($sql);
    }

    /***** RESIZE APPOINTMENT IN SCHEDULE ****/
    function resizeAppointment($idAppointement, $hour_start, $minute_start, $hour_end, $minute_end){
        $sql = "UPDATE tbl_appointment SET appointment_hour_start='".$hour_start.":".$minute_start.":00', appointment_hour_end='".$hour_end.":".$minute_end.":00' WHERE id_appointment=".$idAppointement;
        $this->db->query($sql);
    }
    
    /***** 

    /**************************/
    /**** GET ALL DOCTORS ****/
    /************************/

    function getAllDoctorsList(){
        $this->db->from("tbl_staff")->order_by("id_staff");
        $this->db->where("staff_fire",0);
        $result=$this->db->get();
        $retour=array();
        if($result->num_rows()>0){
            $retour['']="------";
            foreach($result->result_array() as $row){
                $retour[$row['id_staff']]=$row['staff_name']." ".strtoupper($row['staff_surname']);
            }
        }
        return $retour;
    }

    /***** GET FILLING DOCUMENTATION ******/
    function getDocumentationFilling(){
        $this->db->from("tbl_documentation");
        $this->db->where("documentation_name", "filling");
        $query = $this->db->get();
        return $query->row();
    }

    function editDocumentationFilling($data){
        $this->db->where("documentation_name","filling");
        $this->db->update("tbl_documentation", $data);
    }

    /***** GET BRACES DOCUMENTATION ******/
    function getDocumentationBrace(){
        $this->db->from("tbl_documentation");
        $this->db->where("documentation_name", "braces");
        $query = $this->db->get();
        return $query->row();
    }

    function editDocumentationBrace($data){
        $this->db->where("documentation_name","braces");
        $this->db->update("tbl_documentation", $data);
    }

    /***** GET CROWNS DOCUMENTATION ******/
    function getDocumentationCrown(){
        $this->db->from("tbl_documentation");
        $this->db->where("documentation_name", "crowns");
        $query = $this->db->get();
        return $query->row();
    }

    function editDocumentationCrown($data){
        $this->db->where("documentation_name","crowns");
        $this->db->update("tbl_documentation", $data);
    }

    /**************************/
    /**** JOB DONE QUERY ****/
    /************************/

    /**** LOAD ONE TREATMENT ****/
    function getOneTreatment($idJobDone){
        $sql = "SELECT * FROM tbl_job_done tblj,tbl_treatment tblt,tbl_appointment tbla WHERE tblj.id_treatment=tblt.id_treatment AND tbla.id_appointment=tblj.id_appointment AND tblj.id_job_done=".$idJobDone.";";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** INSERT NEW JOB DONE ****/
    function insertJobDone($data){
        $this->db->insert("tbl_job_done",$data);
    }

    /**** LOAD LAST JOB DONE ****/
    function getLastJobDone(){
        $sql = "SELECT id_job_done FROM tbl_job_done ORDER BY id_job_done DESC LIMIT 1;";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** UPDATE JOB DONE ****/
    function updateJobDone($idJobDone,$data){
        $this->db->where("id_job_done",$idJobDone);
        $this->db->update("tbl_job_done", $data);
    }

    function deleteJobDone($idJob){
        $this->db->where("id_job_done", $idJob);
        $this->db->delete("tbl_job_done");
    }

    /****************************/
    /**** APPOINTMENT QUERY ****/
    /**************************/

    /**** LOAD ALL APPOINTMENTS ****/
    function getAllAppointments(){
        $sql = "SELECT * FROM tbl_appointment tbla, tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND CONCAT(tbla.appointment_date,' ',tbla.appointment_hour_start)>=NOW() ORDER BY tbla.appointment_hour_start ASC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ALL OLD APPOINTMENTS ****/
    function getAllOldAppointments(){
        $sql = "SELECT * FROM tbl_appointment tbla, tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND CONCAT(tbla.appointment_date,' ',tbla.appointment_hour_start)<NOW() ORDER BY tbla.appointment_hour_start ASC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ALL APPOINTMENTS FOR SPECIFIC DOCTOR ****/
    function getAllAppointmentsByDoctor($idDoctor){
        $sql = "SELECT * FROM tbl_appointment tbla, tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND tbla.id_staff=".$idDoctor." AND CONCAT(tbla.appointment_date,' ',tbla.appointment_hour_start)>=NOW() ORDER BY tbla.appointment_hour_start ASC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ALL APPOINTMENTS TODAY ****/
    function getAllAppointmentsToday(){
        $sql = "SELECT tbla.appointment_date,tbla.appointment_hour_start,tblp.patient_name,tblp.patient_surname,tblp.id_patient FROM tbl_appointment tbla, tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND tbla.appointment_date=CURDATE() AND tbla.appointment_hour_start>CURTIME() ORDER BY tbla.appointment_hour_start ASC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ALL APPOINTMENTS TODAY ****/
    function getAllAppointmentsTodayByDoctor($idDoctor){
        $sql = "SELECT tbla.appointment_date,tbla.appointment_hour_start,tblp.patient_name,tblp.patient_surname,tblp.id_patient FROM tbl_appointment tbla, tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND tbla.appointment_date=CURDATE() AND tbla.appointment_hour_start>CURTIME() AND tbla.id_staff=".$idDoctor." ORDER BY tbla.appointment_hour_start ASC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ALL APPOINTMENTS BY PATIENT ****/
    function getAppointmentsByPatient($idPatient){
        $sql = "SELECT * FROM tbl_appointment tbla, tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND tblp.id_patient=".$idPatient." ORDER BY tbla.appointment_date ASC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD NEXT APPOINTMENT BY PATIENT ****/
    function getNextAppointmentByPatient($idPatient){
        $sql = "SELECT * FROM tbl_appointment tbla, tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND tbla.appointment_date >= CURDATE() AND tblp.id_patient=".$idPatient." ORDER BY tbla.appointment_date DESC LIMIT 1;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD APPOINTMENT TODAY BY PATIENT LIST ****/
    function getAppointmentTodayByPatientList($idPatient){
        $sql = "SELECT * FROM tbl_appointment tbla, tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND tblp.id_patient=".$idPatient." AND tbla.appointment_date=CURDATE() ORDER BY tbla.appointment_date DESC;";
        $result=$this->db->query($sql);
        $retour=array();
        if($result->num_rows()>0){
            foreach($result->result_array() as $row){
                $retour[$row['id_appointment']]= date("l d F Y",strtotime($row['appointment_date']))." - ".date("H:i",strtotime($row['appointment_hour_start']));
            }
        }
        return $retour;
    }

    /**** LOAD OLD APPOINTMENTS BY PATIENT LIST ****/
     function getOldAppointmentsByPatientList($idPatient){
        $sql = "SELECT * FROM tbl_appointment tbla, tbl_patient tblp WHERE tbla.id_patient=tblp.id_patient AND tblp.id_patient=".$idPatient." AND tbla.appointment_date<CURDATE() ORDER BY tbla.appointment_date DESC;";
        $result=$this->db->query($sql);
        $retour=array();
        if($result->num_rows()>0){
            foreach($result->result_array() as $row){
                $retour[$row['id_appointment']]= date("l d F Y",strtotime($row['appointment_date']))." - ".date("H:i",strtotime($row['appointment_hour_start']));
            }
        }
        return $retour;
    }

    /**** LOAD ONE APPOINTMENT ****/
    function getOneAppointment($idAppointment){
        $sql = "SELECT * FROM tbl_appointment WHERE id_appointment=".$idAppointment;
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** INSERT NEW APPOINTMENT ****/
    function insertAppointment($data){
        $this->db->insert("tbl_appointment",$data);
    }

    /**** UPDATE APPOINTMENT ****/
    function updateAppointment($idAppointment,$data){
        $this->db->where("id_appointment",$idAppointment);
        $this->db->update("tbl_appointment", $data);
    }

    /**** CANCEL APPOINTMENT ****/
    function cancelAppointment($idAppointment){
        $this->db->delete('tbl_appointment',array('id_appointment'=>$idAppointment));
    }


    /****************************/
    /**** INVOICE QUERY ****/
    /**************************/

    /**** LOAD ALL INVOICES ****/
    function getAllInvoices(){
        $sql = "SELECT * FROM tbl_invoice tbli, tbl_patient tblp WHERE tbli.id_patient=tblp.id_patient ORDER BY tbli.invoice_date DESC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    function getAllInvoicesOfDay($date){
        $sql = "SELECT * FROM tbl_invoice tbli, tbl_patient tblp WHERE tbli.id_patient=tblp.id_patient AND tbli.invoice_date='".$date."' ORDER BY tbli.invoice_date DESC";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD 10 INVOICES ****/
    function getTenInvoices(){
        $sql = "SELECT * FROM tbl_invoice tbli, tbl_patient tblp WHERE tbli.id_patient=tblp.id_patient ORDER BY tbli.id_invoice DESC LIMIT 10;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ALL INVOICES BY PATIENT ****/
    function getAllInvoicesByPatient($idPatient){
        $sql = "SELECT * FROM tbl_invoice tbli, tbl_patient tblp WHERE tbli.id_patient=tblp.id_patient AND tblp.id_patient=".$idPatient." ORDER BY tbli.id_invoice DESC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ONE INVOICE ****/
    function getOneInvoice($idInvoice){
        $sql = "SELECT * FROM tbl_invoice WHERE id_invoice=".$idInvoice.";";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** LOAD JOB WITHOUT INVOICE ****/
    function getJobDoneWithoutInvoice($idPatient){
        $sql = "SELECT * FROM tbl_job_done tblj,tbl_appointment tbla,tbl_treatment tblt,tbl_patient tblp WHERE tbla.id_appointment=tblj.id_appointment AND tblj.id_treatment=tblt.id_treatment AND tbla.id_patient=tblp.id_patient AND tblj.job_complete=1 AND tbla.id_patient=".$idPatient." AND tblj.id_invoice IS NULL ORDER BY tbla.appointment_date ASC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD LAST INVOICE BY STAFF ****/
    function getLastInvoiceByStaff($idStaff){
        $sql = "SELECT id_invoice FROM tbl_invoice WHERE id_staff=".$idStaff." ORDER BY id_invoice DESC LIMIT 1;";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** LOAD ALL JOB BY INVOICE ****/
    function getJobByInvoice($idInvoice){
        $sql = "SELECT * FROM tbl_job_done tblj,tbl_treatment tblt, tbl_appointment tbla WHERE tbla.id_appointment=tblj.id_appointment AND tblj.id_treatment=tblt.id_treatment AND tblj.id_invoice=".$idInvoice.";";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** INSERT NEW INVOICE ****/
    function insertNewInvoice($data){
        $this->db->insert("tbl_invoice",$data);
    }

    /**** UPDATE INVOICE ****/
    function updateInvoice($idInvoice,$data){
        $this->db->where("id_invoice",$idInvoice);
        $this->db->update("tbl_invoice", $data);
    }

    /**** DELETE INVOICE ****/
    function deleteInvoice($idInvoice){
        $this->db->delete('tbl_invoice',array('id_invoice'=>$idInvoice));
    }

    function getUnpaidInvoices(){
        $sql = "SELECT * FROM tbl_invoice tbli, tbl_patient tblp WHERE tbli.id_patient=tblp.id_patient AND tbli.invoice_amount != tbli.invoice_paid ORDER BY tbli.invoice_date DESC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    function getPaidInvoices(){
        $sql = "SELECT * FROM tbl_invoice tbli, tbl_patient tblp WHERE tbli.id_patient=tblp.id_patient AND tbli.invoice_amount = tbli.invoice_paid ORDER BY tbli.invoice_date DESC;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /*****************************/
    /****** GALLERY QUERY *******/
    /***************************/

    /**** LOAD ALL PHOTOS ****/
    function getAllPhotos(){
        $sql = "SELECT * FROM tbl_img_gallery tblg, tbl_staff tbls, tbl_language tbll WHERE tbls.id_staff=tblg.id_staff AND tbll.id_language = tblg.id_language";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ONE PHOTO ****/
    function getOnePhoto($idPhoto){
        $sql = "SELECT * FROM tbl_img_gallery WHERE id_img=".$idPhoto.";";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** INSERT NEW PHOTO ****/
    function insertPhoto($data){
        $this->db->insert("tbl_img_gallery",$data);
    }

    /**** UPDATE ARTICLE ****/
    function updatePhoto($idPhoto,$data){
        $this->db->where("id_img",$idPhoto);
        $this->db->update("tbl_img_gallery", $data);
    }

    /**** DELETE INVOICE ****/
    function deletePhoto($idPhoto){
        $this->db->delete('tbl_img_gallery',array('id_img'=>$idPhoto));
    }



    /*****************************/
    /****** ARTICLES QUERY ******/
    /***************************/

    /**** LOAD ALL ARTICLES ****/
    function getAllArticles(){
        $sql = "SELECT * FROM tbl_article tbla,tbl_localized_tab tblt,tbl_staff tbls WHERE tbla.id_localized_tab=tblt.id_localized_tab AND tbla.id_staff=tbls.id_staff;";
        $query=$this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ALL TABS LIST ****/
    function getAllTabsList(){
        $sql = "SELECT * FROM tbl_localized_tab tbllt, tbl_language tbll, tbl_tab tblt WHERE tbllt.id_tab = tblt.id_tab AND tbll.id_language = tbllt.id_language;";
        $result=$this->db->query($sql);
        $retour=array();
        if($result->num_rows()>0){
            $retour['']="------";
            foreach($result->result_array() as $row){
                $retour[$row['id_localized_tab']]=$row['localized_tab_name']." (".$row['language_value']." ".$row['tab_name'].")";
            }
        }
        return $retour;
    }

    /**** LOAD ONE ARTICLE****/
    function getOneArticle($idArticle){
        $sql = "SELECT * FROM tbl_article tbla,tbl_localized_tab tblt,tbl_staff tbls WHERE tbla.id_localized_tab=tblt.id_localized_tab AND tbla.id_staff=tbls.id_staff AND id_article=".$idArticle;
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** INSERT NEW ARTICLE ****/
    function insertArticle($data){
        $this->db->insert("tbl_article",$data);
    }

    /**** UPDATE ARTICLE ****/
    function updateArticle($idArticle,$data){
        $this->db->where("id_article",$idArticle);
        $this->db->update("tbl_article", $data);
    }

    /**** DELETE AN ARTICLE ****/
    function deleteArticle($idArticle){
        $this->db->delete('tbl_article',array('id_article'=>$idArticle));
    }


    /*****************************/
    /****** SURVEY QUERY *******/
    /***************************/


    function numberPatient(){
        $sql="SELECT count(id_patient) as numberPatient FROM tbl_survey;";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function numberPatientTotal(){
        $sql="SELECT count(id_patient) as numberPatientTotal FROM tbl_patient;";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    //Question 1
    function questionOneAnswerOne(){
        $sql="SELECT count(survey_answer1) as q1a1 FROM tbl_survey WHERE survey_answer1='friend';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionOneAnswerTwo(){
        $sql="SELECT count(survey_answer1) as q1a2 FROM tbl_survey WHERE survey_answer1='family';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionOneAnswerThree(){
        $sql="SELECT count(survey_answer1) as q1a3 FROM tbl_survey WHERE survey_answer1='internet';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionOneAnswerFour(){
        $sql="SELECT count(survey_answer1) as q1a4 FROM tbl_survey WHERE survey_answer1='advertisement';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionOneAnswerFive(){
        $sql="SELECT count(survey_answer1) as q1a5 FROM tbl_survey WHERE survey_answer1='other';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    //Question 2
    function questionTwoAnswerOne(){
        $sql="SELECT count(survey_answer2) as q2a1 FROM tbl_survey WHERE survey_answer2='phone';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionTwoAnswerTwo(){
        $sql="SELECT count(survey_answer2) as q2a2 FROM tbl_survey WHERE survey_answer2='office';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    //Question 3
    function questionThreeAnswerOne(){
        $sql="SELECT count(survey_answer3) as q3a1 FROM tbl_survey WHERE survey_answer3='0';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionThreeAnswerTwo(){
        $sql="SELECT count(survey_answer3) as q3a2 FROM tbl_survey WHERE survey_answer3='1';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionThreeAnswerThree(){
        $sql="SELECT count(survey_answer3) as q3a3 FROM tbl_survey WHERE survey_answer3='2';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionThreeAnswerFour(){
        $sql="SELECT count(survey_answer3) as q3a4 FROM tbl_survey WHERE survey_answer3='3';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionThreeAnswerFive(){
        $sql="SELECT count(survey_answer3) as q3a5 FROM tbl_survey WHERE survey_answer3='4';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionThreeAnswerSix(){
        $sql="SELECT count(survey_answer3) as q3a6 FROM tbl_survey WHERE survey_answer3='5';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    //Question 4
    function questionFourAnswerOne(){
        $sql="SELECT count(survey_answer4) as q4a1 FROM tbl_survey WHERE survey_answer4='0';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionFourAnswerTwo(){
        $sql="SELECT count(survey_answer4) as q4a2 FROM tbl_survey WHERE survey_answer4='1';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionFourAnswerThree(){
        $sql="SELECT count(survey_answer4) as q4a3 FROM tbl_survey WHERE survey_answer4='2';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionFourAnswerFour(){
        $sql="SELECT count(survey_answer4) as q4a4 FROM tbl_survey WHERE survey_answer4='3';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionFourAnswerFive(){
        $sql="SELECT count(survey_answer4) as q4a5 FROM tbl_survey WHERE survey_answer4='4';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionFourAnswerSix(){
        $sql="SELECT count(survey_answer4) as q4a6 FROM tbl_survey WHERE survey_answer4='5';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    //Question 5
    function questionFiveAnswerOne(){
        $sql="SELECT count(survey_answer5) as q5a1 FROM tbl_survey WHERE survey_answer5='0';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionFiveAnswerTwo(){
        $sql="SELECT count(survey_answer5) as q5a2 FROM tbl_survey WHERE survey_answer5='1';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionFiveAnswerThree(){
        $sql="SELECT count(survey_answer5) as q5a3 FROM tbl_survey WHERE survey_answer5='2';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionFiveAnswerFour(){
        $sql="SELECT count(survey_answer5) as q5a4 FROM tbl_survey WHERE survey_answer5='3';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionFiveAnswerFive(){
        $sql="SELECT count(survey_answer5) as q5a5 FROM tbl_survey WHERE survey_answer5='4';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionFiveAnswerSix(){
        $sql="SELECT count(survey_answer5) as q5a6 FROM tbl_survey WHERE survey_answer5='5';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    //Question 6
    function questionSixAnswerOne(){
        $sql="SELECT count(survey_answer6) as q6a1 FROM tbl_survey WHERE survey_answer6='0';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionSixAnswerTwo(){
        $sql="SELECT count(survey_answer6) as q6a2 FROM tbl_survey WHERE survey_answer6='1';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionSixAnswerThree(){
        $sql="SELECT count(survey_answer6) as q6a3 FROM tbl_survey WHERE survey_answer6='2';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionSixAnswerFour(){
        $sql="SELECT count(survey_answer6) as q6a4 FROM tbl_survey WHERE survey_answer6='3';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionSixAnswerFive(){
        $sql="SELECT count(survey_answer6) as q6a5 FROM tbl_survey WHERE survey_answer6='4';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionSixAnswerSix(){
        $sql="SELECT count(survey_answer6) as q6a6 FROM tbl_survey WHERE survey_answer6='5';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    //Question 7
    function questionSevenAnswerOne(){
        $sql="SELECT count(survey_answer7) as q7a1 FROM tbl_survey WHERE survey_answer7='0';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionSevenAnswerTwo(){
        $sql="SELECT count(survey_answer7) as q7a2 FROM tbl_survey WHERE survey_answer7='1';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionSevenAnswerThree(){
        $sql="SELECT count(survey_answer7) as q7a3 FROM tbl_survey WHERE survey_answer7='2';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionSevenAnswerFour(){
        $sql="SELECT count(survey_answer7) as q7a4 FROM tbl_survey WHERE survey_answer7='3';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionSevenAnswerFive(){
        $sql="SELECT count(survey_answer7) as q7a5 FROM tbl_survey WHERE survey_answer7='4';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionSevenAnswerSix(){
        $sql="SELECT count(survey_answer7) as q7a6 FROM tbl_survey WHERE survey_answer7='5';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    //Question 8
    function questionEightAnswerOne(){
        $sql="SELECT count(survey_answer8) as q8a1 FROM tbl_survey WHERE survey_answer8='0';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionEightAnswerTwo(){
        $sql="SELECT count(survey_answer8) as q8a2 FROM tbl_survey WHERE survey_answer8='1';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionEightAnswerThree(){
        $sql="SELECT count(survey_answer8) as q8a3 FROM tbl_survey WHERE survey_answer8='2';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionEightAnswerFour(){
        $sql="SELECT count(survey_answer8) as q8a4 FROM tbl_survey WHERE survey_answer8='3';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionEightAnswerFive(){
        $sql="SELECT count(survey_answer8) as q8a5 FROM tbl_survey WHERE survey_answer8='4';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionEightAnswerSix(){
        $sql="SELECT count(survey_answer8) as q8a6 FROM tbl_survey WHERE survey_answer8='5';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    //Question 9
    function questionNineAnswerOne(){
        $sql="SELECT count(survey_answer9) as q9a1 FROM tbl_survey WHERE survey_answer9='0';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionNineAnswerTwo(){
        $sql="SELECT count(survey_answer9) as q9a2 FROM tbl_survey WHERE survey_answer9='1';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionNineAnswerThree(){
        $sql="SELECT count(survey_answer9) as q9a3 FROM tbl_survey WHERE survey_answer9='2';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionNineAnswerFour(){
        $sql="SELECT count(survey_answer9) as q9a4 FROM tbl_survey WHERE survey_answer9='3';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionNineAnswerFive(){
        $sql="SELECT count(survey_answer9) as q9a5 FROM tbl_survey WHERE survey_answer9='4';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    function questionNineAnswerSix(){
        $sql="SELECT count(survey_answer9) as q9a6 FROM tbl_survey WHERE survey_answer9='5';";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    //Question 10
    function questionTen(){
        $sql="SELECT survey_answer10 FROM tbl_survey";
        $query = $this->db->query($sql);
        return $query->result();
    }




    /*****************************/
    /****** SETTINGS QUERY ******/
    /***************************/

    /**** LOAD ALL STAFF ****/
    function getAllStaff()
    {
        $sql = "SELECT * FROM tbl_staff tbls,tbl_post_staff tblps WHERE tbls.id_post=tblps.id_post  ORDER BY id_staff ASC;";
        $query = $this->db->query($sql);
        return $query->result();
    }

    /**** LOAD ALL POST ****/
    function getAllPostList(){
        $sql = "SELECT * FROM tbl_post_staff;";
        $result=$this->db->query($sql);
        $retour=array();
        if($result->num_rows()>0){
            $retour['']="------";
            foreach($result->result_array() as $row){
                $retour[$row['id_post']]=$row['post_name'];
            }
        }
        return $retour;
    }

    /**** LOAD ONE EMPLOYEE ****/
    function getOneEmployee($idStaff){
        $sql = "SELECT * FROM tbl_staff tbls, tbl_post_staff tblps WHERE tbls.id_post=tblps.id_post AND id_staff='".$idStaff."';";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** LOAD VAT ****/
    function getVAT(){
        $sql = "SELECT rate FROM tbl_vat WHERE id_vat=1";
        $query = $this->db->query($sql);
        $row=$query->row();
        return $row;
    }

    /**** INSERT NEW STAFF ****/
    function insertStaff($data){
        $this->db->insert("tbl_staff",$data);
    }

    /**** UPDATE STAFF ****/
    function updateStaff($idStaff,$data){
        $this->db->where("id_staff",$idStaff);
        $this->db->update("tbl_staff", $data);
    }

    /**** UPDATE VAT ****/
    function updateVAT($idVAT,$data){
        $this->db->where("id_vat",$idVAT);
        $this->db->update("tbl_vat", $data);
    }

    /**** LOAD ALL TREATMENTS ****/
    function getAllTreatments(){
        $sql = "SELECT * FROM tbl_treatment tblt ORDER BY tblt.id_treatment ASC;";
        $result=$this->db->query($sql);
        $retour=array();
        if($result->num_rows()>0){
            $retour['']="------";
            foreach($result->result_array() as $row){
                $retour[$row['id_treatment']]=$row['treatment_name'];
            }
        }
        return $retour;
    }

    function getListTreatments(){
        $sql = "SELECT * FROM tbl_treatment tblt ORDER BY tblt.id_treatment ASC;";
        $result=$this->db->query($sql);
        return $result->result();
    }

    /**** GET PRICE OF TREATMENT ****/
    function getPriceForTreatment($idTreatment){
        $sql = "SELECT tblt.treatment_price FROM tbl_treatment tblt WHERE tblt.id_treatment=".$idTreatment.";";
        $result=$this->db->query($sql);
        return $result->row()->treatment_price;
    }

    /**** LOAD ONE TREATMENT ****/
    function getOneTreatmentStaff($idTreatment){
        $sql = "SELECT * FROM tbl_treatment tblt WHERE tblt.id_treatment=".$idTreatment.";";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    /**** INSERT NEW APPOINTMENT ****/
    function insertTreatment($data){
        $this->db->insert("tbl_treatment",$data);
    }

    /**** UPDATE TREATMENT ****/
    function updateTreatment($idTreatment,$data){
        $this->db->where("id_treatment",$idTreatment);
        $this->db->update("tbl_treatment", $data);
    }

    /**** DELETE AN EMPLOYEE ****/
    function deleteTreatment($idTreatment){
        $this->db->delete('tbl_treatment',array('id_treatment'=>$idTreatment));
    }

    function backupDatabse(){
        $return = "SET FOREIGN_KEY_CHECKS = 0;\n";
        $sql = "SHOW TABLES";
        $query = $this->db->query($sql);
        $tables = array();
        foreach($data=$query->result_array() as $table){
            $tables[] = array_values($table)[0];
        }

        foreach($tables as $table){
            $sql = "SELECT * FROM ".$table;
            $query = $this->db->query($sql);
            $num_fields = $query->num_fields();

            $return.= "TRUNCATE ".$table.";\n";

            $rows = $query->result_array();
            foreach(array_values($rows) as $row){
                $return.= 'INSERT INTO '.$table.' VALUES(';
                $row = array_values($row);
                for($i = 0; $i < $num_fields; $i++){
                    $row[$i] = addslashes($row[$i]);
                    $row[$i] = preg_replace("/\n/","\\n",$row[$i]);
                    if (isset($row[$i])) { $return.= '"'.$row[$i].'"' ; } else { $return.= '""'; }
                    if ($i < ($num_fields-1)) { $return.= ','; }
                }
                $return.= ");\n";
            }
        }
        $return.="\nSET FOREIGN_KEY_CHECKS = 1;";
        return $return;
    }

    /**** GET ALL LANGUAGES ****/
    function getAllLanguages(){
        $this->db->from("tbl_language");
        $result=$this->db->get();
        $retour=array();
        if($result->num_rows()>0){
            $retour['']="------";
            foreach($result->result_array() as $row){
                $retour[$row['id_language']]=$row['language_value'];
            }
        }
        return $retour;
    }

    /*** PAYMENT HISTORY ****/
    function getPaymentHistory($idInvoice){
        $sql = "SELECT * FROM tbl_payment tblp WHERE tblp.id_invoice=".$idInvoice." ORDER BY tblp.payment_date ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }

    function addPayment($idInvoice, $amount){
        $sql = "INSERT INTO tbl_payment VALUES ('', '".$idInvoice."', NOW(), '".$amount."');";
        $this->db->query($sql);
    }
}

