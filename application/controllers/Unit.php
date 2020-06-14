<?php 
class Unit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model('unit_m');
    }
    public function index()
    {
        $data['allunit'] = $this->unit_m->getUnit();
        $this->template->load('template', 'product/unit/unitData', $data);
    }
    public function add()
    {
        $unit = new stdClass();
        $unit->unit_id = null;
        $unit->name = null;
        $data = [
            'page' => 'add',
            'row' => $unit
        ];
        $this->template->load('template', 'product/unit/unitForm', $data);
    }
    public function edit($id)
    {
        $query = $this->unit_m->getUnit($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $data = [
                'page' => 'edit',
                'row'=> $unit
            ];
            $this->template->load('template', 'product/unit/unitForm', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data tidak ditemukan');
            redirect('unit');
        }
    }
    public function process()
    {
        $post = $this->input->post(null,true);
        if (isset($post['add'])) {

            $this->unit_m->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
            }
            redirect('unit');

        } else if (isset($post['edit'])) {
            
            $this->unit_m->edit($post['unit_id']);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'diubah');
            }
            redirect('unit');

        }

    }
    public function del($id)
    {
        $this->unit_m->del($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
            redirect('unit');
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('unit');
    }
}