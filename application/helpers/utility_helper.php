<?php
    function notLoginKarma()
    {
        $ci =& get_instance();
        $userSession = $ci->session->userdata('karma_id');
        if (!$userSession) {
            redirect('karma/login');
        }
    }
    function alreadyLogin()
    {
        $ci =& get_instance();
        $userSession = $ci->session->userdata('user_id');
        if ($userSession) {
            redirect('dashboard');
        }
    }
    function notLogin()
    {
        $ci =& get_instance();
        $userSession = $ci->session->userdata('user_id');
        if (!$userSession) {
            redirect('auth/login');
        }
    }
    function checkAdmin()
    {
        $ci =& get_instance();
        $ci->load->library('userlogin');
        if ($ci->userlogin->user_login()->level != 1) {
            redirect('dashboard');
        }
    }
    function idr($rp)
    {
        $result = "Rp ".number_format($rp);
        return $result;
    }
?>