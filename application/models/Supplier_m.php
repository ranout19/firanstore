<?php 

class Supplier_m extends CI_Model
{
    public function getSupplier($id = null)
    {
        $this->db->from('supplier');
        if ($id != null) {
        	$this->db->where('supplier_id', $id);
        }
        return $this->db->get();
    }
    public function add($post)
    {
        $data = [
            'name' => $post['suppliername'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => $post['description']
        ];
        $this->db->insert('supplier', $data);
    }
    public function edit($id)
    {
        $post = $this->input->post(null,true);
        $data = [
            'name' => $post['suppliername'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => $post['description'],
            'updated' => date('Y-m-d h:i:s')
        ];
        $this->db->where('supplier_id', $id);
        $this->db->update('supplier', $data);
    }
    public function del($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }
}