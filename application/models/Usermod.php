<?php

class Usermod extends CI_Model
{
  public function login($post)
  {
    $this->db->from('user');
    $this->db->where('username', $post['username']);
    $this->db->where('password', $post['password']);
    return $this->db->get();
  }
  public function getUser($id = null)
  {
    $this->db->from('user');
    if ($id != null) {
      $this->db->where('user_id', $id);
    }
    return $this->db->get();
  }
  public function add($post)
  {
    $data = [
      'username' => $post['username'],
      'password' => $post['password'],
      'name' => $post['fullname'],
      'level' => $post['level'],
      'phone' => $post['phone']
    ];
    $this->db->insert('user', $data);
  }
  public function edit($id)
  {
    $post = $this->input->post(null, true);
    $data = [
      'username' => $post['username'],
      'name' => $post['fullname'],
      'phone' => $post['phone'],
      'updated' => date('Y-m-d H:i:s')
    ];
    if ($post['password'] == null) {
      $data['password'] = $post['password'];
    }
    $this->db->where('user_id', $id);
    $this->db->update('user', $data);
  }
  public function del($id)
  {
    $this->db->where('user_id', $id);
    $this->db->delete('user');
  }
}
