<?php

class Satuanmod extends CI_Model
{
  public function getSatuan($id = null)
  {
    $this->db->from('satuan');
    if ($id != null) {
      $this->db->where('id_satuan', $id);
    }
    return $this->db->get();
  }
  public function tambah($post)
  {
    $data = [
      'satuan' => $post['satuan']
    ];
    $this->db->insert('satuan', $data);
  }
  public function edit($id)
  {
    $post = $this->input->post(null, true);
    $data = [
      'satuan' => $post['satuan'],
      'updated_at' => date('Y-m-d h:i:s')
    ];
    $this->db->where('id_satuan', $id);
    $this->db->update('satuan', $data);
  }
  public function hapus($id)
  {
    $this->db->where('id_satuan', $id);
    $this->db->delete('satuan');
  }
}
