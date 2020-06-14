<?php 

class Costumer_m extends CI_Model
{
    public function getCostumer($id = null)
    {
        $this->db->from('costumer');
        if ($id != null) {
        	$this->db->where('costumer_id', $id);
        }
        return $this->db->get();
    }
    public function add($post)
    {
        $data = [
            'name' => $post['costumername'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address']
        ];
        $this->db->insert('costumer', $data);
    }
    public function edit($id)
    {
        $post = $this->input->post(null,true);
        $data = [
            'name' => $post['costumername'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'updated' => date('Y-m-d h:i:s')
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