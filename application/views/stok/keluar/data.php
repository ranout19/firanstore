<style type="text/css" scoped>
  .modal .table td,
  .table th {
    border-top: none;
  }
</style>
<div class="page-header">
  <div class="row align-items-end mx-0" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);">
    <div class="col-lg-8">
      <div class="page-header-title">
        <i class="ik ik-upload"></i>
        <div class="d-inline">
          <h5>Barang Keluar</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= base_url('dashboard') ?>"><i class="ik ik-home"></i></a>
          </li>
          <li class="breadcrumb-item" aria-current="page">Barang</li>
          <li class="breadcrumb-item active" aria-current="page">Keluar</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
    <div class="card">
      <div class="card-header">
        <h3>Data Barang Keluar</h3><a href="<?= site_url('stok/keluar/tambah') ?>" style="position: absolute; right: 20px; padding: 10px;" class="badge badge-blue text-white"><i class="ik ik-plus" style="font-weight: 1000;"></i> Tambah</a>
      </div>
      <div class="card-body">
        <table id="data_table_barang_keluar" class="table table-hover w-100">
          <thead>
            <tr>
              <th class="nosort" style="border:none;">No</th>
              <th class="nosort" style="border:none;">ID Transaksi</th>
              <th class="nosort" style="border:none;">Tanggal</th>
              <th class="nosort" style="border:none;">Nama Barang</th>
              <th class="nosort" style="border:none;">Jumlah</th>
              <th class="nosort" style="border:none;">User</th>
              <th class="nosort" style="border:none;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($stok_keluar->result() as $keluar) {
            ?>
              <tr>
                <td style="width: 6%;padding-left: 20px;"><?= $no++ ?></td>
                <td><?= $keluar->kode ?></td>
                <td><?= date('d M Y', strtotime($keluar->tanggal)) ?></td>
                <td><?= $keluar->nama ?></td>
                <td><?= $keluar->qty . ' ' . $keluar->satuan ?></td>
                <td><?= ucfirst($keluar->username) ?></td>
                <td>
                  <div class="d-flex justify-content-center" style="gap: 3px">
                    <a type="button" data-toggle="modal" data-target="#modal-detail" data-id="<?= $keluar->id_barang ?? '-' ?>" data-nama="<?= $keluar->nama ?? '-' ?>" data-kode_barang="<?= $keluar->kode_barang ?? '-' ?>" data-satuan="<?= $keluar->satuan ?? '-' ?>" data-stok="<?= $keluar->stok ?? '-' ?>" data-grup="<?= $keluar->grup ?? '-' ?>" data-sub_grup="<?= $keluar->sub_grup ?? '-' ?>" data-label="<?= $keluar->label ?? '-' ?>" data-nickname="<?= $keluar->nickname ?? '-' ?>" data-tanggal="<?= date('d M Y', strtotime($keluar->tanggal)) ?? '-' ?>" data-id_transaksi="<?= $keluar->kode ?? '-' ?>" data-notes="<?= $keluar->notes ?? '-' ?>" data-user="<?= ucfirst($keluar->username) ?>" class="btn btn-sm btn-warning detail-barang" style="padding: 5px 6px 6px 6px; background: #19B5FE; border-color: #19B5FE;"><i class="ik ik-info text-white" style="margin-right: -1px !important;"></i></a>
                    <a href="<?= site_url('stok/keluar/hapus/' . $keluar->id_stok . '/' . $keluar->id_barang) ?>" class="hapus btn btn-sm btn-danger" style="padding: 5px 6px 6px 6px;"><i class="ik ik-trash-2 text-white" style="margin-right: -1px !important;"></i></a>
                  </div>
                </td>
              </tr>
            <?php   }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="demoModalLabel">Detail</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <table class="table" style="border: none;">
              <tbody>
                <tr>
                  <th>ID Transaksi</th>
                  <td><span id="id_transaksi"></span></td>
                </tr>
                <tr>
                  <th>Tanggal</th>
                  <td><span id="tanggal"></span></td>
                </tr>
                <tr>
                  <th>Nama Barang</th>
                  <td><span id="nama"></span></td>
                </tr>
                <tr>
                  <th>Group</th>
                  <td><span id="grup"></span></td>
                </tr>
                <tr>
                  <th>Sub Group</th>
                  <td><span id="sub_grup"></span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table" style="border: none;">
              <tbody>
                <tr>
                  <th>Jumlah</th>
                  <td><span id="stok"></span></td>
                </tr>
                <tr>
                  <th>Notes</th>
                  <td><span id="notes"></span></td>
                </tr>
                <tr>
                  <th>User</th>
                  <td><span id="user"></span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).on('click', '.detail-barang', function() {
    $('#kode_barang').text(': ' + $(this).data('kode_barang'))
    $('#nama').text(': ' + $(this).data('nama'))
    $('#grup').text(': ' + $(this).data('grup'))
    $('#sub_grup').text(': ' + $(this).data('sub_grup'))
    $('#stok').text(': ' + $(this).data('stok') + ' ' + $(this).data('satuan'))
    $('#id_transaksi').text(': ' + $(this).data('id_transaksi'))
    $('#tanggal').text(': ' + $(this).data('tanggal'))
    $('#notes').text(': ' + $(this).data('notes'))
    $('#user').text(': ' + $(this).data('user'))

  })
</script>
<script>
  $(document).ready(function() {
    $('#data_table_barang_keluar').DataTable({
      scrollX: true,
      "columnDefs": [{
          "targets": [6],
          "orderable": false
        },
        {
          "targets": [0, 4, 6],
          "className": 'text-center'
        }
      ]
    })
  })
</script>