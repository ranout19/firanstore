<div class="page-header">
  <div class="row align-items-end mx-0" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);">
    <div class="col-lg-8">
      <div class="page-header-title">
        <i class="ik ik-box"></i>
        <div class="d-inline">
          <h5>Grup</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= base_url('dashboard') ?>"><i class="ik ik-home"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Grup</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="cantdelete" data-cantdelete="<?= $this->session->flashdata('cantdelete') ?>"></div>
    <div class="flashdatawarning" data-flashdata="<?= $this->session->flashdata('warning') ?>"></div>
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
    <div class="card">
      <div class="card-header">
        <h3>Data Grup</h3><a href="<?= site_url('grup/tambah') ?>" style="position: absolute; right: 20px; padding: 10px;" class="badge badge-blue text-white"><i class="ik ik-plus" style="font-weight: 1000;"></i> Tambah</a>
      </div>
      <div class="card-body">
        <table id="data_table" class="table table-hover w-100">
          <thead>
            <tr>
              <th class="nosort" style="border:none;">No</th>
              <th class="nosort" style="border:none;">Group</th>
              <th class="nosort" style="border:none;">Sub Group</th>
              <th class="nosort" style="border:none; float: right; margin-right: 20px;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($grups->result() as $grup) {
            ?>

              <tr>
                <td style="width: 6%;padding-left: 20px;"><?= $no++ ?></td>
                <td><?= $grup->grup ?></td>
                <td><?= $grup->sub_grup ?></td>
                <td>
                  <div class="table-actions float-right">
                    <a href="<?= site_url('grup/edit/' . $grup->id_grup) ?>" class="btn btn-sm btn-warning" style="display: inline-flex; padding: 8px; background: #ffc800; border-color: #ffc800;"><i class="ik ik-edit text-white" style="margin-top: -1px !important; margin-right: -1px !important;"></i></a>
                    <a href="<?= site_url('grup/hapus/' . $grup->id_grup) ?>" class="hapus btn btn-sm btn-danger" style="display: inline-flex; padding: 8px;"><i class="ik ik-trash-2 text-white" style="margin-top: -1px !important; margin-right: -1px !important;"></i></a>
                  </div>
                </td>
              </tr>
            <?php  }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>