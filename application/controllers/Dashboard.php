<?php 
class Dashboard extends CI_Controller
{
	public function index()
	{
		notLogin();
		$this->load->model('transaction_m');
		$month = date('y-m');
        $data['item'] = $this->db->query("SELECT * FROM item")->num_rows();
        $data['selled'] = $this->db->query("SELECT * FROM transaction WHERE transaction.date LIKE '%".$month."%'")->num_rows();
        $total = $this->db->query("SELECT SUM(total) as semua FROM transaction WHERE transaction.date LIKE '%".$month."%'")->row();
        $data['total'] = $total->semua;
		$data['trans'] = $this->transaction_m->getTransactionMonth($month)->result();
		$this->template->load('template', 'dashboard', $data);
	}
}