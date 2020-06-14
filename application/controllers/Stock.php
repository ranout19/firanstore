<?php 
class Stock extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model(['item_m', 'supplier_m','stock_m']);
    }
	public function stockInData()
	{
		$data['row'] = $this->stock_m->getStockIn();
		$this->template->load('template', 'stock/stockIn/stockInData', $data);
	}
	public function stockOutData()
	{
		$data['row'] = $this->stock_m->getStockOut();
		$this->template->load('template', 'stock/stockOut/stockOutData', $data);
	} 
	public function stockInAdd()
	{
		$item = $this->item_m->getItem()->result();
		$supplier = $this->supplier_m->getSupplier()->result();
		$data = [
			'supplier' => $supplier,
			'item' => $item
		];
		$this->template->load('template', 'stock/stockIn/stockInForm', $data);
	}
	public function stockOutAdd()
	{
		$item = $this->item_m->getItem()->result();
		$supplier = $this->supplier_m->getSupplier()->result();
		$data = [
			'supplier' => $supplier,
			'item' => $item
		];
		$this->template->load('template', 'stock/stockOut/stockOutForm', $data);
	}
	public function process()
	{
		if (isset($_POST['in_add'])) {
			$post = $this->input->post(null, true);
			$this->stock_m->stockInAdd($post);
			$this->item_m->stockInUpdate($post);
			if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
                redirect('stock/in');
            }
		}else if (isset($_POST['out_add'])) {
			$post = $this->input->post(null, true);
			$this->stock_m->stockOutAdd($post);
			$this->item_m->stockOutUpdate($post);
			if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
                redirect('stock/out');
            }
		}
	}
	public function stockInDel()
	{
		$stock_id = $this->uri->segment(4);
		$item_id = $this->uri->segment(5);
		$qty = $this->stock_m->getStockIn($stock_id)->row()->qty;
		$data = [
			'qty' => $qty,
			'item_id' => $item_id
		];
		$this->item_m->stockOutUpdate($data);
		$this->stock_m->stockInDel($stock_id);
		if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'dihapus');
            redirect('stock/in');
        }
	}
	public function stockOutDel()
	{
		$stock_id = $this->uri->segment(4);
		$item_id = $this->uri->segment(5);
		$qty = $this->stock_m->getStockOut($stock_id)->row()->qty;
		$data = [
			'qty' => $qty,
			'item_id' => $item_id
		];
		$this->item_m->stockInUpdate($data);
		$this->stock_m->stockOutDel($stock_id);
		if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'dihapus');
            redirect('stock/out');
        }
	}
}