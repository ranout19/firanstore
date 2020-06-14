<div class="page-header">
    <div class="row align-items-end" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-truck"></i>
                <div class="d-inline">
                    <h5>Supplier</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard') ?>"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Supplier</li>
                    <li class="breadcrumb-item active" aria-current="page"><?=ucfirst($page) ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3><?=ucfirst($page) ?> Supplier</h3><a href="<?=site_url('supplier')?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Back</a></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 formdata">
                        <form class="forms-sample" action="<?= site_url('supplier/process') ?>" method="post">
                            <?php if ($page == 'edit') {?>
                                <input type="hidden" name="supplier_id" value="<?=$row->supplier_id?>">
                            <?php } ?>
                            <div class="form-group">
                                <label for="suppliername">Supplier Name</label>
                                <input type="text" value="<?=$row->name?>" class="form-control" id="suppliername" name="suppliername" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="number" value="<?=$row->phone?>" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Addres</label>
                                <textarea class="form-control" id="address" name="address" required><?=$row->address?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" required><?=$row->description?></textarea>
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

