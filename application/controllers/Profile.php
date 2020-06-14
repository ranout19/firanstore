<?php 
class Profile extends CI_Controller
{
	public function index()
	{
		notLogin();
		$this->template->load('template', 'profile');
	}
}