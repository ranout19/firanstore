<?php 
class Item_m extends CI_Model
{
    public function getItem($id = null)
    {
        $this->db->select('item.*, category.name as categoryname, unit.name as unitname');
        $this->db->from('item');
        $this->db->join('category', 'category.category_id = item.category_id');
        $this->db->join('unit', 'unit.unit_id = item.unit_id');
        if ($id != null) {
        	$this->db->where('item_id', $id);
        }
        $this->db->order_by('barcode', 'asc');
        return $this->db->get();
    }
    public function add($post)
    {
        $data = [
            'barcode' => $post['barcode'],
            'name' => $post['itemname'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'image' => $post['image']
        ];
        $this->db->insert('item', $data);
    }
    public function edit($post)
    {
        $data = [
            'barcode' => $post['barcode'],
            'name' => $post['itemname'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'updated' => date('Y-m-d h:i:s')
        ];
        if ($post['image'] != null) {
            $data['image'] = $post['image'];
        }
        $this->db->where('item_id', $post['item_id']);
        $this->db->update('item', $data);
    }
    public function del($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('item');
    }



    function stockInUpdate($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $this->db->query("UPDATE item SET stock = stock + '$qty' WHERE item_id = '$id' ");
    }
    function stockOutUpdate($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $this->db->query("UPDATE item SET stock = stock - '$qty' WHERE item_id = '$id' ");
    }



    public function addItem($post)
    {
        $data = [
            'invoice' => $post['invoice'],
            'item_id' => $post['item_id'],
            'qty' => $post['qty'],
            'subtotal' => $post['subtotal']
        ];
        $this->db->insert('detail', $data);
    }

    public function updateItem($post)
    {
        $data = [
            'qty' => $post['qtyupdate'],
            'discount' => $post['discount'],
            'subtotal' => $post['subtotal']
        ];
        $this->db->where('detail_id', $post['id']);
        $this->db->update('detail', $data);
    }

    public function deleteItem($id)
    {
        $this->db->where('detail_id', $id);
        $this->db->delete('detail');
    }
}