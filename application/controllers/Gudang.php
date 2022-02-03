<?php
class Gudang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    notLogin();
    $this->load->model('gudangmod');
  }
  public function index()
  {
    $data['gudangs'] = $this->gudangmod->getgudang();
    $this->template->load('template', 'gudang/data', $data);
  }
  public function tambah()
  {
    $gudang = new stdClass();
    $gudang->id_gudang = null;
    $gudang->gudang = null;
    $data = [
      'page' => 'tambah',
      'row' => $gudang
    ];
    $this->template->load('template', 'gudang/form', $data);
  }
  public function edit($id)
  {
    $query = $this->gudangmod->getgudang($id);
    if ($query->num_rows() > 0) {
      $gudang = $query->row();
      $data = [
        'page' => 'edit',
        'row' => $gudang
      ];
      $this->template->load('template', 'gudang/form', $data);
    } else {
      $this->session->set_flashdata('warning', 'Data tidak ditemukan');
      redirect('gudang');
    }
  }
  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($post['tambah'])) {

      $this->gudangmod->tambah($post);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'ditambahkan');
      }
      redirect('gudang');
    } else if (isset($post['edit'])) {

      $this->gudangmod->edit($post['id_gudang']);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'diubah');
      }
      redirect('gudang');
    }
  }
  public function hapus($id)
  {
    $this->gudangmod->hapus($id);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
      redirect('gudang');
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'dihapus');
    }
    redirect('gudang');
  }
}
