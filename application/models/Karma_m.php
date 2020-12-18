<?php 

class Karma_m extends CI_Model
{
    public function login($post)
    {
        $this->db->from('costumer');
        $this->db->where('username', $post['username']);
        $this->db->where('password', md5($post['password']));
        return $this->db->get();
    }
    public function getCostumerLogin($id = null)
    {
        $this->db->from('costumer');
        if ($id != null) {
        	$this->db->where('costumer_id', $id);
        }
        return $this->db->get();
    }
    public function register($post)
    {
        $data = [
            'name' => $post['name'],
            'gender' => 'L',
            'phone' => $post['phone'],
            'address' => $post['address'],
            'username' => $post['username'],
            'password' => md5($post['password'])
        ];
        $this->db->insert('costumer', $data);
    }
    public function addToCart($post)
    {
        $data = [
            'item_id' => $post['item_id'],
            'qty' => $post['qty'],
            'costumer_id' => $this->karmalogin->karma_login()->costumer_id
        ];
        $this->db->insert('cart', $data);
    }
    public function edit($id)
    {
        $post = $this->input->post(null,true);
        $data = [
            'name' => $post['name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'username' => $post['username'],
            'password' => sha1(md5($post['password'])),
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('costumer_id', $id);
        $this->db->update('costumer', $data);
    }
    public function del($id)
    {
        $this->db->where('costumer_id', $id);
        $this->db->delete('costumer');
    }
}