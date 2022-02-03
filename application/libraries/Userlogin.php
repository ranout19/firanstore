<?php

class Userlogin
{

	protected $ci;

	function __construct()
	{
		$this->ci = &get_instance();
	}

	function user_login()
	{
		$this->ci->load->model('usermod');
		$user_id = $this->ci->session->userdata('user_id');
		return $this->ci->usermod->getUser($user_id)->row();
	}
}
