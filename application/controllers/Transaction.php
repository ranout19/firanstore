<?php 
class Transaction extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model(['item_m', 'supplier_m', 'stock_m', 'costumer_m', 'transaction_m']);
    }
	public function index()
	{
        $date = date('y-m-d');
        $sql = $this->db->query("SELECT * FROM transaction WHERE transaction.date = '$date'");
        $cek = $sql->num_rows();
        if ($cek > 0) {
            $no = $cek + 1;
            $urut = sprintf("%'.04d", $no);
        }else{
            $urut = "0001";
        }
        $data['kode'] = "FR".date('ymd').$urut;
		$data['item'] = $this->item_m->getItem()->result();
		$data['costumer'] = $this->costumer_m->getCostumer()->result();
		$this->template->load('template', 'transaction', $data);
	}

    public function getItem()
    {
        $date = date('y-m-d');
        $sql = $this->db->query("SELECT * FROM transaction WHERE transaction.date = '$date'");
        $cek = $sql->num_rows();
        if ($cek > 0) {
            $no = $cek + 1;
            $urut = sprintf("%'.04d", $no);
        }else{
            $urut = "0001";
        }
        $invoice = "FR".date('ymd').$urut;
        $sql = $this->db->query("SELECT * FROM detail INNER JOIN item ON item.item_id = detail.item_id WHERE detail.invoice = '$invoice'")->result();
        if ($sql > 0) {
            $html = '';
            $no = 1;
            foreach ($sql as $result) {
                $html .= '<tr><td>'.$no++.'</td><td>'.$result->barcode.'</td><td>'.$result->name.'</td><td>'.idr($result->price).'</td><td>'.$result->qty.'</td><td>'.idr($result->discount).'</td><td>'.idr($result->subtotal - $result->discount).'</td><td><div class="table-actions float-right"><a class="btn btn-sm btn-warning" style="width: 33px; margin-left: 0px; background: #ffc800; border-color: #ffc800;" type="button" data-toggle="modal" id="editItem" data-target="#modal-edit" data-id="'.$result->detail_id.'" data-qty="'.$result->qty.'" data-itemid="'.$result->item_id.'" data-name="'.$result->name.'" data-discount="'.$result->discount.'" data-price="'.$result->price.'" data-subtotal="'.$result->subtotal.'"><i class="ik ik-edit-2 text-white" style="position: absolute;right: 61px;"></i></a><a class="hapus btn btn-sm btn-danger" style="width: 33px; margin-left: 4px;" id="deleteItem" data-id="'.$result->detail_id.'" data-qty="'.$result->qty.'" data-itemid="'.$result->item_id.'"><i class="ik ik-x text-white" style="position: absolute;right: 25px;font-weight:1000"></i></a></div></td></tr>';
            }
        }else{
            $html .= '<tr></tr>';
        }
        echo $html;
    }

    public function getModalItem()
    {
        $sql = $this->item_m->getItem()->result();
        $html = '';
        $no = 1;
        foreach ($sql as $data) {
            $html .= '<tr><td>'.$data->barcode.'</td><td>'.$data->name.'</td><td>'.$data->unitname.'</td><td>'.idr($data->price).'</td><td>'.$data->stock.'</td><td><button type="button" class="btn btn-small btn-info" id="select" data-barcode="'.$data->barcode.'" data-name="'.$data->name.'" data-price="'.$data->price.'" data-itemid="'.$data->item_id.'"><i class="ik ik-check-circle"></i>Select</button></td></tr>';
        }
        echo $html;
    }

	public function addItem()
	{
		$post = $this->input->post(null,true);
        $this->item_m->stockOutUpdate($post);
		$this->item_m->addItem($post);
	}

    public function updateItem()
    {
        $post = $this->input->post(null,true);
        if ($post['qty'] > $post['qtyfirst']) {
            $post['qtyupdate'] = $post['qty'];
            $post['qty'] = $post['qty'] - $post['qtyfirst'];
            $this->item_m->stockOutUpdate($post);
        }elseif ($post['qty'] < $post['qtyfirst']) {
            $post['qtyupdate'] = $post['qty'];
            $post['qty'] = $post['qtyfirst'] - $post['qty'];
            $this->item_m->stockInUpdate($post);
        }else{
            $post['qtyupdate'] = $post['qty'];
        }
        $this->item_m->updateItem($post);
    }

    public function deleteItem()
    {
        $post = $this->input->post(null,true);
        $this->item_m->stockInUpdate($post);
        $this->item_m->deleteItem($post['id']);

    }

    public function getTotal()
    {
        $date = date('y-m-d');
        $sql = $this->db->query("SELECT * FROM transaction WHERE transaction.date = '$date'");
        $cek = $sql->num_rows();
        if ($cek > 0) {
            $no = $cek + 1;
            $urut = sprintf("%'.04d", $no);
        }else{
            $urut = "0001";
        }
        $invoice = "FR".date('ymd').$urut;
        $sql = $this->db->query("SELECT * FROM detail INNER JOIN item ON item.item_id = detail.item_id WHERE detail.invoice = '$invoice'")->result();
        $total = 0;
        foreach ($sql as $result) {
            $total += $result->subtotal - $result->discount;
        }
        echo $total;
    }

    public function addTransaction() {
        $post = $this->input->post(null,true);
        $this->transaction_m->addTransaction($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('transaction', 'disimpan');
            $this->session->set_flashdata('redirect', site_url('transaction/invoice/'.$post['kodeinvoice']));
            redirect('transaction');
        }
    }

    public function invoice($invoice)
    {

        $data = [
            'row' => $this->transaction_m->getTransaction($invoice)->row(),
            'result' => $this->transaction_m->getInvoiceItem($invoice)->result()
        ];
        $this->load->view('struk',$data);
    }
}