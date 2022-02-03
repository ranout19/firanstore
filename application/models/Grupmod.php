<?php

class Grupmod extends CI_Model
{
  public function getGrup($id = null)
  {
    $this->db->from('grup');
    if ($id != null) {
      $this->db->where('id_grup', $id);
    }
    return $this->db->get();
  }
  public function tambah($post)
  {
    $data = [
      'grup' => $post['grup'],
      'sub_grup' => $post['sub_grup']
    ];
    $this->db->insert('grup', $data);
  }
  public function edit($id)
  {
    $post = $this->input->post(null, true);
    $data = [
      'grup' => $post['grup'],
      'sub_grup' => $post['sub_grup'],
      'updated_at' => date('Y-m-d h:i:s')
    ];
    $this->db->where('id_grup', $id);
    $this->db->update('grup', $data);
  }
  public function hapus($id)
  {
    $this->db->where('id_grup', $id);
    $this->db->delete('grup');
  }
}
