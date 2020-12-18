<?php 
class Karma extends CI_Controller
{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('costumer_m');
		$this->load->model('item_m');
		$this->load->model('category_m');
		$this->load->model('karma_m');
	}
	public function index()
	{
		$data['last'] = $this->item_m->getItemOrder('asc');
		$data['coming'] = $this->item_m->getItemOrder('desc');
		$this->template->load('karma/template', 'karma/home', $data);
	}
	public function login()
	{
		$this->template->load('karma/template', 'karma/login');
	}
	public function loginProcess()
	{

    	$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->karma_m->login($post);
			if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'costumer_id' => $row->costumer_id   
                );
				$this->session->set_userdata($params);
				$this->session->set_flashdata('karmaloginsuccess', 'Selamat datang '.$row->name);
            	redirect('karma');
			}else{
				$this->session->set_flashdata('loginfail', 'username / password salah');
            	redirect('karma/login');
			}
		}
	}
	public function register()
	{
		$this->template->load('karma/template', 'karma/register');
	}
	public function registerProcess()
	{
		$post = $this->input->post(null,true);
		$this->karma_m->register($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('karmaregistersuccess', 'Register Successfuly');
		}
    	redirect('karma/login'); 
	}
	public function product($barcode = null)
	{
		if ($barcode == null) {
			$data['item'] = $this->item_m->getItem();
			$data['category'] = $this->category_m->getCategory();
			$this->template->load('karma/template', 'karma/product', $data);
		}else {
			$data['item'] = $this->item_m->getItemBarcode($barcode)->row();
			$this->template->load('karma/template', 'karma/detail', $data);
		}

	}
	public function check()
	{
		$post = $this->input->post(null,true);
		$data['barcode'] = $post['barcode'];
		$data['qty'] = $post['qty'];
		$data['price'] = $post['price'];
		if (isset($post['cart'])) {
			if (!$this->karmalogin->karma_login()->name) {
				$this->session->set_flashdata('karmaloginfail', 'You have to login before!');
            	redirect('karma/login');
			}else{
				$this->karma_m->addToCart($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('karmacartsuccess', 'Product added');
				}
            	redirect('karma/cart'); 
			}
		}
	}
}