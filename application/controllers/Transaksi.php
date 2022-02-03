<?php
class Transaksi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    notLogin();
    $this->load->model('stokmod');
  }
  public function index()
  {
    $data['transaksi'] = $this->stokmod->getStok();
    $this->template->load('template', 'transaksi/data', $data);
  }
}
