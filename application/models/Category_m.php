<?php 

class Category_m extends CI_Model
{
    public function getCategory($id = null)
    {
        $this->db->from('category');
        if ($id != null) {
        	$this->db->where('category_id', $id);
        }
        return $this->db->get();
    }
    public function add($post)
    {
        $data = [
            'name' => $post['categoryname']
        ];
        $this->db->insert('category', $data);
    }
    public function edit($id)
    {
        $post = $this->input->post(null,true);
        $data = [
            'name' => $post['categoryname'],
            'updated' => date('Y-m-d h:i:s')
        ];
        $this->db->where('category_id', $id);
        $this->db->update('category', $data);
    }
    public function del($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('category');
    }
}