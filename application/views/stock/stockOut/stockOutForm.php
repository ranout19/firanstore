<div class="row">
    <div class="col-md-12">
                <?php $this->view('flashdata') ?>
        <div class="card">
            <div class="card-header"><h3>Add Stock Out</h3><a href="<?=site_url('stock/out')?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Back</a></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 formdata">
                        <form class="forms-sample" action="<?= site_url('stock/process') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="datepicker">Date</label>
                              <input type="text" name="tanggal" value="<?= date('d F Y') ?>" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" readonly>
                          	</div>
                          	<div class="form-group">
                              	<label for="barcode">Barcode</label>
                              	<div class="input-group input-group-button">
                              		<input type="hidden" name="item_id" id="item_id">
                                    <input type="text" id="barcode" class="form-control" required autofocus>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="button"data-toggle="modal" data-target="#modal-item"><i class="ik ik-search" style="font-weight: 1000; font-size: 17px; margin-right: -1px;"></i></button>
                                    </div>
                                </div>
                          	</div>
                          	<div class="form-group">
                                <label for="itemname">Item Name</label>
                                <input type="text" class="form-control" id="itemname" name="itemname" required readonly>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col-md-8">	
		                                <label for="unit">Item Unit</label>
		                                <input type="text" class="form-control" id="unit" name="unit" value="-" required readonly>
                            		</div>
                            		<div class="col-md-4">	
		                                <label for="stock">Initial Stock</label>
		                                <input type="text" class="form-control" id="stock" name="stock" value="-" required readonly>
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                                <label for="detail">Detail</label>
                                <input type="text" class="form-control" id="detail" name="detail" placeholder="Rusak / hilang / kadaluarsa / etc" required>
                            </div>
                            <div class="form-group">
                                <label for="qty">Qty</label>
                                <input type="number" class="form-control" id="qty" name="qty" required>
                            </div>
                            <button type="submit" name="out_add" class="badge badge-green text-white mr-2" style="border: none; padding: 10px 14px;"><i class="ik ik-send" style="font-weight: 1000;"></i> Save</button>
                            <button type="reset" style="border: none; padding: 10px 14px;" class="badge badge-light">Cancel</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-item" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="demoModalLabel">Product Item</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body table-responsive">
            <table id="data_table" class="table table-responsive table-hover" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 70px;">Barcode</th>
                        <th class="nosort" style="border:none;width: 180px;">Name</th>
                        <th class="nosort" style="border:none;width: 80px;">Unit</th>
                        <th class="nosort" style="border:none;width: 120px;">price</th>
                        <th class="nosort" style="border:none;width: 70px;">Stock</th>
                        <th class="nosort" style="border:none;">Action</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($item as $i => $data) { ?>
            		<tr>
            			<td><?=$data->barcode?></td>
            			<td><?=$data->name?></td>
            			<td><?=$data->unitname?></td>
            			<td><?=idr($data->price)?></td>
            			<td><?=$data->stock?></td>
            			<td>
            				<button type="button" class="btn btn-small btn-info" id="select" data-id="<?=$data->item_id?>" data-barcode="<?=$data->barcode?>" data-name="<?=$data->name?>" data-unit="<?=$data->unitname?>" data-stock="<?=$data->stock?>"><i class="ik ik-check-circle"></i>Select</button>
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
	$(document).on('click', '#select', function() {

		var item_id = $(this).data('id');
		var barcode = $(this).data('barcode');
		var itemname = $(this).data('name');
		var unit = $(this).data('unit');
		var stock = $(this).data('stock');

		$('#item_id').val(item_id);
		$('#barcode').val(barcode);
		$('#itemname').val(itemname);
		$('#unit').val(unit);
		$('#stock').val(stock);

		$('#modal-item').modal('hide');
	})
</script>