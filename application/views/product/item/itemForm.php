<div class="row">
    <div class="col-md-12">
                <?php $this->view('flashdata') ?>
        <div class="card">
            <div class="card-header"><h3><?=ucfirst($page) ?> Item</h3><a href="<?=site_url('item')?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Back</a></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 formdata">
                        <form class="forms-sample" action="<?= site_url('item/process') ?>" method="post" enctype="multipart/form-data">
                            <?php if ($page == 'edit') {?>
                                <input type="hidden" name="item_id" value="<?=$row->item_id?>">
                            <?php } ?>
                            <div class="form-group">
                                <label for="barcode">Barcode</label>
                                <input type="text" value="<?=$row->barcode == null ? 'item'.date('his') : $row->barcode ?>" class="form-control" id="barcode" name="barcode" readonly>
                            </div>
                            <div class="form-group">
                                <label for="itemname">Item Name</label>
                                <input type="text" value="<?=$row->name?>" class="form-control" id="itemname" name="itemname" required>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category"  class="form-control select2" required>
                                    <option disabled <?=$page == 'add' ? 'selected' :null?>>- pilih -</option>
                                <?php foreach ($categorydata->result() as $category) { ?>
                                    <option value="<?=$category->category_id?>" <?=$category->category_id == $row->category_id ? 'selected' : null?>><?=$category->name?></option>
                                <?php } ?>   
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Unit</label>
                                <select name="unit"  class="form-control select2" required>
                                    <option disabled <?=$page == 'add' ? 'selected' :null?>>- pilih -</option>
                                <?php foreach ($unitdata->result() as $unit) { ?>
                                    <option value="<?=$unit->unit_id?>" <?=$unit->unit_id == $row->unit_id ? 'selected' : null?>><?=$unit->name?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" value="<?=$row->price?>" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="form-group">
                                <label>Upload Image</label><br>
                                <?php if ($page == 'edit') {
                                        if ($row->image != null) {?>
                                    <img src="<?=base_url()?>uploads/product/<?=$row->image?>" width="220px">
                                <?php   
                                        } 
                                      } 
                                ?>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="<?=$row->image != null ? $row->image : 'Upload Image'?>">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                                <small>Dont touch it if image has <?=$page == 'edit' ? 'no change' : 'empty' ?></small>
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

