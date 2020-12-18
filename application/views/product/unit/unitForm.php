<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3><?=$page == 'add' ? 'Tambah' : 'Edit'?> Unit</h3><a href="<?=site_url('unit')?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Kembali</a></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 formdata">
                        <form class="forms-sample" action="<?= site_url('unit/process') ?>" method="post">
                            <?php if ($page == 'edit') {?>
                                <input type="hidden" name="unit_id" value="<?=$row->unit_id?>">
                            <?php } ?>
                            <div class="form-group">
                                <label for="unitname">Nama Satuan</label>
                                <input type="text" value="<?=$row->name?>" class="form-control" id="unitname" name="unitname" required>
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

