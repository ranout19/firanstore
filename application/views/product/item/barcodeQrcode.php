<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Barcode and Qrcode</i></h3>
                <a href="<?=site_url('item/printCode/'.$row->item_id)?>" target='_blank' style="padding: 10px 15px 10px 20px; position: absolute; right: 90px;background: #F0F0F0" class="badge"><i class="ik ik-printer" style="font-weight: 1000; margin-left: -8px;"></i> Print</a>

                <a href="<?=site_url('item')?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 formdata" style="margin-left: 30%;">
                        
                        <h6 style="margin-top: 10px;"><?= $row->barcode ?></h6>
                    <?php 
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '" width="300px">';
                     ?>
                     <br><br><br>
                     <h6><?php echo "item" . $row->item_id; ?></h6>
                    <?php 
                        $qrCode = new \Endroid\QrCode\QrCode($row->item_id);
                        $qrCode->writeFile('uploads/qrcode/item'.$row->item_id.'.png');
                     ?>
                        <img src="<?=base_url('uploads/qrcode/item'.$row->item_id.'.png')?>" width="300px">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
