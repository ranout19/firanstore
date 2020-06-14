<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3>Add User</h3><a href="<?=site_url('user')?>" style="padding: 10px 14px; position: absolute; right: 20px;" class="badge badge-yellow text-white"><i class="ik ik-chevron-left" style="font-weight: 1000; margin-left: -8px;"></i> Back</a></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 formdata">
                        <form class="forms-sample" action="" method="post">
                            <div class="form-group">
                                <label for="fullname" class="<?=form_error('fullname') ? 'labelerror' : null;?>">Full Name</label>
                                <input type="text" value="<?=set_value('fullname')?>" class="form-control <?=form_error('fullname') ? 'errorform' : null;?>" id="fullname" name="fullname" >
                                <small class="error"><?=form_error('fullname');?></small>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="<?=form_error('phone') ? 'labelerror' : null;?>">Phone Number</label>
                                <input type="number" value="<?=set_value('phone')?>" class="form-control <?=form_error('phone') ? 'errorform' : null;?>" id="phone" name="phone" >
                                <small class="error"><?=form_error('phone');?></small>
                            </div>
                            <div class="form-group">
                                <label for="" class="<?=form_error('level') ? 'labelerror' : null;?>">Level</label>
                                <select name="level"  class="form-control select2">
                                    <option disabled selected>- pilih -</option>
                                    <option value="1" <?=set_value('level') == 1 ? 'selected' : null ?>>Admin</option>
                                    <option value="2" <?=set_value('level') == 2 ? 'selected' : null ?>>Cashier</option>
                                </select>
                                <small class="error"><?=form_error('level');?></small>
                            </div>
                            <div class="form-group">
                                <label for="username" class="<?=form_error('username') ? 'labelerror' : null;?>">Username</label>
                                <input type="text" value="<?=set_value('username')?>" class="form-control <?=form_error('username') ? 'errorform' : null;?>" id="username" name="username">
                                <small class="error"><?=form_error('username');?></small>
                            </div>
                            <div class="form-group">
                                <label for="password" class="<?=form_error('password') ? 'labelerror' : null;?>">Password</label>
                                <input type="password" value="<?=set_value('password')?>" class="form-control <?=form_error('password') ? 'errorform' : null;?>" id="password" name="password">
                                <small class="error"><?=form_error('password');?></small>
                            </div>
                            <div class="form-group">
                                <label for="passwordconf" class="<?=form_error('passwordconf') ? 'labelerror' : null;?>">Confirm Password</label>
                                <input type="password" value="<?=set_value('passwordconf')?>" class="form-control <?=form_error('passwordconf') ? 'errorform' : null;?>" id="passwordconf" name="passwordconf">
                                <small class="error"><?=form_error('passwordconf');?></small>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="showpassword">
                                    <span class="custom-control-label">Show password</span>
                                </label>
                            </div>
                            <button type="submit" name="add" class="badge badge-green text-white mr-2" style="border: none; padding: 10px 14px;"><i class="ik ik-send" style="font-weight: 1000;"></i> Save</button>
                            <button type="reset" style="border: none; padding: 10px 14px;" class="badge badge-light">Cancel</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){       
        $('#showpassword').click(function(){
            if($(this).is(':checked')){
                $('#password').attr('type','text');
                $('#passwordconf').attr('type','text');
            }else{
                $('#password').attr('type','password');
                $('#passwordconf').attr('type','password');
            }
        });
    });
</script>

