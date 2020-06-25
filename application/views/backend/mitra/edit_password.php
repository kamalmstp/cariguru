<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5><?=$page_title;?></h5>
          </div>
          <div class="card-body">
          	<?php if (!empty($this->session->flashdata('success'))) { ?>
                  <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                    <strong>Suksess </strong><?php echo $this->session->flashdata('success'); ?>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  </div>
              <?php }elseif (!empty($this->session->flashdata('error'))) { ?>
                  <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                    <strong>Error </strong><?php echo $this->session->flashdata('error'); ?>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  </div>
              <?php } ?>
          	<form action="<?=site_url('mitraguru/update_password')?>" method="POST">
	            <div class="row mb-2">
	              <div class="col-auto">
	              	<img class="img-70 rounded-circle" alt="" src="<?=base_url();?>public/img/user/user.png"></div>
	              <div class="col">
	                <h3 class="mb-1"><?=$mitra->nama;?></h3>
	                <p class="mb-4"><?=$tipe?></p>
	              </div>
	            </div>
	            <div class="form-group">
	              <label class="form-label">Email-Address</label>
	              <input class="form-control" placeholder="your-email@domain.com" name="email" value="<?=$mitra->email;?>" required>
	            </div>
	            <div class="form-group">
	              <label class="form-label">Password Baru</label>
	              <input class="form-control" type="password" placeholder="Password Baru" name="pass1">
	            </div>
	            <div class="form-group">
	              <label class="form-label">Konfirmasi Password Baru</label>
	              <input class="form-control" type="password" placeholder="Konfirmasi Password" name="pass2">
	            </div>
	            <div class="form-footer">
			        <button class="btn btn-primary" type="submit">Update Profile</button>
	            </div>
	        </form>
          </div>
        </div>
    </div>
</div>