<?php
class Dashboard extends CI_Controller
{
	public function index()
	{
		notLogin();
		$this->load->model(['barangmod', 'stokmod']);
		$barangs = $this->db->query("SELECT sum(stok) as stok from barang")->row()->stok;
		$stoks = $this->barangmod->getBarangStok();
		$gudangs = $this->db->query("SELECT g.gudang, sum(s.qty) as allstok from stok s right join gudang g on s.id_gudang = g.id_gudang group by g.id_gudang")->result();
		$barang_masuk = $this->db->query("SELECT sum(qty) as stok from stok where tipe = 'masuk'")->row()->stok;
		$barang_keluar = $this->db->query("SELECT sum(qty) as stok from stok where tipe = 'keluar'")->row()->stok;
		$data = [
			'barangs' => $barangs,
			'gudangs' => $gudangs,
			'barang_masuk' => $barang_masuk,
			'stoks' => $stoks,
			'barang_keluar' => $barang_keluar
		];
		$this->template->load('template', 'dashboard', $data);
	}
}
