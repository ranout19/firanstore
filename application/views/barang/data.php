<div class="page-header">
  <div class="row align-items-end mx-0" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);">
    <div class="col-lg-8">
      <div class="page-header-title">
        <i class="ik ik-package"></i>
        <div class="d-inline">
          <h5>Barang</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= base_url('dashboard') ?>"><i class="ik ik-home"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Barang</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="flashdatawarning" data-flashdata="<?= $this->session->flashdata('warning') ?>"></div>
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
    <div class="card">
      <div class="card-header">
        <h3>Data Barang</h3><a href="<?= site_url('barang/tambah') ?>" style="position: absolute; right: 20px; padding: 10px;" class="badge badge-blue text-white"><i class="ik ik-plus" style="font-weight: 1000;"></i> Tambah</a>
      </div>
      <div class="card-body">
        <table id="data_table_barang" class="table table-hover w-100">
          <thead>
            <tr>
              <th style="border:none;" class="sorting_disable">No</th>
              <th style="border:none;">Gambar</th>
              <th style="border:none;">Kode</th>
              <th style="border:none;">Nama</th>
              <th style="border:none;">Stok</th>
              <th style="border:none; float: right; margin-right: 30px;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($barangs->result() as $barang) {
            ?>
              <tr>
                <td style="width: 6%;padding-left: 20px;"><?= $no++ ?></td>
                <td><img width="60px" style="border-radius: 4px;" src="<?= base_url('uploads/' . $barang->gambar) ?>" alt=""></td>
                <td><?= $barang->kode_barang ?></td>
                <td><?= $barang->nama ?></td>
                <td><?= $barang->stok . ' ' . $barang->satuan ?></td>
                <td>
                  <div class="d-flex justify-content-center" style="gap: 3px">
                    <a type="button" data-toggle="modal" data-target="#modal-detail" data-id="<?= $barang->id_barang ?>" data-nama="<?= $barang->nama ?>" data-kode_barang="<?= $barang->kode_barang ?>" data-satuan="<?= $barang->satuan ?>" data-stok="<?= $barang->stok ?>" data-grup="<?= $barang->grup ?>" data-sub_grup="<?= $barang->sub_grup ?>" data-label="<?= $barang->label ?>" data-nickname="<?= $barang->nickname ?>" class="btn btn-sm btn-warning detail-barang" style="padding: 5px 6px 6px 6px; background: #19B5FE; border-color: #19B5FE;"><i class="ik ik-info text-white" style="margin-right: -1px !important;"></i></a>
                    <a href="<?= site_url('barang/edit/' . $barang->id_barang) ?>" class="btn btn-sm btn-warning" style="padding: 5px 6px 6px 6px; background: #ffc800; border-color: #ffc800;"><i class="ik ik-edit text-white" style="margin-right: -1px !important;"></i></a>
                    <a href="<?= site_url('barang/hapus/' . $barang->id_barang) ?>" class="hapus btn btn-sm btn-danger" style="padding: 5px 6px 6px 6px;"><i class="ik ik-trash-2 text-white" style="margin-right: -1px !important;"></i></a>
                  </div>
                </td>
              </tr>
            <?php  }
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
          <div class="col-md-7">
            <table class="table" style="border: none;">
              <tbody>
                <tr>
                  <th>Kode Barang</th>
                  <td><span id="kode_barang"></span></td>
                </tr>
                <tr>
                  <th>Nama Barang</th>
                  <td><span id="nama"></span></td>
                </tr>
                <tr>
                  <th>Label</th>
                  <td><span id="label"></span></td>
                </tr>
                <tr>
                  <th>Nickname</th>
                  <td><span id="nickname"></span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-5">
            <table class="table" style="border: none;">
              <tbody>
                <tr>
                  <th>Group</th>
                  <td><span id="grup"></span></td>
                </tr>
                <tr>
                  <th>Sub Group</th>
                  <td><span id="sub_grup"></span></td>
                </tr>
                <tr>
                  <th>Satuan</th>
                  <td><span id="satuan"></span></td>
                </tr>
                <tr>
                  <th>Jumlah</th>
                  <td><span id="stok"></span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-12 px-4 inventory">
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
    $('#label').text(': ' + $(this).data('label'))
    $('#nickname').text(': ' + $(this).data('nickname'))
    $('#grup').text(': ' + $(this).data('grup'))
    $('#sub_grup').text(': ' + $(this).data('sub_grup'))
    $('#satuan').text(': ' + $(this).data('satuan'))
    $('#stok').text(': ' + $(this).data('stok'))
    let id = $(this).data('id')

    $.ajax({
      url: '<?= site_url('barang/detail/') ?>' + id,
      success: function(result) {
        $('.inventory').html(result)
      }
    })
  })
</script>
<script>
  $(document).ready(function() {
    $('#data_table_barang').DataTable({
      scrollX: true,
      "columnDefs": [{
          "targets": [5],
          "orderable": false
        },
        {
          "targets": [0, 4, 5],
          "className": 'text-center'
        }
      ]
    })
  })
</script>