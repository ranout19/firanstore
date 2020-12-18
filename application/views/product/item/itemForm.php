<div class="row">
  <div class="col-md-12">
    <?php $this->view('flashdata') ?>
    <div class="card">
      <div class="card-header">
        <h3><?= $page == 'add' ? 'Tambah' : 'Edit' ?> Item</h3><a href="<?= site_url('item') ?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Kembali</a>
      </div>
      <div class="card-body">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <form class="forms-sample" action="<?= site_url('item/process') ?>" method="post" enctype="multipart/form-data">
              <?php if ($page == 'edit') { ?>
                <input type="hidden" name="item_id" value="<?= $row->item_id ?>">
              <?php } ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="barcode">Kode</label>
                    <input type="text" value="<?= $row->barcode == null ? 'item' . date('his') : $row->barcode ?>" class="form-control" id="barcode" name="barcode" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="itemname">Nama Item</label>
                    <input type="text" value="<?= $row->name ?>" class="form-control" id="itemname" name="itemname" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="category" class="form-control select2" required>
                      <option disabled <?= $page == 'add' ? 'selected' : null ?>>- Pilih -</option>
                      <?php foreach ($categorydata->result() as $category) { ?>
                        <option value="<?= $category->category_id ?>" <?= $category->category_id == $row->category_id ? 'selected' : null ?>><?= $category->name ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Satuan</label>
                    <select name="unit" class="form-control select2" required>
                      <option disabled <?= $page == 'add' ? 'selected' : null ?>>- Pilih -</option>
                      <?php foreach ($unitdata->result() as $unit) { ?>
                        <option value="<?= $unit->unit_id ?>" <?= $unit->unit_id == $row->unit_id ? 'selected' : null ?>><?= $unit->name ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="gudang">Gudang</label>
                    <input type="text" value="<?= $row->gudang ?>" class="form-control" id="gudang" name="gudang" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="rak">Rak</label>
                    <input type="text" value="<?= $row->rak ?>" class="form-control" id="rak" name="rak" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="kolom">kolom</label>
                    <input type="text" value="<?= $row->kolom ?>" class="form-control" id="kolom" name="kolom" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="detail">Detail</label>
                    <textarea class="form-control" id="detail" name="detail" required><?= $row->detail ?></textarea>
                  </div>
                </div>
              </div>
              <button type="submit" name="<?= $page ?>" class="badge badge-green text-white mr-2" style="border: none; padding: 10px 14px;"><i class="ik ik-send" style="font-weight: 1000;"></i> Simpan</button>
              <button type="reset" style="border: none; padding: 10px 14px;" class="badge badge-light">Batal</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>