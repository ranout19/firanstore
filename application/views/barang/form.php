<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3><?= $page == 'tambah' ? 'Tambah' : 'Edit' ?> Barang</h3><a href="<?= site_url('barang') ?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Kembali</a>
      </div>
      <div class="card-body">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <form class="forms-sample" action="<?= site_url('barang/proses') ?>" method="post" enctype="multipart/form-data">
              <?php if ($page == 'edit') { ?>
                <input type="hidden" name="id_barang" value="<?= $row->id_barang ?>">
              <?php } ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" value="<?= $row->kode_barang ?? $kode_barang ?>" class="form-control" id="kode_barang" name="kode_barang">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="itemname">Nama Barang</label>
                    <input type="text" value="<?= $row->nama ?>" class="form-control" id="nama_barang" name="nama_barang" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="itemname">Label Barang</label>
                    <input type="text" value="<?= $row->label ?>" class="form-control" id="label" name="label" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="itemname">Nickname Barang</label>
                    <input type="text" value="<?= $row->nickname ?>" class="form-control" id="nickname" name="nickname" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Group</label>
                    <select name="grup" class="form-control select2" required>
                      <option disabled <?= $page == 'tambah' ? 'selected' : null ?>>- Pilih -</option>
                      <?php foreach ($grups->result() as $grup) { ?>
                        <option value="<?= $grup->grup ?>" <?= $grup->grup == $row->grup ? 'selected' : null ?>><?= $grup->grup ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Sub Group</label>
                    <select name="sub_grup" class="form-control select2" required>
                      <option disabled <?= $page == 'tambah' ? 'selected' : null ?>>- Pilih -</option>
                      <?php foreach ($sub_grups->result() as $sub_grup) { ?>
                        <option value="<?= $sub_grup->sub_grup ?>" <?= $sub_grup->sub_grup == $row->sub_grup ? 'selected' : null ?>><?= $sub_grup->sub_grup ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Satuan</label>
                    <select name="id_satuan" class="form-control select2" required>
                      <option disabled <?= $page == 'tambah' ? 'selected' : null ?>>- Pilih -</option>
                      <?php foreach ($satuans->result() as $satuan) { ?>
                        <option value="<?= $satuan->id_satuan ?>" <?= $satuan->id_satuan == $row->id_satuan ? 'selected' : null ?>><?= $satuan->satuan ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Gambar Barang</label>
                    <?php if ($row->gambar != '') { ?>
                      <br>
                      <img width="60px" style="border-radius: 4px;" src="<?= base_url('uploads/' . $row->gambar) ?>" alt="">
                    <?php } ?>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                  </div>
                </div>
              </div>
              <button type="submit" name="<?= $page ?>" class="badge badge-green mt-2 text-white mr-2" style="border: none; padding: 10px 14px;"><i class="ik ik-send" style="font-weight: 1000;"></i> Simpan</button>
              <button type="reset" style="border: none; padding: 10px 14px;" class="badge badge-light">Batal</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>