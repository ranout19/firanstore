<div class="page-header">
    <div class="row align-items-end" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-shopping-bag"></i>
                <div class="d-inline">
                    <h5>Items</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard') ?>"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Product</li>
                    <li class="breadcrumb-item active" aria-current="page">Item</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="card">
            <div class="card-header"><h3>Data Item</h3><a href="<?=site_url('item/add')?>" style="position: absolute; right: 13px; padding: 10px;" class="badge badge-primary text-white"><i class="ik ik-plus" style="font-weight: 1000;"></i> Tambah</a></div>
            <div class="card-body">
                <table id="data_table1" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="border:none;" class="sorting_disable">No</th>
                            <th style="border:none;">Barcode</th>
                            <th style="border:none;">Name</th>
                            <th style="border:none;">Category</th>
                            <th style="border:none;">Unit</th>
                            <th style="border:none;">price</th>
                            <th style="border:none;">Stock</th>
                            <th style="border:none;">Image</th>
                            <th style="border:none; float: right; margin-right: 30px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                	<?php 	
                        $no=1;
                        foreach ($allitem->result() as $data){
                    ?>

                		<tr>
                        	<td style="width: 6%;padding-left: 20px;"><?=$no++ ?></td>
            				<td>
        						<?=$data->barcode?>
        					</td>
                            <td>
                                <?=$data->name?>
                            </td>
                            <td>
                                <?=$data->categoryname?>
                            </td>
                            <td>
                                <?=$data->unitname?>
                            </td>
                            <td>
                                <?=idr($data->price)?>
                            </td>
                            <td>
                                <?=$data->stock?>
                            </td>
                            <td>
                                <?php if ($data->image != null) {?>
                                    <img src="<?=base_url()?>uploads/product/<?=$data->image?>" width="70px">
                                <?php } else{ echo "There is no image"; } ?>
                            </td>
                            <td>
                                <div class="table-actions item text-right">
                                    <a href="<?= site_url('item/barcodeQrcode/'.$data->item_id) ?>" class="btn btn-sm btn-info" style="width: 33px; margin-left: 0px;"><i class="fa fa-qrcode text-white" style="position: absolute;right: 84px;"></i></a>
                                    <a href="<?= site_url('item/edit/'.$data->item_id) ?>" class="btn btn-sm btn-warning" style="width: 33px; margin-left: 0px; background: #ffc800; border-color: #ffc800;"><i class="ik ik-edit text-white" style="position: absolute;right: 46px;"></i></a>
                                    <a href="<?= site_url('item/del/'.$data->item_id) ?>" class="hapus btn btn-sm btn-danger" style="width: 33px; margin-left: 0px;"><i class="ik ik-trash-2 text-white" style="position: absolute;right: 10px;"></i></a>
                                </div>
                            </td>
                        </tr>
                	<?php	}
                	 ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#data_table1').DataTable({
            "columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3, 4, 5, 6, 7, 8],
                   "orderable" : false
                },
                {
                   "targets" : [0, 7],
                   "className" : 'text-center'
                },
                {
                   "targets" : [1, 2, 3, 4, 5, 6],
                   "className" : 'text-left'
                }
            ]
        })
    })
</script>