<?php 
class Costumer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model('costumer_m');
    }
    public function index()
    {
        $data['allcostumer'] = $this->costumer_m->getCostumer();
        $this->template->load('template', 'costumer/costumerData', $data);
    }
    public function tes()
    {
        $this->load->view('costumer/tes');
    }
    public function add()
    {
        $costumer = new stdClass();
        $costumer->costumer_id = null;
        $costumer->name = null;
        $costumer->gender = '';
        $costumer->phone = null;
        $costumer->address = null;
        $data = [
            'page' => 'add', 
            'row' => $costumer
        ];
        $this->template->load('template', 'costumer/costumerForm', $data);
    }
    public function edit($id)
    {
        $query = $this->costumer_m->getCostumer($id);
        if ($query->num_rows() > 0) {
            $costumer = $query->row();
            $data = [
                'page' => 'edit',
                'row'=> $costumer
            ];
            $this->template->load('template', 'costumer/costumerForm', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data tidak ditemukan');
            redirect('costumer');
        }
    }
    public function process()
    {
        $post = $this->input->post(null,true);
        if (isset($post['add'])) {

            $this->costumer_m->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
                redirect('costumer');
            }

        } else if (isset($post['edit'])) {
        
            $this->costumer_m->edit($post['costumer_id']);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'diubah');
                redirect('costumer');
            }
        }
    }
    public function del($id)
    {
        $this->costumer_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'dihapus');
            redirect('costumer');
        }
    }
}