<?php 

class Stock_m extends CI_Model
{
	public function getStockIn($id = null)
    {
        $this->db->select('stock.*, item.name as itemname, supplier.name as suppliername, item.barcode');
        $this->db->from('stock');
        $this->db->join('item', 'stock.item_id = item.item_id');
        $this->db->join('supplier', 'stock.supplier_id = supplier.supplier_id', 'left');
        if ($id != null) {
        	$this->db->where('stock_id', $id);
        }
        $this->db->where('type', 'in');
        $this->db->order_by('barcode', 'asc');
        return $this->db->get();
    }
    public function getStockOut($id = null)
    {
        $this->db->select('stock.*, item.name as itemname, supplier.name as suppliername, item.barcode');
        $this->db->from('stock');
        $this->db->join('item', 'stock.item_id = item.item_id');
        $this->db->join('supplier', 'stock.supplier_id = supplier.supplier_id', 'left');
        if ($id != null) {
        	$this->db->where('stock_id', $id);
        }
        $this->db->where('type', 'out');
        $this->db->order_by('barcode', 'asc');
        return $this->db->get();
    }
	public function stockInAdd($post)
	{
		$params = [
			'item_id' => $post['item_id'],
			'type' => 'in',
			'detail' => $post['detail'],
			'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
			'qty' => $post['qty'],
			'user_id' => $this->session->userdata('user_id')
		];
		$this->db->insert('stock', $params);
	}
	public function stockOutAdd($post)
	{
		$params = [
			'item_id' => $post['item_id'],
			'type' => 'out',
			'detail' => $post['detail'],
			'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
			'qty' => $post['qty'],
			'user_id' => $this->session->userdata('user_id')
		];
		$this->db->insert('stock', $params);
	}
	public function stockInDel($id)
	{
		$this->db->where('stock_id', $id);
		$this->db->delete('stock');
	}
	public function stockOutDel($id)
	{
		$this->db->where('stock_id', $id);
		$this->db->delete('stock');
	}
}