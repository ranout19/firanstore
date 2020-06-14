<html>
<head>
	<title>Print Invoice</title>
	<style type="text/css">
		body{
			width: 280px;
			font-family: consolas;
			padding: 7px;
			visibility: hidden;
		}
		.item div p{
			margin: 0 0 2px 0;
		}
		@media print{
			body{
				visibility: visible;
			}
		}
	</style>
</head>
<body onload="window.print()">
	<div class="header" align="center" style="border-top: 1px dashed;border-bottom: 1px dashed;padding: 1px 0px;">
		<p style="font-size: 11px; margin: 0px;padding-top: 5px;border-top: 1px dashed">PT.FIRAN STORE INDONESIA</p>
		<p style="font-size: 11px; margin-top: 1px; padding-bottom: 5px;border-bottom: 1px dashed;margin-bottom: 0;">4 Sampora Street, Nanggewer Mekar <br>Cibinong City</p>
	</div>
	<div style="clear: both;"></div>
	<div style="font-size: 11px;border-bottom: 1px dashed;margin-bottom: 1px; padding: 5px 0">
		<div style="display: flex;justify-content: space-between;margin-bottom: 1px;">
			<p style="margin: 0"><?=date('h:i')?>/<?=date('d-m-Y')?></p>
			<p style="margin: 0">Cashier : <?=$row->user?></p>
		</div>
		<div style="display: flex;justify-content: space-between;">
			<p style="margin: 0"><?=$row->invoice?></p>
			<p style="margin: 0">Costumer : <?=$row->costumer?></p>
		</div>
		
	</div>
	<div class="item" style="padding: 5px 0 3px;border-bottom: 1px dashed;border-top: 1px dashed; font-size: 11px;">
	<?php foreach ($result as $data): ?>
		<div style="display: flex; justify-content: space-between;">
			<p style="flex: 4"><?=$data->name?></p>
			<p style="flex: 1"><?=number_format($data->price)?></p>
			<p style="flex: 1;text-align: center;"><?=$data->qty?></p>
			<p style="flex: 2">-(<?=number_format($data->discount)?>)</p>
			<p style="flex: 1"><?=number_format($data->subtotal - $data->discount)?></p>
		</div>
	<?php endforeach ?>
	</div>
	<div style="border-bottom: 1px dashed;font-size: 11px;padding: 5px 0">
		<div style="display: flex;justify-content: space-between;margin-bottom: 1px;">
			<p style="flex: 4; margin: 0">Total item</p>
			<p style="margin: 0 9px 0 0;text-align: right;flex: 1">
				<?php 
					$qty = '';
					foreach ($result as $value) {
						$qty .= $value->qty;
					}
					echo $qty;
				 ?>
			</p>
			<p style="flex: 3; margin: 0; text-align: right;"><?=number_format($row->total + $row->discount)?></p>
		</div>
		<div style="display: flex;justify-content: space-between;">
			<p style="flex: 4; margin: 0">Discount</p>
			<p style="flex: 3; margin: 0; text-align: right;"><?=number_format($row->discount)?></p>
		</div>
	</div>
	<div style="border-bottom: 1px dashed;font-size: 11px;padding: 5px 0">
		<div style="display: flex;justify-content: space-between;margin-bottom: 1px;">
			<p style="flex: 4; margin: 0">Subtotal</p>
			<p style="flex: 3; margin: 0; text-align: right;"><?='Rp.'.number_format($row->total)?></p>
		</div>
		<div style="display: flex;justify-content: space-between;margin-bottom: 1px;">
			<p style="flex: 4; margin: 0">Cash</p>
			<p style="flex: 3; margin: 0; text-align: right;"><?='Rp.'.number_format($row->cash)?></p>
		</div>
		<div style="display: flex;justify-content: space-between;">
			<p style="flex: 4; margin: 0">Change</p>
			<p style="flex: 3; margin: 0; text-align: right;"><?='Rp.'.number_format($row->change)?></p>
		</div>
	</div>
	<div class="footer" align="center" style="border-bottom: 1px dashed;padding: 1px 0px;">
		<p style="font-size: 11px; margin: 0px;padding-top: 5px;border-top: 1px dashed">Thank's for shopping, please come again</p>
		<p style="font-size: 11px; margin-top: 1px; padding-bottom: 5px;border-bottom: 1px dashed;margin-bottom: 0;">CS : 081938783223</p>
	</div>
</body>
</html>