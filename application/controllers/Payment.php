<?php 
class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model('transaction_m');
    }
    public function index()
    {
        $post = $this->input->post(null, true);
        if (isset($post['search'])) {

            $first = $post['first'];
            $last = $post['last'];
            $data['transaction'] = $this->db->query("SELECT *, costumer.name as costumer, user.name as user FROM transaction INNER JOIN costumer ON costumer.costumer_id = transaction.costumer_id INNER JOIN user ON user.user_id = transaction.user_id WHERE transaction.date BETWEEN '$first' AND '$last'");
            $cek = $data['transaction']->num_rows();
            if ($cek == 0) {
                $this->session->set_flashdata('warning', 'Data tidak ditemukan');
                redirect('payment');
            }

        }else {
            $data['transaction'] = $this->transaction_m->getTransaction();
        }
        $this->template->load('template', 'payment', $data);
    }
    public function getItemList()
    {
        $post = $this->input->post(null, true);
        $html = '<tr><th>Item Name</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>';
        $invoice = $post['invoice'];
        $row = $this->db->query("SELECT * FROM transaction WHERE invoice = '$invoice'")->row();
        $query = $this->transaction_m->getInvoiceItem($invoice);
        foreach ($query->result() as $data) {
        	$html .= '<tr><td>'.$data->name.'</td><td>'.idr($data->price).'</td><td>'.$data->qty.'</td><td>'.idr($data->discount).'</td><td>'.idr($data->subtotal - $data->discount).'</td></tr>';
        }
        $html .= '<tr><th colspan="3" style="text-align: center;">Subtotal</th><td>'.idr($row->discount).'</td><th>'.idr($row->total).'</th></tr>';
        echo $html;
    }
}