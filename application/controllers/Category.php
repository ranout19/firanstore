<?php 
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model('category_m');
    }
    public function index()
    {
        $data['allcategory'] = $this->category_m->getCategory();
        $this->template->load('template', 'product/category/categoryData', $data);
    }
    public function add()
    {
        $category = new stdClass();
        $category->category_id = null;
        $category->name = null;
        $data = [
            'page' => 'add',
            'row' => $category
        ];
        $this->template->load('template', 'product/category/categoryForm', $data);
    }
    public function edit($id)
    {
        $query = $this->category_m->getCategory($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = [
                'page' => 'edit',
                'row'=> $category
            ];
            $this->template->load('template', 'product/category/categoryForm', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data tidak ditemukan');
            redirect('category');
        }
    }
    public function process()
    {
        $post = $this->input->post(null,true);
        if (isset($post['add'])) {

            $this->category_m->add($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
            }
            redirect('category');

        } else if (isset($post['edit'])) {
            
            $this->category_m->edit($post['category_id']);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'diubah');
            }
            redirect('category');
        }        
    }
    public function del($id)
    {
        $this->category_m->del($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
            redirect('category');
        }
        if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('category');
    }
}