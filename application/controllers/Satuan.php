<?php
class Satuan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    notLogin();
    $this->load->model('satuanmod');
  }
  public function index()
  {
    $data['satuans'] = $this->satuanmod->getsatuan();
    $this->template->load('template', 'satuan/data', $data);
  }
  public function tambah()
  {
    $satuan = new stdClass();
    $satuan->id_satuan = null;
    $satuan->satuan = null;
    $data = [
      'page' => 'tambah',
      'row' => $satuan
    ];
    $this->template->load('template', 'satuan/form', $data);
  }
  public function edit($id)
  {
    $query = $this->satuanmod->getsatuan($id);
    if ($query->num_rows() > 0) {
      $satuan = $query->row();
      $data = [
        'page' => 'edit',
        'row' => $satuan
      ];
      $this->template->load('template', 'satuan/form', $data);
    } else {
      $this->session->set_flashdata('warning', 'Data tidak ditemukan');
      redirect('satuan');
    }
  }
  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($post['tambah'])) {

      $this->satuanmod->tambah($post);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'ditambahkan');
      }
      redirect('satuan');
    } else if (isset($post['edit'])) {

      $this->satuanmod->edit($post['id_satuan']);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'diubah');
      }
      redirect('satuan');
    }
  }
  public function hapus($id)
  {
    $this->satuanmod->hapus($id);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
      redirect('satuan');
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'dihapus');
    }
    redirect('satuan');
  }
}
