<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');

        $site_lang = $ci->session->userdata('lang');
        if ($site_lang) {
            $ci->lang->load('home',$ci->session->userdata('lang'));
            $ci->lang->load('translation',$ci->session->userdata('lang'));
            $ci->lang->load('common',$ci->session->userdata('lang'));
            $ci->lang->load('date',$ci->session->userdata('lang'));
            $ci->lang->load('calendar',$ci->session->userdata('lang'));
        } else {
            $ci->session->set_userdata('lang', 'english');
            $ci->lang->load('home',$ci->session->userdata('lang'));
            $ci->lang->load('translation',$ci->session->userdata('lang'));
            $ci->lang->load('common',$ci->session->userdata('lang'));
            $ci->lang->load('calendar',$ci->session->userdata('lang'));
        }
    }
}