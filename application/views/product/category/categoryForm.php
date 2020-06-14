<div class="row">
    <div class="col-md-12">
        <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
        <div class="card">
            <div class="card-header"><h3><?=ucfirst($page) ?> Category</h3><a href="<?=site_url('category')?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Back</a></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 formdata">
                        <form class="forms-sample" action="<?= site_url('category/process') ?>" method="post">
                            <?php if ($page == 'edit') {?>
                                <input type="hidden" name="category_id" value="<?=$row->category_id?>">
                            <?php } ?>
                            <div class="form-group">
                                <label for="categoryname">Category Name</label>
                                <input type="text" value="<?=$row->name?>" class="form-control" id="categoryname" name="categoryname" required>
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

