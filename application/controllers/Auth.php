<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usermod');
	}
	public function index()
	{
		alreadyLogin();
		$this->load->view('user');
	}
	public function login()
	{
		alreadyLogin();
		$this->load->view('login');
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->usermod->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'user_id' => $row->user_id,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
				$level = $row->level == 1 ? 'Admin' : 'Pegawai';
				$this->session->set_flashdata('loginsuccess', 'Selamat datang ' . $level);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('loginfail', 'username / password salah');
				redirect('auth/login');
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		redirect('auth/login');
	}
}
