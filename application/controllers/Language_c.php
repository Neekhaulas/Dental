<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language_c extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
	
	function switchLanguage($language = "")
	{
		$availableLanguages = array("english", "french");
		$language = ($language != "" && in_array($language, $availableLanguages)) ? $language : "english";
		$this->session->set_userdata('lang', $language);
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}
}