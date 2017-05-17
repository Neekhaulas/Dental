<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_c extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Ajax_m');

    }

    function get_appointment(){
	
		$dateAjax = $this->input->post('date');
		
		$dateTab = explode(' ',$dateAjax);

		$daate = $dateTab[0].' '.$dateTab[1].' '.$dateTab[2].' '.$dateTab[3];
		
        $date=date('Y-m-d',strtotime($daate));

        $data['appointment']=$this->Ajax_m->getAppointment($date);

        $this->load->view('eng/staff/table_appointment',$data);
    }

    function get_appointment_by_doctor($doctor){

		$dateAjax = $this->input->post('date');

		$dateTab = explode(' ',$dateAjax);

		$daate = $dateTab[0].' '.$dateTab[1].' '.$dateTab[2].' '.$dateTab[3];

        $date=date('Y-m-d',strtotime($daate));

        $data['appointment']=$this->Ajax_m->getAppointmentByDoctor($date, $doctor);

        $this->load->view('eng/staff/table_appointment',$data);
    }

    function get_appointments_by_doctor($doctor){
        $data=$this->Ajax_m->getAppointmentsByDoctor($doctor);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function get_date_appointment()
    {
        $date = $this->Ajax_m->getDateAppointment();
        $this->output->set_content_type('application/json')->set_output(json_encode($date));
    }

    function get_date_appointment_by_doctor($doctor)
    {
        $date = $this->Ajax_m->getDateAppointmentByDoctor($doctor);
        $this->output->set_content_type('application/json')->set_output(json_encode($date));
    }


    function get_job_done($idPatient,$idTooth){

        $data['job']=$this->Ajax_m->getjobDoneByTooth($idPatient,$idTooth);

        $this->load->view('eng/staff/table_job_done',$data);

    }

    function get_job_done_patient($idPatient,$idTooth){

        $data['job']=$this->Ajax_m->getjobDoneByTooth($idPatient,$idTooth);

        $this->load->view('eng/patient/table_job_done_patient',$data);

    }

    function getUnfinishedJob($idPatient){

        $data['job']=$this->Ajax_m->getUnfinishedJob($idPatient);

        $this->load->view('eng/staff/table_job_done',$data);
    }


    function getAllJobs($idPatient){

        $data['job']=$this->Ajax_m->getAllJobs($idPatient);

        $this->load->view('eng/staff/table_job_done',$data);
    }

    function confirmEditInvoice(){
        $idPatient=$this->input->post('idPatient');
        $idInvoice=$this->input->post('idInvoice');
        
        $jobChecked= (isset($_REQUEST["jobChecked"])) ? $_REQUEST["jobChecked"] : NULL;
        $jobUnchecked= (isset($_REQUEST["jobUnchecked"])) ? $_REQUEST["jobUnchecked"] : NULL;

        if($jobChecked==null){
            $data = $this->Staff_m->getOnePatient($idPatient);
            $this->load->view('eng/staff/v_head_patient_file',$data);
            $data['invoice'] = $this->Staff_m->getOneInvoice($idInvoice);
            $data['job']= $this->Staff_m->getAllJobDoneByPatient($idPatient);
            $this->load->view('eng/staff/v_edit_invoice',$data);
            $this->load->view('eng/staff/v_foot_staff');

        }else {

            $idStaff = $this->session->userdata('id_staff');

            $data['id_staff'] = $idStaff;
            $data['invoice_date'] = date('Y-m-d');
            $this->Staff_m->updateInvoice($idInvoice, $data);

            $invoiceJob['id_invoice'] = $idInvoice;
            foreach ($jobChecked as $check) {
                $this->Staff_m->updateJobDone($check, $invoiceJob);
            }

            if($jobUnchecked!=null){
                $jobInvoice['id_invoice'] = null;
                foreach ($jobUnchecked as $uncheck) {
                    $this->Staff_m->updateJobDone($uncheck, $jobInvoice);
                }
            }

            $jobAmount = $this->Staff_m->getJobByInvoice($idInvoice);
            $total['invoice_amount'] = 0;
            foreach ($jobAmount as $r) {
                $total['invoice_amount'] = $total['invoice_amount'] + $r->job_price_incl_tax;
            }
            $this->Staff_m->updateInvoice($idInvoice, $total);

            echo site_url('Staff_c/patientFile/'.$idPatient.'/#invoice');

        }

    }

    function add_appointment($idStaff, $idPatient, $day, $month, $year, $hourt_start, $minute_start, $hour_end, $minute_end){
        $information = $this->input->post('information');
        $emergency = $this->input->post('emergency');
        $this->Staff_m->addAppointment($idStaff, $idPatient, $day, $month, $year, $hourt_start, $minute_start, $hour_end, $minute_end, $information, $emergency);
    }

    function move_appointment($idAppointment, $day, $month, $year, $hourt_start, $minute_start, $hour_end, $minute_end){
        $information = $this->input->post('information');
        $this->Staff_m->moveAppointment($idAppointment, $day, $month, $year, $hourt_start, $minute_start, $hour_end, $minute_end);
    }

    function edit_appointment($idAppointment){
        $information = $this->input->post('information');
        $this->Staff_m->editAppointment($idAppointment, $information);
    }

    function resize_appointment($idAppointment, $hourt_start, $minute_start, $hour_end, $minute_end){
        $this->Staff_m->resizeAppointment($idAppointment, $hourt_start, $minute_start, $hour_end, $minute_end);
    }

    function remove_appointment($idAppointment){
        $this->Staff_m->cancelAppointment($idAppointment);
    }

    function get_patients() {
        $patient = $this->Staff_m->getAllPatientsList();

        $this->output->set_content_type('application/json')->set_output(json_encode($patient));
    }
}
