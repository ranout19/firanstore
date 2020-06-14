<?php 
class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model('supplier_m');
    }
    public function index()
    {
        $data['allsupplier'] = $this->supplier_m->getsupplier();
        $this->template->load('template', 'supplier/supplierData', $data);
    }
    public function add()
    {
        $supplier = new stdClass();
        $supplier->supplier_id = null;
        $supplier->name = null;
        $supplier->phone = null;
        $supplier->address = null;
        $supplier->description = null;
        $data = [
            'page' => 'add',
            'row' => $supplier
        ];
        $this->template->load('template', 'supplier/supplierForm', $data);
    }
    public function edit($id)
    {
        $query = $this->supplier_m->getsupplier($id);
        if ($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = [
                'page' => 'edit',
                'row'=> $supplier
            ];
            $this->template->load('template', 'supplier/supplierForm', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data tidak ditemukan');
            redirect('supplier');
        }
    }
    public function process()
    {
        $post = $this->input->post(null,true);
        if (isset($post['add'])) {

            $this->supplier_m->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
            }
            redirect('supplier');

        } else if (isset($post['edit'])) {
            
            $this->supplier_m->edit($post['supplier_id']);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'diubah');
            }
            redirect('supplier');

        }

    }
    public function del($id)
    {
        $this->supplier_m->del($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
            redirect('supplier');
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'dihapus');
            redirect('supplier');
        }
    }
}