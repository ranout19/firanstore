<div class="row">
  <div class="col-md-12">
    <div class="flashdatawarning" data-flashdata="<?= $this->session->flashdata('warning') ?>"></div>
    <div class="card">
      <div class="card-header">
        <h3><?= $page == 'tambah' ? 'Tambah' : 'Edit' ?> Grup</h3><a href="<?= site_url('grup') ?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Kembali</a>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-5 formdata">
            <form class="forms-sample" action="<?= site_url('grup/proses') ?>" method="post">
              <?php if ($page == 'edit') { ?>
                <input type="hidden" name="id_grup" value="<?= $row->id_grup ?>">
              <?php } ?>
              <div class="form-group">
                <label for="categoryname">Grup</label>
                <input type="text" value="<?= $row->grup ?>" class="form-control" id="grup" name="grup" required>
              </div>
              <div class="form-group">
                <label for="categoryname">Sub Grup</label>
                <input type="text" value="<?= $row->sub_grup ?>" class="form-control" id="sub_grup" name="sub_grup" required>
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