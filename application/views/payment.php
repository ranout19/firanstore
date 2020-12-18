<style type="text/css" scoped>
    .modal .table td, .table th {
        border-top: none;
    }
	.table.item td, .table.item th {
	    padding: 7px !important;
	}
</style>
<div class="page-header">
    <div class="row align-items-end mx-0" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-dollar-sign"></i>
                <div class="d-inline">
                    <h5>Payment</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard') ?>"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Payment</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="card">
            <div class="card-header"><h3>Data Payment</h3>
                <form action="<?=site_url('payment')?>" method="post">
                    <div class="input-group" style="width: 470px; position: absolute;right: 110px; top: 14px;">
                        <span style="margin-right: 10px; margin-top: 7px;">Choose date</span>
                        <input type="date" name="first" class="form-control"> 
                        <span style="margin-left: 10px; margin-top: 7px;">to</span>
                        <input type="date" name="last" class="form-control" style="margin-left: 10px;">
                    </div>
                    <button type="submit" name="search" class="badge badge-blue text-white mt-2 mb-3 d-inline" style="position: absolute;right: 20px;top: 8px;outline: none;border:none;padding: 10px;"><i class="fa fa-search"></i><span> Search</span></button>
                </form>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-hover w-100">
                    <thead>
                        <tr>
                            <th class="nosort" style="border:none;">No</th>
                            <th class="nosort" style="border:none;">Date</th>
                            <th class="nosort" style="border:none;">Invoice</th>
                            <th class="nosort" style="border:none;">Costumer</th>
                            <th class="nosort" style="border:none;">Total</th>
                            <th class="nosort" style="border:none;">Note</th>
                            <th class="nosort" style="border:none;">Cashier</th>
                            <th class="nosort" style="border:none; float: right;">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   
                        $no=1;
                        foreach ($transaction->result() as $data){
                    ?>

                        <tr>
                            <td style="width: 6%;padding-left: 20px;"><?=$no++ ?></td>
                            <td>
                                <?=$data->date?>
                            </td>
                            <td>
                                <?=$data->invoice?>
                            </td>
                            <td>
                                <?=$data->costumer?>
                            </td>
                            <td>
                                <?=idr($data->total)?>
                            </td>
                            <td>
                                <?=$data->note?>
                            </td>
                            <td>
                                <?=$data->user?>
                            </td>
                            <td>
                                <div class="table-actions float-right">
                                    <a class="btn btn-sm btn-info" style="display: inline-flex; padding: 8px;" type="button" id="detailitem" data-toggle="modal" data-target="#modal-detail" 
                                    data-invoice="<?=$data->invoice?>"
                                    data-date="<?=$data->date?>"
                                    data-user="<?=$data->user?>"
                                    data-costumer="<?=$data->costumer?>"
                                    data-discount="<?=idr($data->discount)?>"
                                    data-total="<?=idr($data->total)?>"
                                    data-cash="<?=idr($data->cash)?>"
                                    data-change="<?=idr($data->change)?>"
                                    data-note="<?=$data->note?>"
                                    ><i class="ik ik-eye text-white" style="margin-top: -1px !important;margin-right: -1px !important;"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php   }
                     ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="demoModalLabel">Detail</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body table-responsive" align="center">
                <table class="table table-responsive" style="width: 100%;">
                    <tbody>
                        <tr>
                            <th>Date</th>
                            <td><span id="modaldate"></span></td>
                            <th>Invoice</th>
                            <td><span id="modalinvoice"></span></td>
                        </tr>
                        <tr>
                            <th>Cashier</th>
                            <td><span id="modaluser"></span></td>
                            <th>Costumer</th>
                            <td><span id="modalcostumer"></span></td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td><span id="modaldiscount"></span></td>
                            <th>Total</th>
                            <td><span id="modaltotal"></span></td>
                        </tr>
                        <tr>
                            <th>Cash</th>
                            <td><span id="modalcash"></span></td>
                            <th>Change</th>
                            <td><span id="modalchange"></span></td>
                        </tr>
                        <tr>
                            <th>Note</th>
                            <td colspan="3"><span id="modalnote"></span></td>
                        </tr>
                        <table class="table item">
                        	
                        </table>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#detailitem', function() {

        var date = $(this).data('date');
        var invoice = $(this).data('invoice');
        var user = $(this).data('user');
        var costumer = $(this).data('costumer');
        var discount = $(this).data('discount');
        var total = $(this).data('total');
        var cash = $(this).data('cash');
        var change = $(this).data('change');
        var note = $(this).data('note');

        $('#modaldate').text(': '+date);
        $('#modalinvoice').text(': '+invoice);
        $('#modaluser').text(': '+user);
        $('#modalcostumer').text(': '+costumer);
        $('#modaldiscount').text(': '+discount);
        $('#modaltotal').text(': '+total);
        $('#modalcash').text(': '+cash);
        $('#modalchange').text(': '+change);
        $('#modalnote').text(': '+note);

        $.ajax({
            url : '<?=site_url('payment/getItemList')?>',
            type : 'post',
            data : {'invoice' : invoice},
            success : function (data) {
                $('.item').html(data);
            }
        });
        $('.item').html('');
    })
</script>