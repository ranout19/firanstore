<?php
class Barangmod extends CI_Model
{
  public function getBarang($id = null)
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('grup', 'grup.id_grup = barang.id_grup');
    $this->db->join('satuan', 'satuan.id_satuan = barang.id_satuan');
    if ($id != null) {
      $this->db->where('id_barang', $id);
    }
    $this->db->order_by('kode_barang', 'asc');
    return $this->db->get();
  }
  public function getBarangStok($id = null)
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('grup', 'grup.id_grup = barang.id_grup');
    $this->db->join('satuan', 'satuan.id_satuan = barang.id_satuan');
    if ($id != null) {
      $this->db->where('id_barang', $id);
    }
    $this->db->where('stok <', 15);
    $this->db->order_by('stok', 'asc');
    return $this->db->get();
  }
  public function getBarangOrder($order)
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('grup', 'grup.id_grup = barang.id_grup');
    $this->db->join('satuan', 'satuan.id_satuan = barang.id_satuan');
    $this->db->order_by('created', $order);
    $this->db->limit(8);
    return $this->db->get();
  }
  public function tambah($post)
  {
    $data = [
      'kode_barang' => $post['kode_barang'],
      'nama' => $post['nama_barang'],
      'label' => $post['label'],
      'nickname' => $post['nickname'],
      'id_grup' => $post['id_grup'],
      'id_satuan' => $post['id_satuan']
    ];
    if ($post['gambar'] != null) {
      $data['gambar'] = $post['gambar'];
    }
    $this->db->insert('barang', $data);
  }
  public function edit($post)
  {
    $data = [
      'kode_barang' => $post['kode_barang'],
      'nama' => $post['nama_barang'],
      'label' => $post['label'],
      'nickname' => $post['nickname'],
      'id_satuan' => $post['id_satuan'],
      'id_grup' => $post['id_grup'],
      'updated' => date('Y-m-d H:i:s')
    ];
    if ($post['gambar'] != null) {
      $data['gambar'] = $post['gambar'];
    }
    $this->db->where('id_barang', $post['id_barang']);
    $this->db->update('barang', $data);
  }
  public function hapus($id)
  {
    $this->db->where('id_barang', $id);
    $this->db->delete('barang');
  }

  function stokMasukUpdate($data)
  {
    $qty = $data['qty'];
    $id = $data['id_barang'];
    $this->db->query("UPDATE barang SET stok = stok + '$qty' WHERE id_barang = '$id' ");
  }
  function stokKeluarUpdate($data)
  {
    $qty = $data['qty'];
    $id = $data['id_barang'];
    $this->db->query("UPDATE barang SET stok = stok - '$qty' WHERE id_barang = '$id' ");
  }
}
