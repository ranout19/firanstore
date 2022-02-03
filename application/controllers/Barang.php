<?php
class Barang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    notLogin();
    $this->load->model(['barangmod', 'satuanmod', 'grupmod']);
  }
  public function index()
  {
    $data['barangs'] = $this->barangmod->getBarang();
    $this->template->load('template', 'barang/data', $data);
  }
  public function tambah()
  {
    $barang = new stdClass();
    $barang->grup = null;
    $barang->sub_grup = null;
    $barang->kode_barang = null;
    $barang->nama = null;
    $barang->label = null;
    $barang->nickname = null;
    $barang->gambar = null;
    $barang->id_grup = null;
    $barang->id_satuan = null;
    $grups = $this->db->query("SELECT * from grup group by grup");
    $sub_grups = $this->db->query("SELECT * from grup group by sub_grup");
    $satuans = $this->satuanmod->getSatuan();
    $kode_barang = $this->db->query("SELECT kode_barang from barang order by kode_barang desc limit 1")->row()->kode_barang;
    $exp = explode('RAK', $kode_barang);
    $no = (int)$exp[1] + 1;
    $kode = sprintf("%'.06d", $no);
    $data = [
      'page' => 'tambah',
      'row' => $barang,
      'grups' => $grups,
      'sub_grups' => $sub_grups,
      'kode_barang' => 'RAK' . $kode,
      'satuans' => $satuans
    ];
    $this->template->load('template', 'barang/form', $data);
  }
  public function edit($id)
  {
    $query = $this->barangmod->getBarang($id);
    if ($query->num_rows() > 0) {
      $barang = $query->row();
      $grups = $this->db->query("SELECT * from grup group by grup");
      $sub_grups = $this->db->query("SELECT * from grup group by sub_grup");
      $satuans = $this->satuanmod->getSatuan();
      $data = [
        'page' => 'edit',
        'row' => $barang,
        'grup' => $barang->grup,
        'sub_grup' => $barang->sub_grup,
        'grups' => $grups,
        'sub_grups' => $sub_grups,
        'satuans' => $satuans
      ];
      $this->template->load('template', 'barang/form', $data);
    } else {
      $this->session->set_flashdata('warning', 'Data tidak ditemukan');
      redirect('barang');
    }
  }
  public function proses()
  {
    $post = $this->input->post(null, true);
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'jpg|png|jpeg';
    $config['max_size']             = 20000;
    $config['file_name']            = $post['nama_barang'];
    $this->load->library('upload', $config);
    if (isset($post['tambah'])) {
      if (@$_FILES['gambar']['name'] != null) {
        if ($this->upload->do_upload('gambar')) {
          $cek = $this->db->query("SELECT id_grup from grup where grup = '$post[grup]' and sub_grup = '$post[sub_grup]'")->row();
          if ($cek->id_grup != '') {
            $post['id_grup'] = $cek->id_grup;
          } else {
            $this->grupmod->tambah($post);
            $row = $this->db->query("SELECT id_grup from grup where grup = '$post[grup]' and sub_grup = '$post[sub_grup]'")->row();
            $post['id_grup'] = $row->id_grup;
          }
          $this->barangmod->tambah($post);
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'ditambahkan');
          }
          redirect('barang');
        } else {
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'gagal ditambahkan');
          }
          redirect('barang');
        }
      } else {
        $cek = $this->db->query("SELECT id_grup from grup where grup = '$post[grup]' and sub_grup = '$post[sub_grup]'")->row();
        if ($cek->id_grup != '') {
          $post['id_grup'] = $cek->id_grup;
        } else {
          $this->grupmod->tambah($post);
          $row = $this->db->query("SELECT id_grup from grup where grup = '$post[grup]' and sub_grup = '$post[sub_grup]'")->row();
          $post['id_grup'] = $row->id_grup;
        }
        $post['gambar'] = 'gambar';
        $this->barangmod->tambah($post);
        if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'ditambahkan');
        }
        redirect('barang');
      }
    } else if (isset($post['edit'])) {
      if (@$_FILES['gambar']['name'] != null) {
        if ($this->upload->do_upload('gambar')) {
          $cek = $this->db->query("SELECT id_grup from grup where grup = '$post[grup]' and sub_grup = '$post[sub_grup]'")->row();
          if ($cek->id_grup != '') {
            $post['id_grup'] = $cek->id_grup;
          } else {
            $this->grupmod->tambah($post);
            $row = $this->db->query("SELECT id_grup from grup where grup = '$post[grup]' and sub_grup = '$post[sub_grup]'")->row();
            $post['id_grup'] = $row->id_grup;
          }
          $barang = $this->barangmod->getBarang($post['id_barang'])->row();
          if ($barang->gambar != $this->upload->data('file_name')) {
            $replace = './uploads/' . $barang->gambar;
            unlink($replace);
          }
          $post['gambar'] = $this->upload->data('file_name');
          $this->barangmod->edit($post);
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'diubah');
          }
          redirect('barang');
        } else {
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('fail', 'gagal diubah');
          }
          redirect('barang');
        }
      } else {
        $cek = $this->db->query("SELECT id_grup from grup where grup = '$post[grup]' and sub_grup = '$post[sub_grup]'")->row();
        if ($cek->id_grup != '') {
          $post['id_grup'] = $cek->id_grup;
        } else {
          $this->grupmod->tambah($post);
          $row = $this->db->query("SELECT id_grup from grup where grup = '$post[grup]' and sub_grup = '$post[sub_grup]'")->row();
          $post['id_grup'] = $row->id_grup;
        }
        $post['gambar'] = 'gambar';
        $this->barangmod->edit($post);
        if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'berhasil diubah');
        }
        redirect('barang');
      }
    }
  }
  public function hapus($id)
  {
    $barang = $this->barangmod->getBarang($id)->row();
    if ($barang->gambar != null) {
      $replace = './uploads/' . $barang->gambar;
      unlink($replace);
    }
    $this->barangmod->hapus($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'dihapus');
    }
    redirect('barang');
  }
  public function detail($id)
  {
    $inventories = $this->db->query("SELECT box_type, box_number, gudang from stok inner join gudang on stok.id_gudang = gudang.id_gudang inner join barang on stok.id_barang = barang.id_barang where stok.id_barang = '$id' group by stok.box_number")->result();
    $string = "<table class='table'>
                <thead>
                  <tr>
                    <th>Box Type</th>
                    <th>Box Number</th>
                    <th>Gudang</th>
                  </tr>
                </thead>
                <tbody>";
    foreach ($inventories as $inventory) {
      $string .= "<tr>";
      $string .= "<td>" . $inventory->box_type . "</td>";
      $string .= "<td>" . $inventory->box_number . "</td>";
      $string .= "<td>" . $inventory->gudang . "</td>";
      $string .= "<tr>";
    }
    $string .= "</tbody>
              </table>";
    echo $string;
  }
}
