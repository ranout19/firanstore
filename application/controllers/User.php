<?php 
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model('user_m');
    }
    public function index()
    {
        $data['alluser'] = $this->user_m->getUser();
        $this->template->load('template', 'user/userData', $data);
    }
    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'Name', 'required|is_unique[user.name]');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passwordconf', 'Konfirmasi password', 'required|matches[password]', array('matches' => '%s tidak sesuai'));
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_message('min_length', '%s minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '%s ini sudah dipakai');
        if ($this->form_validation->run() == FALSE) {   
            $this->template->load('template', 'user/userAdd');
        }else{
            $post = $this->input->post(null,true);
            $this->user_m->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
                redirect('user');
            }
        }
    }
    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_usernameCheck');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passwordconf', 'Konfirmasi password', 'required|matches[password]', array('matches' => '%s tidak sesuai'));
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_message('min_length', '%s minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '%s ini sudah dipakai');
        if ($this->form_validation->run() == FALSE) { 
            $query = $this->user_m->getUser($id); 
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'user/userEdit', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data tidak ditemukan');
                redirect('user');
            } 
        }else{
            $this->user_m->edit($id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'diubah');
                redirect('user');
            }
        }
    }
    function usernameCheck()
    {
        $post = $this->input->post(null,true);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('usernameCheck', '%s ini sudah dipakai');
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function del($id)
    {
        if ($this->userlogin->user_login()->user_id == $id) {
            $this->session->set_flashdata('userfail', 'User sedang digunakan');
            redirect('user');
        }
        $this->user_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'dihapus');
                redirect('user');
        }
    }
}