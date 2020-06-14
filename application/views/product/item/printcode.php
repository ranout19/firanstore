<!DOCTYPE html>
<html>
<head>
	<title>Print code <?=$row->name?></title>
	<style type="text/css">
		*{
			font-family: sans-serif;
		}
	</style>
</head>
<body>
    <h3>Print code <?=$row->name?></h3>
	<div style="display: inline;">
		<h4><?= $row->barcode ?></h4>
    <?php 
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '" width="300px">';
     ?>
	</div>
	
    <div style="">
    	<h4>item<?= $row->item_id ?></h4>
		<img src="uploads/qrcode/item<?=$row->item_id?>.png" width="300px">
    </div>
</body>
</html>