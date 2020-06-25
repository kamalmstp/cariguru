<script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#provinsi").change(function (){
            var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+$(this).val();
            $('#kabupaten').load(url);
            return false;
        })
		
		$("#kabupaten").change(function (){
            var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+$(this).val();
            $('#kecamatan').load(url);
            return false;
        })
		
		$("#kecamatan").change(function (){
            var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"+$(this).val();
            $('#desa').load(url);
            return false;
        })
    });
</script>

<div class="edit-profile">
  <div class="row">
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title mb-0">Biodata</h4>
          <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
        </div>
        <div class="card-body">
        <form>
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
              <input class="form-control" placeholder="your-email@domain.com" name="email" value="<?=$mitra->email;?>" readonly="readonly">
            </div>
            <div class="form-group">
              <label class="form-label">Password</label>
              <input class="form-control" placeholder="*******" name="email" readonly="readonly">
            </div>
            <div class="form-footer">
              <!-- <button class="btn btn-primary btn-block">Ubah Password</button> -->
            </div>
          </form>
    	</div>
	  </div>
	</div>
	<div class="col-lg-8">

		<form class="card" method="POST" action="<?=site_url('mitraguru/biodata_update')?>">
	        <div class="card-header">
	          <h4 class="card-title mb-0">Biodata</h4>
	          <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
	        </div>
	        <div class="card-body">
          		<div class="row">
			        <div class="col-md-12">
		              <div class="form-group">
		                <label class="form-label">Nama Lengkap</label>
		                <input class="form-control" type="text" placeholder="Nama Lengkap" name="nama" value="<?=$mitra->nama;?>">
		                <input type="hidden" name="id" value="<?=$mitra->user_id;?>">
		              </div>
		            </div>
		            <div class="col-sm-6 col-md-6">
		              <div class="form-group">
		                <label class="form-label">Tempat Lahir</label>
		                <input class="form-control" type="text" placeholder="Tempat Lahir" name="tempat_lahir" value="<?=$mitra->tempat_lahir;?>">
		              </div>
		            </div>
		            <div class="col-sm-6 col-md-6">
		              <div class="form-group">
		                <label class="form-label">Tanggal Lahir</label>
		                <input class="form-control" type="date" name="tanggal_lahir" value="<?=$mitra->tanggal_lahir;?>">
		              </div>
		            </div>

					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<label class="form-label">Provinsi</label>
							<select name="prov" class="form-control" id="provinsi">
								<option value="<?=$pr[0]->id?>"><?=$pr[0]->nama?></option>
								<?php foreach($provinsi as $prov){
									echo '<option value="'.$prov->id.'" '.$select.'>'.$prov->nama.'</option>';
								} ?>
							</select>
						</div>
					</div>
					
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<label>Kabupaten/Kota</label>
							<select name="kab" class="form-control" id="kabupaten">
								<option value="<?=$kb[0]->id;?>"><?=$kb[0]->nama?></option>
							</select>
						</div>
					</div>

					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<label>Kecamatan</label>
							<select name="kec" class="form-control" id="kecamatan">
								<option value="<?=$kc[0]->id;?>"><?=$kc[0]->nama?></option>
							</select>
						</div>
					</div>

					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<label>Kelurahan/Desa</label>
							<select name="des" class="form-control" id="desa">
								<option value="<?=$kl[0]->id;?>"><?=$kl[0]->nama?></option>
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
		              <div class="form-group">
		                <label class="form-label">Nomor Telpon</label>
		                <input class="form-control" type="text" placeholder="Nomor Telpon" name="telp" value="<?=$mitra->no_telp;?>">
		              </div>
		            </div>
					<div class="col-md-12">
		              <div class="form-group mb-0">
		                <label class="form-label">Alamat Lengkap</label>
		                <textarea class="form-control" name="alamat" rows="2" placeholder="Alamat Lengkap"><?=$mitra->alamat?></textarea>
		              </div>
		            </div>
		            <div class="col-md-12">
		              <div class="form-group mb-0">
		                <label class="form-label">Tentang Saya</label>
		                <textarea class="form-control" name="tentang" rows="5" placeholder="Masukkan Deskripsi Tentang Saya"><?=$mitra->tentang?></textarea>
		              </div>
		            </div>
				</div>
			</div>

			<div class="card-footer text-right">
	          <button class="btn btn-primary" type="submit">Update Profile</button>
	        </div>
	      </form>
	</div>
  </div>
</div>