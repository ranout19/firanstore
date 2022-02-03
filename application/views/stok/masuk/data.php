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
        <i class="ik ik-download"></i>
        <div class="d-inline">
          <h5>Barang Masuk</h5>
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
          <li class="breadcrumb-item active" aria-current="page">Masuk</li>
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
        <h3>Data Barang Masuk</h3><a href="<?= site_url('stok/masuk/tambah') ?>" style="position: absolute; right: 20px; padding: 10px;" class="badge badge-blue text-white"><i class="ik ik-plus" style="font-weight: 1000;"></i> Tambah</a>
      </div>
      <div class="card-body">
        <table id="data_table_barang_masuk" class="table table-hover w-100">
          <thead>
            <tr>
              <th class="nosort" style="border:none;">No</th>
              <th class="nosort" style="border:none;">ID Transaksi</th>
              <th class="nosort" style="border:none;">Tanggal</th>
              <th class="nosort" style="border:none;">Nama Barang</th>
              <th class="nosort" style="border:none;">Jumlah</th>
              <th class="nosort" style="border:none;">User</th>
              <th class="nosort" style="border:none; float: right;margin-right: 15px;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($stok_masuk->result() as $masuk) {
            ?>
              <tr>
                <td style="width: 6%;padding-left: 20px;"><?= $no++ ?></td>
                <td><?= $masuk->kode ?></td>
                <td><?= date('d M Y', strtotime($masuk->tanggal)) ?></td>
                <td><?= $masuk->nama ?></td>
                <td><?= $masuk->qty . ' ' . $masuk->satuan ?></td>
                <td><?= ucfirst($masuk->username) ?></td>
                <td>
                  <div class="d-flex justify-content-center" style="gap: 3px">
                    <a type="button" data-toggle="modal" data-target="#modal-detail" data-id="<?= $masuk->id_barang ?? '-' ?>" data-nama="<?= $masuk->nama ?? '-' ?>" data-kode_barang="<?= $masuk->kode_barang ?? '-' ?>" data-satuan="<?= $masuk->satuan ?? '-' ?>" data-stok="<?= $masuk->stok ?? '-' ?>" data-grup="<?= $masuk->grup ?? '-' ?>" data-sub_grup="<?= $masuk->sub_grup ?? '-' ?>" data-label="<?= $masuk->label ?? '-' ?>" data-nickname="<?= $masuk->nickname ?? '-' ?>" data-box_number="<?= $masuk->box_number ?? '-' ?>" data-box_type="<?= $masuk->box_type ?? '-' ?>" data-gudang="<?= $masuk->gudang ?? '-' ?>" data-tanggal="<?= date('d M Y', strtotime($masuk->tanggal)) ?? '-' ?>" data-id_transaksi="<?= $masuk->kode ?? '-' ?>" data-invoice="<?= $masuk->invoice ?? '-' ?>" data-price="<?= $masuk->price ?? '-' ?>" data-vendor="<?= $masuk->vendor ?? '-' ?>" data-marketplace="<?= $masuk->marketplace ?? '-' ?>" data-supplier="<?= $masuk->supplier ?? '-' ?>" data-notes="<?= $masuk->notes ?? '-' ?>" data-footprint="<?= $masuk->footprint ?? '-' ?>" data-price="<?= $masuk->price ?? '-' ?>" data-user="<?= ucfirst($masuk->username) ?>" class="btn btn-sm btn-warning detail-barang" style="padding: 5px 6px 6px 6px; background: #19B5FE; border-color: #19B5FE;"><i class="ik ik-info text-white" style="margin-right: -1px !important;"></i></a>
                    <a href="<?= site_url('stok/masuk/hapus/' . $masuk->id_stok . '/' . $masuk->id_barang) ?>" class="hapus btn btn-sm btn-danger" style="padding: 5px 6px 6px 6px;"><i class="ik ik-trash-2 text-white" style="margin-right: -1px !important;"></i></a>
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
                  <th>Footprint</th>
                  <td><span id="footprint"></span></td>
                </tr>
                <tr>
                  <th>Group</th>
                  <td><span id="grup"></span></td>
                </tr>
                <tr>
                  <th>Sub Group</th>
                  <td><span id="sub_grup"></span></td>
                </tr>
                <tr>
                  <th>Box Type</th>
                  <td><span id="box_type"></span></td>
                </tr>
                <tr>
                  <th>Box Number</th>
                  <td><span id="box_number"></span></td>
                </tr>
                <tr>
                  <th>Gudang</th>
                  <td><span id="gudang"></span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table" style="border: none;">
              <tbody>
                <tr>
                  <th>Invoice</th>
                  <td><span id="invoice"></span></td>
                </tr>
                <tr>
                  <th>Market Place</th>
                  <td><span id="marketplace"></span></td>
                </tr>
                <tr>
                  <th>Supplier</th>
                  <td><span id="supplier"></span></td>
                </tr>
                <tr>
                  <th>Vendor</th>
                  <td><span id="vendor"></span></td>
                </tr>
                <tr>
                  <th>Jumlah</th>
                  <td><span id="stok"></span></td>
                </tr>
                <tr>
                  <th>Price</th>
                  <td><span id="price"></span></td>
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
    $('#box_type').text(': ' + $(this).data('box_type'))
    $('#box_number').text(': ' + $(this).data('box_number'))
    $('#gudang').text(': ' + $(this).data('gudang'))
    $('#id_transaksi').text(': ' + $(this).data('id_transaksi'))
    $('#tanggal').text(': ' + $(this).data('tanggal'))
    $('#footprint').text(': ' + $(this).data('footprint'))
    $('#price').text(': ' + $(this).data('price'))
    $('#vendor').text(': ' + $(this).data('vendor'))
    $('#invoice').text(': ' + $(this).data('invoice'))
    $('#supplier').text(': ' + $(this).data('supplier'))
    $('#marketplace').text(': ' + $(this).data('marketplace'))
    $('#notes').text(': ' + $(this).data('notes'))
    $('#user').text(': ' + $(this).data('user'))

  })
</script>
<script>
  $(document).ready(function() {
    $('#data_table_barang_masuk').DataTable({
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