<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3><?=ucfirst($page) ?> Costumer</h3><a href="<?=site_url('costumer')?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Back</a></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 formdata">
                        <form class="forms-sample" action="<?= site_url('costumer/process') ?>" method="post">
                            <?php if ($page == 'edit') {?>
                                <input type="hidden" name="costumer_id" value="<?=$row->costumer_id?>">
                            <?php } ?>
                            <div class="form-group">
                                <label for="costumername">Costumer Name</label>
                                <input type="text" value="<?=$row->name?>" class="form-control" id="costumername" name="costumername" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control select2" required>
                                    <option disabled <?=$page == 'add' ? 'selected' : ''?>>- pilih -</option>
                                    <option value="L" <?=$row->gender == 'L' ? 'selected' : ''?>>Laki-laki</option>
                                    <option value="P" <?=$row->gender == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="number" value="<?=$row->phone?>" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Addres</label>
                                <textarea class="form-control" id="address" name="address" required><?=$row->address?></textarea>
                            </div>
                            <button type="submit" name="<?= $page ?>" class="badge badge-green text-white mr-2" style="border: none; padding: 10px 14px;"><i class="ik ik-send" style="font-weight: 1000;"></i> Save</button>
                            <button type="reset" style="border: none; padding: 10px 14px;" class="badge badge-light">Cancel</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

