<div class="page-header">
  <div class="row align-items-end mx-0" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);">
    <div class="col-lg-8">
      <div class="page-header-title">
        <i class="ik ik-user"></i>
        <div class="d-inline">
          <h5>Profile</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= base_url('dashboard') ?>"><i class="ik ik-home"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-4">
    <div class="card">
      <div class="card-body">
        <div class="text-center">
          <div style="width: 130px; height: 130px; border-radius: 50%; background-color: #f0f0f0; margin: 0px auto 20px;font-size: 70px; display: flex;justify-content: center;align-items: center;"><i class="ik ik-user"></i></div>
          <h4 class="card-title mt-10"><?= $this->userlogin->user_login()->name ?></h4>
          <p class="card-subtitle"><?= $this->userlogin->user_login()->level == 1 ? 'Admin' : 'Chasier' ?></p>
          <p class="card-subtitle" style="margin-bottom: -1px;"> Indonesia </p>
        </div>
      </div>
    </div>
  </div>
  <div class="flashdata" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
  <div class="col-lg-8 col-md-7">
    <div class="card">
      <div class="card-body">
        <form class="form-horizontal" method="post" action="<?= site_url('user/profil/' . $this->userlogin->user_login()->user_id) ?>">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="example-username">Nama Lengkap</label>
                <input type="text" class="form-control" value="<?= $this->userlogin->user_login()->name ?>" name="fullname" id="example-username">
              </div>
              <div class="form-group">
                <label for="example-username">Username</label>
                <input type="text" class="form-control" value="<?= $this->userlogin->user_login()->username ?>" name="username" id="example-username">
              </div>
              <div class="form-group">
                <label for="example-password">Telepon</label>
                <input type="text" value="<?= $this->userlogin->user_login()->phone ?>" class="form-control" name="phone" id="phone">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="example-password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                <p class="text-danger font-sm mt-2 mb-0" style="font-size: 11px;">Kosongkan jika password tidak diganti</p>
              </div>
              <div class="form-group">
                <label for="example-password">Level</label>
                <input type="text" value="<?= $this->userlogin->user_login()->level == 1 ? 'Admin' : 'Pegawai' ?>" class="form-control" readonly>
                <input type="hidden" value="<?= $this->userlogin->user_login()->level ?>" name="level">
              </div>
              <div class="form-group">
                <button type="submit" name="edit" class="badge badge-green text-white mt-1 mr-2" style="border: none; padding: 10px 14px;"><i class="ik ik-send" style="font-weight: 1000;"></i> Simpan</button>
                <button type="reset" style="border: none; padding: 10px 14px;" class="badge badge-light">Batal</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>