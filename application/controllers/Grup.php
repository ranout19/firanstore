<?php
class Grup extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    notLogin();
    $this->load->model('grupmod');
  }
  public function index()
  {
    $data['grups'] = $this->grupmod->getGrup();
    $this->template->load('template', 'grup/data', $data);
  }
  public function tambah()
  {
    $grup = new stdClass();
    $grup->id_grup = null;
    $grup->grup = null;
    $grup->sub_grup = null;
    $data = [
      'page' => 'tambah',
      'row' => $grup
    ];
    $this->template->load('template', 'grup/form', $data);
  }
  public function edit($id)
  {
    $query = $this->grupmod->getGrup($id);
    if ($query->num_rows() > 0) {
      $grup = $query->row();
      $data = [
        'page' => 'edit',
        'row' => $grup
      ];
      $this->template->load('template', 'grup/form', $data);
    } else {
      $this->session->set_flashdata('warning', 'Data tidak ditemukan');
      redirect('grup');
    }
  }
  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($post['tambah'])) {

      $this->grupmod->tambah($post);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'ditambahkan');
      }
      redirect('grup');
    } else if (isset($post['edit'])) {

      $this->grupmod->edit($post['id_grup']);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'diubah');
      }
      redirect('grup');
    }
  }
  public function hapus($id)
  {
    $this->grupmod->hapus($id);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
      redirect('grup');
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'dihapus');
    }
    redirect('grup');
  }
}
