<?php
class Qrcode extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    notLogin();
    $this->load->model('qrcodemod');
  }
  public function index()
  {
    $data['qrcodes'] = $this->qrcodemod->getqrcode();
    $this->template->load('template', 'qrcode/data', $data);
  }
  public function tambah()
  {
    $qrcode = new stdClass();
    $qrcode->id_qrcode = null;
    $qrcode->qrcode = null;
    $qrcode->sub_qrcode = null;
    $data = [
      'page' => 'tambah',
      'row' => $qrcode
    ];
    $this->template->load('template', 'qrcode/form', $data);
  }
  public function edit($id)
  {
    $query = $this->qrcodemod->getqrcode($id);
    if ($query->num_rows() > 0) {
      $qrcode = $query->row();
      $data = [
        'page' => 'edit',
        'row' => $qrcode
      ];
      $this->template->load('template', 'qrcode/form', $data);
    } else {
      $this->session->set_flashdata('warning', 'Data tidak ditemukan');
      redirect('qrcode');
    }
  }
  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($post['tambah'])) {

      $this->qrcodemod->tambah($post);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'ditambahkan');
      }
      redirect('qrcode');
    } else if (isset($post['edit'])) {

      $this->qrcodemod->edit($post['id_qrcode']);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'diubah');
      }
      redirect('qrcode');
    }
  }
  public function hapus($id)
  {
    $this->qrcodemod->hapus($id);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
      redirect('qrcode');
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'dihapus');
    }
    redirect('qrcode');
  }
}
