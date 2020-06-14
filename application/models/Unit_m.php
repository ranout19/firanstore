<?php 

class Unit_m extends CI_Model
{
    public function getUnit($id = null)
    {
        $this->db->from('unit');
        if ($id != null) {
        	$this->db->where('unit_id', $id);
        }
        return $this->db->get();
    }
    public function add($post)
    {
        $data = [
            'name' => $post['unitname']
        ];
        $this->db->insert('unit', $data);
    }
    public function edit($id)
    {
        $post = $this->input->post(null,true);
        $data = [
            'name' => $post['unitname'],
            'updated' => date('Y-m-d h:i:s')
        ];
        $this->db->where('unit_id', $id);
        $this->db->update('unit', $data);
    }
    public function del($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('unit');
    }
}