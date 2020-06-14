<?php 

Class Userlogin{

	protected $ci;

	function __construct()
	{
		$this->ci =& get_instance();
	}

	function user_login()
	{
		$this->ci->load->model('user_m');
		$user_id = $this->ci->session->userdata('user_id');
		return $this->ci->user_m->getUser($user_id)->row();
	}

}

?>
