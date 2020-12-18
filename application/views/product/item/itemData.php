<div class="page-header">
  <div class="row align-items-end mx-0" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);">
    <div class="col-lg-8">
      <div class="page-header-title">
        <i class="ik ik-shopping-bag"></i>
        <div class="d-inline">
          <h5>Item</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= base_url('dashboard') ?>"><i class="ik ik-home"></i></a>
          </li>
          <li class="breadcrumb-item" aria-current="page">Produk</li>
          <li class="breadcrumb-item active" aria-current="page">Item</li>
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
        <h3>Data Item</h3><a href="<?= site_url('item/add') ?>" style="position: absolute; right: 20px; padding: 10px;" class="badge badge-blue text-white"><i class="ik ik-plus" style="font-weight: 1000;"></i> Tambah</a>
      </div>
      <div class="card-body">
        <table id="data_table_item" class="table table-hover w-100">
          <thead>
            <tr>
              <th style="border:none;" class="sorting_disable">No</th>
              <th style="border:none;">Kode</th>
              <th style="border:none;">Nama</th>
              <th style="border:none;">Kategori</th>
              <th style="border:none;">Satuan</th>
              <th style="border:none;">Stok</th>
              <th style="border:none;">Gudang</th>
              <th style="border:none;">Rak</th>
              <th style="border:none;">Kolom</th>
              <th style="border:none; float: right; margin-right: 20px;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($allitem->result() as $data) {
            ?>

              <tr>
                <td style="width: 6%;padding-left: 20px;"><?= $no++ ?></td>
                <td><?= $data->barcode ?></td>
                <td><?= $data->name ?></td>
                <td><?= $data->categoryname ?></td>
                <td><?= $data->unitname ?></td>
                <td><?= $data->stock ?></td>
                <td><?= $data->gudang ?></td>
                <td><?= $data->rak ?></td>
                <td><?= $data->kolom ?></td>
                <td>
                  <div class="table-actions item text-right">
                    <a href="<?= site_url('item/edit/' . $data->item_id) ?>" class="btn btn-sm btn-warning" style="display: inline-flex; padding: 8px; background: #ffc800; border-color: #ffc800;"><i class="ik ik-edit text-white" style="margin-top: -1px !important; margin-right: -1px !important;"></i></a>
                    <a href="<?= site_url('item/del/' . $data->item_id) ?>" class="hapus btn btn-sm btn-danger" style="display: inline-flex; padding: 8px;"><i class="ik ik-trash-2 text-white" style="margin-top: -1px !important; margin-right: -1px !important;"></i></a>
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
<script>
  $(document).ready(function() {
    $('#data_table_item').DataTable({
      scrollX: true,
      "columnDefs": [{
          "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
          "orderable": false
        },
        {
          "targets": [0, 5, 6, 7, 8],
          "className": 'text-center'
        }
      ]
    })
  })
</script>