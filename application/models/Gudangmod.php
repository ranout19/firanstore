<?php

class Gudangmod extends CI_Model
{
  public function getgudang($id = null)
  {
    $this->db->from('gudang');
    if ($id != null) {
      $this->db->where('id_gudang', $id);
    }
    return $this->db->get();
  }
  public function tambah($post)
  {
    $data = [
      'gudang' => $post['gudang']
    ];
    $this->db->insert('gudang', $data);
  }
  public function edit($id)
  {
    $post = $this->input->post(null, true);
    $data = [
      'gudang' => $post['gudang'],
      'updated' => date('Y-m-d h:i:s')
    ];
    $this->db->where('id_gudang', $id);
    $this->db->update('gudang', $data);
  }
  public function hapus($id)
  {
    $this->db->where('id_gudang', $id);
    $this->db->delete('gudang');
  }
}
