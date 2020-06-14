<?php 

class Transaction_m extends CI_Model{

  public function getTransaction($invoice = null)
  {
    $this->db->select('transaction.*, costumer.name as costumer, user.name as user');
    $this->db->from('transaction');
    $this->db->join('costumer', 'costumer.costumer_id = transaction.costumer_id');
    $this->db->join('user', 'user.user_id = transaction.user_id');
    if ($invoice != null) {
      $this->db->where('invoice', $invoice);
    }
    $this->db->order_by('date', 'asc');
    return $this->db->get();
  }
  public function getTransactionMonth($month)
  {
    $query = $this->db->query("SELECT * FROM transaction WHERE transaction.date LIKE '%".$month."%'");
    return $query;
  }

  public function getInvoiceItem($invoice)
  {
    $this->db->from('detail');
    $this->db->join('item', 'item.item_id = detail.item_id');
    $this->db->where('invoice', $invoice);
    return $this->db->get();
  }

  public function addTransaction($post)
  {
    $data = [
      'invoice' => $post['kodeinvoice'],
      'costumer_id' => $post['costumer'],
      'discount' => $post['discount'],
      'total' => $post['totalCash'],
      'cash' => $post['cash'],
      'change' => $post['change'],
      'note' => $post['note'],
      'user_id' => $this->userlogin->user_login()->user_id
    ];
    $this->db->insert('transaction', $data);
  }
}