<?php 

Class Karmalogin{

	protected $ci;

	function __construct()
	{
		$this->ci =& get_instance();
	}

	function karma_login()
	{
		$this->ci->load->model('karma_m');
		$costumer_id = $this->ci->session->userdata('costumer_id');
		return $this->ci->karma_m->getCostumerLogin($costumer_id)->row();
	}

}

?>
