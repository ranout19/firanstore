<div class="page-header">
    <div class="row align-items-end" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-shopping-bag"></i>
                <div class="d-inline">
                    <h5>Units</h5>
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
        <div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
        <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="card">
            <div class="card-header"><h3>Data Unit</h3><a href="<?=site_url('unit/add')?>" style="position: absolute; right: 20px; padding: 10px;" class="badge badge-blue text-white"><i class="ik ik-plus" style="font-weight: 1000;"></i> Tambah</a></div>
            <div class="card-body">
                <table id="data_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="nosort" style="border:none;">No</th>
                            <th class="nosort" style="border:none;">Unit</th>
                            <th class="nosort" style="border:none; float: right;margin-right: 11px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                	<?php 	
                        $no=1;
                        foreach ($allunit->result() as $data){
                    ?>

                		<tr>
                        	<td style="padding-left: 20px; width: 6%;"><?=$no++ ?></td>
            				<td>
        						<?=$data->name?>
        					</td>
                            <td>
                                <div class="table-actions float-right">
                                    <a href="<?= site_url('unit/edit/'.$data->unit_id) ?>" class="btn btn-sm btn-warning" style="width: 33px; margin-left: 0px; background: #ffc800; border-color: #ffc800;"><i class="ik ik-edit text-white" style="position: absolute;right: 46px;"></i></a>
                                    <a href="<?= site_url('unit/del/'.$data->unit_id) ?>" class="hapus btn btn-sm btn-danger" style="width: 33px; margin-left: 0px;"><i class="ik ik-trash-2 text-white" style="position: absolute;right: 10px;"></i></a>
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