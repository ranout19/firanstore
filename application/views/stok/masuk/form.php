<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Tambah Barang Masuk</h3><a href="<?= site_url('stok/masuk') ?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Kembali</a>
      </div>
      <div class="card-body">
        <div class="row justify-content-center">
          <div class="col-md-11">
            <form class="forms-sample" action="<?= site_url('stok/proses') ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="datepicker">ID Transaksi</label>
                    <input type="text" name="kode" value="<?= $kode ?>" class="form-control datetimepicker-input" readonly>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="datepicker">Tanggal</label>
                    <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control datetimepicker-input" id="datepicker" data-toggle="datepicker" data-target="#datepicker">
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="datepicker">User</label>
                    <input type="text" name="user_id" value="<?= ucfirst($this->userlogin->user_login()->username) ?>" class="form-control" id="user_id" readonly>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <div class="input-group input-group-button">
                      <input type="hidden" name="id_barang" id="id_barang">
                      <input type="text" id="kode_barang" class="form-control" required readonly>
                      <div class="input-group-append">
                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modal-barang"><i class="ik ik-search" style="font-weight: 1000; font-size: 17px; margin-right: -1px;"></i></button>
                      </div>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="itemname">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required readonly>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="stock">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="-" required readonly>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="box_type">Box Type</label>
                    <select name="box_type" class="form-control select2" required>
                      <option disabled selected>- Pilih -</option>
                      <?php foreach ($box_types->result() as $box_type) { ?>
                        <option value="<?= $box_type->box_type ?>"><?= $box_type->box_type ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="box_number">Box Number</label>
                    <select name="box_number" class="form-control select2" required>
                      <option disabled selected>- Pilih -</option>
                      <?php foreach ($box_numbers->result() as $box_number) { ?>
                        <option value="<?= $box_number->box_number ?>"><?= $box_number->box_number ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="gudang">Gudang</label>
                    <select name="id_gudang" class="form-control select2" required>
                      <option disabled selected>- Pilih -</option>
                      <?php foreach ($gudangs as $gudang) { ?>
                        <option value="<?= $gudang->id_gudang ?>"><?= $gudang->gudang ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="vendor">Vendor</label>
                    <input type="text" class="form-control" id="vendor" name="vendor" value="-">
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="footprint">Footprint</label>
                    <input type="text" class="form-control" id="footprint" name="footprint" value="-">
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="invoice">Invoice</label>
                    <input type="text" class="form-control" id="invoice" name="invoice" value="">
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <select name="supplier" class="form-control select2" required>
                      <option disabled selected>- Pilih -</option>
                      <?php foreach ($suppliers->result() as $supplier) { ?>
                        <option value="<?= $supplier->supplier ?>"><?= $supplier->supplier ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="marketplace">Market Place</label>
                    <select name="marketplace" class="form-control select2" required>
                      <option disabled selected>- Pilih -</option>
                      <?php foreach ($marketplaces->result() as $marketplace) { ?>
                        <option value="<?= $marketplace->marketplace ?>"><?= $marketplace->marketplace ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                  </div>
                  <hr>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="number" class="form-control" id="qty" name="qty" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" style="resize: vertical;" required></textarea>
                  </div>
                </div>
              </div>
              <button type="submit" name="barang_masuk" class="badge badge-green text-white mr-2" style="border: none; padding: 10px 14px;"><i class="ik ik-send" style="font-weight: 1000;"></i> Simpan</button>
              <button type="reset" style="border: none; padding: 10px 14px;" class="badge badge-light">Batal</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-barang" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="demoModalLabel">Pilih Barang</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body table-responsive">
        <table id="data_table_barang_masuk" class="table table-hover w-100">
          <thead>
            <tr>
              <th class="nosort" style="border:none;">Kode Barang</th>
              <th class="nosort" style="border:none;">Nama Barang</th>
              <th class="nosort" style="border:none;">Satuan</th>
              <th class="nosort" style="border:none;">Stok</th>
              <th class="nosort" style="border:none;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($barangs as $i => $barang) { ?>
              <tr>
                <td><?= $barang->kode_barang ?></td>
                <td><?= $barang->nama ?></td>
                <td><?= $barang->satuan ?></td>
                <td><?= $barang->stok ?></td>
                <td>
                  <a href="" class="badge badge-info text-white select-barang" data-id="<?= $barang->id_barang ?>" data-kode_barang="<?= $barang->kode_barang ?>" data-nama="<?= $barang->nama ?>" data-stok="<?= $barang->stok ?>">Pilih</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#data_table_barang_masuk').DataTable({
      scrollX: true,
      "columnDefs": [{
          "targets": [0, 1, 2, 3, 4],
          "orderable": false
        },
        {
          "targets": [2, 3, 4],
          "className": 'text-center'
        }
      ]
    })
  })
  $(document).on('click', '.select-barang', function(e) {
    e.preventDefault()
    var id_barang = $(this).data('id');
    var kode_barang = $(this).data('kode_barang');
    var nama = $(this).data('nama');
    var stok = $(this).data('stok');

    $('#id_barang').val(id_barang);
    $('#kode_barang').val(kode_barang);
    $('#nama_barang').val(nama);
    $('#stok').val(stok);

    $('#modal-barang').modal('hide');
  })
</script>