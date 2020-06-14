<?php if ($this->session->flashdata('success')): ?>
<div class="alert bg-success text-white alert-success alert-dismissible fade show" role="alert">
    <strong><i class="ik ik-check" style="margin-right: 4px; font-size: 20px; font-weight: 700;"></i></strong> <?= $this->session->flashdata('success') ?>
    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <i class="ik ik-x"></i>
    </button>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('cantdelete')): ?>
<div class="alert bg-warning text-white alert-warning alert-dismissible fade show" role="alert">
    <strong><i class="ik ik-alert-octagon"></i></strong> <?= $this->session->flashdata('cantdelete') ?>
    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <i class="ik ik-x"></i>
    </button>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('errorimg')): ?>
<div class="alert bg-warning text-white alert-warning alert-dismissible fade show" role="alert">
    <strong><i class="ik ik-alert-octagon"></i></strong> <?= $this->session->flashdata('errorimg') ?>
    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <i class="ik ik-x"></i>
    </button>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('fail')): ?>
<div class="alert bg-warning text-white alert-warning alert-dismissible fade show" role="alert">
    <strong><i class="ik ik-alert-octagon"></i></strong> <?= $this->session->flashdata('fail') ?>
    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <i class="ik ik-x"></i>
    </button>
</div>
<?php endif ?>
