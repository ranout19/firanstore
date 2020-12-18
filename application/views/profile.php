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
                    <h4 class="card-title mt-10"><?=$this->userlogin->user_login()->name?></h4>
                    <p class="card-subtitle"><?=$this->userlogin->user_login()->level == 1 ? 'Admin' : 'Chasier'?></p>
                    <p class="card-subtitle" style="margin-bottom: -1px;"> Indonesia </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-7">
        <div class="card">
	        <div class="card-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="example-username">Username</label>
                        <input type="email"  class="form-control" value="<?=$this->userlogin->user_login()->username?>" name="username" id="example-username" readonly>
                    </div>
                    <div class="form-group">
                        <label for="example-password">Password</label>
                        <input type="text" value="<?=$this->userlogin->user_login()->password?>" value="password" class="form-control" name="password" id="example-password" readonly>
                    </div>
                    <div class="form-group">
                        <label for="example-password">Phone</label>
                        <input type="text" value="<?=$this->userlogin->user_login()->phone?>" value="password" class="form-control" name="password" id="example-password" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if ($this->userlogin->user_login()->level != 1): ?>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h6>Note :</h6>
                <p style="font-size: 12px; margin-bottom: 0px;">Hubungi admin jika ingin mengganti data user</p>
            </div>
        </div>
    </div>
    <?php endif ?>
    
</div>