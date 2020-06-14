<style type="text/css" scoped>
    .modal .table td, .table th {
        border-top: none;
    }
</style>
<div class="page-header">
    <div class="row align-items-end" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-package"></i>
                <div class="d-inline">
                    <h5>Stock Out</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard') ?>"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Stock</li>
                    <li class="breadcrumb-item active" aria-current="page">Stock Out</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="card">
            <div class="card-header"><h3>Data Stock Out</h3><a href="<?=site_url('stock/out/add')?>" style="position: absolute; right: 20px; padding: 10px;" class="badge badge-blue text-white"><i class="ik ik-plus" style="font-weight: 1000;"></i> Tambah</a></div>
            <div class="card-body">
                <table id="data_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="nosort" style="border:none;">No</th>
                            <th class="nosort" style="border:none;">Barcode</th>
                            <th class="nosort" style="border:none;">Produck item</th>
                            <th class="nosort" style="border:none;">Qty</th>
                            <th class="nosort" style="border:none;">Detail</th>
                            <th class="nosort" style="border:none;">Date</th>
                            <th class="nosort" style="border:none; float: right;margin-right: 11px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                        $no=1;
                        foreach ($row->result() as $data){
                    ?>

                        <tr>
                            <td style="width: 6%;padding-left: 20px;"><?=$no++ ?></td>
                            <td>
                                <?=$data->barcode?>
                            </td>
                            <td>
                                <?=$data->itemname?>
                            </td>
                            <td>
                                <?=$data->qty?>
                            </td>
                            <td>
                                <?=$data->detail?>
                            </td>
                            <td>
                                <?=$data->date?>
                            </td>
                            <td>
                                <div class="table-actions float-right">
                                    <a class="btn btn-sm btn-info" style="width: 33px; margin-left: 0px;" type="button" id="detailitem" data-toggle="modal" data-target="#modal-detail" data-barcode="<?=$data->barcode?>" data-name="<?=$data->itemname?>" data-qty="<?=$data->qty?>" data-detail="<?=$data->detail?>" data-date="<?=$data->date?>"><i class="ik ik-eye text-white" style="position: absolute;right: 47px;"></i></a>
                                    <a href="<?= site_url('stock/out/del/'.$data->stock_id.'/'.$data->item_id) ?>" class="hapus btn btn-sm btn-danger" style="width: 33px; margin-left: 0px;"><i class="ik ik-trash-2 text-white" style="position: absolute;right: 10px;"></i></a>
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
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="demoModalLabel">Detail</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-responsive" style="width: 100%;border: none;">
                    <tbody>
                        <tr>
                            <th>Barcode</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th>Item Name</th>
                            <td><span id="itemname"></span></td>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#detailitem', function() {

        var barcode = $(this).data('barcode');
        var itemname = $(this).data('name');
        var qty = $(this).data('qty');
        var detail = $(this).data('detail');
        var date = $(this).data('date');

        $('#barcode').text(barcode);
        $('#itemname').text(itemname);
        $('#qty').text(qty);
        $('#detail').text(detail);
        $('#date').text(date);

    })
</script>