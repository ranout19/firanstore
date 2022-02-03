<?php

class Qrcodemod extends CI_Model
{
  public function getqrcode($id = null)
  {
    $this->db->from('qrcode');
    if ($id != null) {
      $this->db->where('id_qrcode', $id);
    }
    return $this->db->get();
  }
  public function tambah($post)
  {
    $data = [
      'qrcode' => $post['qrcode'],
      'sub_qrcode' => $post['sub_qrcode']
    ];
    $this->db->insert('qrcode', $data);
  }
  public function edit($id)
  {
    $post = $this->input->post(null, true);
    $data = [
      'qrcode' => $post['qrcode'],
      'sub_qrcode' => $post['sub_qrcode'],
      'updated_at' => date('Y-m-d h:i:s')
    ];
    $this->db->where('id_qrcode', $id);
    $this->db->update('qrcode', $data);
  }
  public function hapus($id)
  {
    $this->db->where('id_qrcode', $id);
    $this->db->delete('qrcode');
  }
}
