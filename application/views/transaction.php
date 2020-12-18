<div class="page-header">
    <div class="row align-items-end mx-0" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04); ">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-shopping-cart"></i>
                <div class="d-inline">
                    <h5>Transaction</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard') ?>"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Transaction</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
<div class="transaction" data-transaction="<?=$this->session->flashdata('transaction')?>" data-redirect="<?=$this->session->flashdata('redirect')?>"></div>
<form method="post" action="<?= site_url('transaction/addTransaction') ?>">
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body" style="padding: 10px;">
                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label">Date</label>
                    <div class="col-sm-9">
                        <input type="text" value="<?=date('d F Y')?>" class="form-control" id="date" name="date" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kasir" class="col-sm-3 col-form-label">Kasir</label>
                    <div class="col-sm-9">
                        <input type="text" value="<?=$this->userlogin->user_login()->name?>" class="form-control" id="kasir" name="kasir" readonly>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 0px;">
                    <label for="costumer" class="col-sm-3 col-form-label">Costumer</label>
                    <div class="col-sm-9">
                        <select id="costumer" name="costumer" class="form-control select2" style="width: 269.984px;" required>
                        <?php foreach ($costumer as $result): ?>
                            <option value="<?=$result->costumer_id?>" <?=$result->costumer_id == 1 ? 'selected' : null?>><?=$result->name?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body" style="padding: 10px;">
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Barcode</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-button" style="margin-bottom: 0.25em;">
                            <input type="hidden" name="itemId" id="itemId">
                            <input type="hidden" name="itemPrice" id="itemPrice">
                            <input type="text" id="barcode" class="form-control">
                            <div class="input-group-append">
                                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modal-item"><i class="ik ik-search" style="font-weight: 1000; font-size: 17px; margin-right: -1px; outline: none;"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="qty" class="col-sm-3 col-form-label">Qty</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="qty" name="qty" style="font-size: 15px;">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 0.25em;">
                    <label for="qty" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <a class="badge badge-blue text-white" id="addItem" style="padding: 8px; cursor: pointer;"><i class="ik ik-plus" style="font-weight: 1000;"></i> Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 align="right" style="margin-top: 6px;"><small>Invoice</small> <b id="invoice"><?=$kode?></b></h5>
                <input type="hidden" name="kodeinvoice" id="kodeinvoice" value="<?=$kode?>">
                <h1 align="right" style="font-size: 70px; margin: 12px 0 -8px;font-weight: 700"><small style="font-size: 17px">Rp. </small><strong id="totalPrice"></strong></h1>
                <input type="hidden" id="totalCash" name="totalCash" onKeyUp="getchange()" onKeyDown="getchange()" onChange="getchange()">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body" style="padding: 10px;">
                <table class="table table-hover" style="margin-bottom: 0rem;">
                    <thead>
                        <tr>
                            <th class="nosort" style="border:none;">No</th>
                            <th class="nosort" style="border:none;">Barcode</th>
                            <th class="nosort" style="border:none;">Product Name</th>
                            <th class="nosort" style="border:none;">Price</th>
                            <th class="nosort" style="border:none;">Qty</th>
                            <th class="nosort" style="border:none;">Discount</th>
                            <th class="nosort" style="border:none;">Subtotal</th>
                            <th class="nosort" style="border:none; float: right; margin-right: 12px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="getItem"></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body" style="padding: 10px;">
                <div class="form-group row">
                    <label for="subtotal" class="col-sm-4 col-form-label">Sub Total</label>
                    <div class="col-sm-8" style="padding-left: 0px;">
                        <input onKeyUp="getdiscount()" onKeyDown="getdiscount()" onChange="getdiscount()" type="text" class="form-control" id="subtotal" name="subtotal" style="font-size: 15px;" readonly>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 0.25em;">
                    <label for="discount" class="col-sm-4 col-form-label">Discount</label>
                    <div class="col-sm-8" style="padding-left: 0px">
                        <input onKeyUp="getdiscount()" onKeyDown="getdiscount()" onChange="getdiscount()" type="text" class="form-control" id="discount" name="discount" style="font-size: 15px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body" style="padding: 10px;">
                <div class="form-group row">
                    <label for="cash" class="col-sm-4 col-form-label">Cash</label>
                    <div class="col-sm-8" style="padding-left: 0px">
                        <input onKeyUp="getchange()" onKeyDown="getchange()" onChange="getchange()" type="number"  class="form-control" id="cash" name="cash" style="font-size: 15px;">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 0.25em;">
                    <label for="change" class="col-sm-4 col-form-label">Change</label>
                    <div class="col-sm-8" style="padding-left: 0px">
                        <input type="number" class="form-control" id="change" name="change" style="font-size: 15px;" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body" style="padding: 10px;">
                <div class="form-group row" style="margin-bottom: 0.25em;">
                    <label for="note" class="col-sm-3 col-form-label">Note</label>
                    <div class="col-sm-9" style="padding-left: 0px">
                        <textarea class="form-control" id="note" name="note" style="height: 86px;font-size: 15px;"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-lg btn-success mb-2 mt-2" style="font-size: 15px; padding: 12px 14px 32px;"><i class="fa fa-paper-plane" style="font-weight: 700;"></i><span>Process payment</span></button>
        <a href="" class="btn btn-lg btn-warning text-white" style="font-size: 15px; padding: 10px 14px 30px;"><i class="ik ik-refresh-cw" style="font-weight: 700;"></i><span>Refresh</span></a>
    </div>
</div>
</form>

<div class="modal fade" id="modal-item" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="demoModalLabel">Product Item</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <table id="data_table" class="table table-hover w-100">
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
                <tbody id="getModalItem"></tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="demoModalLabel">Detail Product</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="modalitemname">Product Name</label>
                        <input type="text" class="form-control" id="modalitemname" name="modalitemname" readonly>
                        <input type="hidden" id="modalid" name="modalid">
                        <input type="hidden" id="modalitemid" name="modalitemid">
                        <input type="hidden" id="modalprice" name="modalprice">
                    </div>
                    <div class="form-group">
                        <label for="modalqty">Qty</label>
                        <input type="number" class="form-control" id="modalqty" name="modalqty" onKeyDown="modalTotal()" onKeyUp="modalTotal()" onChange="modalTotal()">
                        <input type="hidden" id="modalqtyfirst" name="modalqtyfirst">
                    </div>
                    <div class="form-group">
                        <label for="modaldiscount">Discount</label>
                        <input type="number" class="form-control" id="modaldiscount" name="modaldiscount" onKeyDown="modalTotal()" onKeyUp="modalTotal()" onChange="modalTotal()">
                    </div>
                    <div class="form-group">
                        <label for="modaltotal">Total</label>
                        <input type="hidden" id="modalsubtotal" name="modalsubtotal" onKeyDown="modalTotal()" onKeyUp="modalTotal()" onChange="modalTotal()">
                        <input type="number" class="form-control" id="modaltotal" name="modaltotal" readonly>
                    </div>
                    <a id="updateItem" class="badge badge-green text-white mr-2" style="cursor: pointer;border: none; padding: 10px 14px;"><i class="ik ik-send" style="font-weight: 1000;"></i> Save</a>
                    <button type="reset" style="border: none; padding: 10px 14px;" class="badge badge-light" id="cancel">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function getchange() {
        var total = $('#totalCash').val();
        var cash = $('#cash').val();
        const hasil = parseInt(cash) - parseInt(total);
        if (!isNaN(hasil)) {
            $('#change').val(hasil);
        }else{
            $('#change').val(0);
        }
    }
    function getdiscount() {
        var discount = $('#discount').val();
        var subtotal = $('#subtotal').val();
        $('#totalPrice').html(subtotal - discount);
        $('#totalCash').val(subtotal - discount);
    }
    function modalTotal() {
        var discount = $('#modaldiscount').val();
        var price = $('#modalprice').val();
        var qty = $('#modalqty').val();
        $('#modaltotal').val(price * qty - discount);

    }
    function getItem() {
        $.ajax({
            url : '<?=site_url('transaction/getItem')?>',
            type : 'get',
            success : function (data) {
                $('#getItem').html(data);
            }
        });
    }
    function getTotal() {
        $.ajax({
            url : '<?=site_url('transaction/getTotal')?>',
            type : 'get',
            success : function (data) {
                $('#totalPrice').html(data);
                $('#subtotal').val(data);
                $('#totalCash').val(data);
            }
        });
    }
    function getModalItem() {
        $.ajax({
            url : '<?=site_url('transaction/getModalItem')?>',
            type : 'get',
            success : function (data) {
                $('#getModalItem').html(data);
            }
        });
    }
    getItem();
    getModalItem();
    getTotal();

    $(document).on('click', '#select', function() {

        var barcode = $(this).data('barcode');
        var price = $(this).data('price');
        var itemid = $(this).data('itemid');

        $('#barcode').val(barcode);
        $('#itemPrice').val(price);
        $('#itemId').val(itemid);

        $('#modal-item').modal('hide');
    })

    $(document).on('click', '#cancel', function() {

        $('#modal-edit').modal('hide');

    })

    $(document).on('click', '#editItem', function() {

        var id = $(this).data('id');
        var itemid = $(this).data('itemid');
        var itemname = $(this).data('name');
        var qty = $(this).data('qty');
        var discount = $(this).data('discount');
        var subtotal = $(this).data('subtotal');
        var price = $(this).data('price');

        $('#modalid').val(id);
        $('#modalitemid').val(itemid);
        $('#modalitemname').val(itemname);
        $('#modalqty').val(qty);
        $('#modalprice').val(price);
        $('#modalqtyfirst').val(qty);
        $('#modaldiscount').val(discount);
        $('#modalsubtotal').val(subtotal);
        modalTotal();

    })

    $(document).on('click', '#addItem', function() {
        var itemId = $('#itemId').val();
        var invoice = $('#invoice').html();
        var itemPrice = $('#itemPrice').val();
        var qty = $('#qty').val();

        $.ajax({
            url : '<?=site_url('transaction/addItem')?>',
            type : 'post',
            data : {
                'invoice' : invoice,
                'item_id' : itemId,
                'qty' : qty,
                'subtotal' : itemPrice * qty
            },
            success : function (data) {
                getItem();
                getTotal();
                getModalItem();
                $('#itemId').val('');
                $('#itemPrice').val('');
                $('#qty').val('');
                $('#barcode').val('');
            }
        }) 
    });

    $(document).on('click', '#updateItem', function() {
        var modalid = $('#modalid').val();
        var modalitemid = $('#modalitemid').val();
        var modalqty = $('#modalqty').val();
        var modalqtyfirst = $('#modalqtyfirst').val();
        var modaldiscount = $('#modaldiscount').val();
        var modaltotal = $('#modaltotal').val();

        $.ajax({
            url : '<?=site_url('transaction/updateItem')?>',
            type : 'post',
            data : {
                'id' : modalid,
                'item_id' : modalitemid,
                'qty' : modalqty,
                'qtyfirst' : modalqtyfirst,
                'discount' : modaldiscount,
                'subtotal' : modaltotal
            },
            success : function (data) {
                getItem();
                getTotal();
                getModalItem();
                $('#modal-edit').modal('hide');
            }
        }) 
    });

    $(document).on('click', '#deleteItem', function() {
        var id = $(this).data('id');
        var itemid = $(this).data('itemid');
        var qty = $(this).data('qty');

        $.ajax({
            url : '<?=site_url('transaction/deleteItem')?>',
            type : 'post',
            data : {
                'id' : id,
                'item_id' : itemid,
                'qty' : qty
            },
            success : function (data) {
                getItem();
                getTotal();
                getModalItem();
            }
        })
    })

</script>