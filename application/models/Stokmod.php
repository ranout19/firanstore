<?php

class Stokmod extends CI_Model
{
	public function getStok($id = null)
	{
		$this->db->select('*');
		$this->db->from('stok');
		$this->db->join('barang', 'stok.id_barang = barang.id_barang');
		$this->db->join('satuan', 'barang.id_satuan = satuan.id_satuan');
		$this->db->join('grup', 'barang.id_grup = grup.id_grup');
		$this->db->join('gudang', 'stok.id_gudang = gudang.id_gudang');
		$this->db->join('user', 'stok.user_id = user.user_id');
		if ($id != null) {
			$this->db->where('id_stok', $id);
		}
		$this->db->order_by('tanggal', 'desc');
		return $this->db->get();
	}
	public function getStokMasuk($id = null)
	{
		$this->db->select('*');
		$this->db->from('stok');
		$this->db->join('barang', 'stok.id_barang = barang.id_barang');
		$this->db->join('satuan', 'barang.id_satuan = satuan.id_satuan');
		$this->db->join('grup', 'barang.id_grup = grup.id_grup');
		$this->db->join('gudang', 'stok.id_gudang = gudang.id_gudang');
		$this->db->join('user', 'stok.user_id = user.user_id');
		if ($id != null) {
			$this->db->where('id_stok', $id);
		}
		$this->db->where('tipe', 'masuk');
		$this->db->order_by('tanggal', 'desc');
		return $this->db->get();
	}
	public function getStokKeluar($id = null)
	{
		$this->db->select('*');
		$this->db->from('stok');
		$this->db->join('barang', 'stok.id_barang = barang.id_barang');
		$this->db->join('satuan', 'barang.id_satuan = satuan.id_satuan');
		$this->db->join('grup', 'barang.id_grup = grup.id_grup');
		$this->db->join('user', 'stok.user_id = user.user_id');
		if ($id != null) {
			$this->db->where('id_stok', $id);
		}
		$this->db->where('tipe', 'keluar');
		$this->db->order_by('tanggal', 'desc');
		return $this->db->get();
	}
	public function tambah_masuk($post)
	{
		$params = [
			'kode' => $post['kode'],
			'id_barang' => $post['id_barang'],
			'tipe' => 'masuk',
			'footprint' => $post['footprint'],
			'box_type' => $post['box_type'],
			'box_number' => $post['box_number'],
			'id_gudang' => $post['id_gudang'],
			'qty' => $post['qty'],
			'price' => $post['price'],
			'vendor' => $post['vendor'],
			'tanggal' => $post['tanggal'],
			'user_id' => $this->session->userdata('user_id'),
			'supplier' => $post['supplier'],
			'marketplace' => $post['marketplace'],
			'invoice' => $post['invoice'],
			'notes' => $post['notes']
		];
		$this->db->insert('stok', $params);
	}
	public function tambah_keluar($post)
	{
		$params = [
			'kode' => $post['kode'],
			'id_barang' => $post['id_barang'],
			'tipe' => 'keluar',
			'qty' => $post['qty'],
			'tanggal' => $post['tanggal'],
			'user_id' => $this->session->userdata('user_id'),
			'notes' => $post['notes']
		];
		$this->db->insert('stok', $params);
	}
	public function stokHapus($id)
	{
		$this->db->where('id_stok', $id);
		$this->db->delete('stok');
	}
}
