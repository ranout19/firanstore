<?php
class Stok extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		notLogin();
		$this->load->model(['barangmod', 'stokmod', 'gudangmod']);
	}
	public function masuk()
	{
		$data['stok_masuk'] = $this->stokmod->getStokMasuk();
		$this->template->load('template', 'stok/masuk/data', $data);
	}
	public function keluar()
	{
		$data['stok_keluar'] = $this->stokmod->getStokKeluar();
		$this->template->load('template', 'stok/keluar/data', $data);
	}
	public function stokMasukTambah()
	{
		$cek = $this->db->query("SELECT kode FROM stok WHERE kode LIKE '%BM%'")->num_rows();
		if ($cek > 0) {
			$no = $cek + 1;
			$urut = sprintf("%'.06d", $no);
		} else {
			$urut = "000001";
		}
		$kode = 'BM' . $urut;
		$barangs = $this->barangmod->getbarang()->result();
		$gudangs = $this->gudangmod->getgudang()->result();
		$box_types = $this->db->query("SELECT box_type FROM stok where box_type != '' group by box_type");
		$box_numbers = $this->db->query("SELECT box_number FROM stok where box_number != '' group by box_number");
		$suppliers = $this->db->query("SELECT supplier FROM stok where supplier != '' group by supplier");
		$marketplaces = $this->db->query("SELECT marketplace FROM stok where marketplace != '' group by marketplace");
		$data = [
			'barangs' => $barangs,
			'gudangs' => $gudangs,
			'box_types' => $box_types,
			'box_numbers' => $box_numbers,
			'suppliers' => $suppliers,
			'marketplaces' => $marketplaces,
			'kode' => $kode
		];
		$this->template->load('template', 'stok/masuk/form', $data);
	}
	public function stokKeluarTambah()
	{
		$cek = $this->db->query("SELECT kode FROM stok WHERE kode LIKE '%BK%'")->num_rows();
		if ($cek > 0) {
			$no = $cek + 1;
			$urut = sprintf("%'.06d", $no);
		} else {
			$urut = "000001";
		}
		$kode = 'BK' . $urut;
		$barangs = $this->barangmod->getbarang()->result();
		$gudangs = $this->gudangmod->getgudang()->result();
		$box_types = $this->db->query("SELECT box_type FROM stok where box_type != '' group by box_type");
		$box_numbers = $this->db->query("SELECT box_number FROM stok where box_number != '' group by box_number");
		$suppliers = $this->db->query("SELECT supplier FROM stok where supplier != '' group by supplier");
		$marketplaces = $this->db->query("SELECT marketplace FROM stok where marketplace != '' group by marketplace");
		$data = [
			'barangs' => $barangs,
			'gudangs' => $gudangs,
			'box_types' => $box_types,
			'box_numbers' => $box_numbers,
			'suppliers' => $suppliers,
			'marketplaces' => $marketplaces,
			'kode' => $kode
		];
		$this->template->load('template', 'stok/keluar/form', $data);
	}
	public function proses()
	{
		if (isset($_POST['barang_masuk'])) {
			$post = $this->input->post(null, true);
			$this->stokmod->tambah_masuk($post);
			$this->barangmod->stokMasukUpdate($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'ditambahkan');
				redirect('stok/masuk');
			}
		} else if (isset($_POST['barang_keluar'])) {
			$post = $this->input->post(null, true);
			$this->stokmod->tambah_keluar($post);
			$this->barangmod->stokKeluarUpdate($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'ditambahkan');
				redirect('stok/keluar');
			}
		}
	}
	public function stokMasukHapus()
	{
		$id_stok = $this->uri->segment(4);
		$id_barang = $this->uri->segment(5);
		$qty = $this->stokmod->getStokMasuk($id_stok)->row()->qty;
		$data = [
			'qty' => $qty,
			'id_barang' => $id_barang
		];
		$this->barangmod->stokKeluarUpdate($data);
		$this->stokmod->stokHapus($id_stok);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'dihapus');
			redirect('stok/masuk');
		}
	}
	public function stokKeluarHapus()
	{
		$id_stok = $this->uri->segment(4);
		$id_barang = $this->uri->segment(5);
		$qty = $this->stokmod->getStokKeluar($id_stok)->row()->qty;
		$data = [
			'qty' => $qty,
			'id_barang' => $id_barang
		];
		$this->barangmod->stokMasukUpdate($data);
		$this->stokmod->stokHapus($id_stok);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'dihapus');
			redirect('stok/keluar');
		}
	}
}
