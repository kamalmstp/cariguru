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
                <p class="mb-4">Guru</p>
              </div>
            </div>
            <div class="form-group">
              <h6 class="form-label">Bio</h6>
              <textarea class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
              <label class="form-label">Email-Address</label>
              <input class="form-control" placeholder="your-email@domain.com" name="email" value="<?=$mitra->email;?>">
            </div>
            <div class="form-footer">
              <button class="btn btn-primary btn-block">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <form class="card">
        <div class="card-header">
          <h4 class="card-title mb-0">Edit Profile</h4>
          <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label">Nama</label>
                <input class="form-control" type="text" placeholder="Nama Lengkap" name="nama" value="<?=$mitra->nama;?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" placeholder="Email" name="email" value="<?=$mitra->email;?>">
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
                <input class="form-control" type="text" placeholder="Tempat Lahir" name="tempat_lahir" value="<?=$mitra->provinsi;?>">
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label">Kabupaten</label>
                <input class="form-control" type="date" name="tanggal_lahir" value="<?=$mitra->tanggal_lahir;?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-label">Kecamatan</label>
                <input class="form-control" type="text" placeholder="Home Address">
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <label class="form-label">Kelurahan</label>
                <input class="form-control" type="text" placeholder="City">
              </div>
            </div>
            <!-- <div class="col-md-5">
              <div class="form-group">
                <label class="form-label">Country</label>
                <select class="form-control btn-square">
                  <option value="0">--Select--</option>
                  <option value="1">Germany</option>
                  <option value="2">Canada</option>
                  <option value="3">Usa</option>
                  <option value="4">Aus</option>
                </select>
              </div>
            </div> -->
            <div class="col-md-12">
              <div class="form-group mb-0">
                <label class="form-label">About Me</label>
                <textarea class="form-control" rows="5" placeholder="Enter About your description"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary" type="submit">Update Profile</button>
        </div>
      </form>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title mb-0">Add projects And Upload</h4>
          <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
        </div>
        <div class="table-responsive">
          <table class="table card-table table-vcenter text-nowrap">
            <thead>
              <tr>
                <th>Project Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Price</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a class="text-inherit" href="#">Untrammelled prevents </a></td>
                <td>28 May 2018</td>
                <td><span class="status-icon bg-success"></span> Completed</td>
                <td>$56,908</td>
                <td class="text-right"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
              </tr>
              <tr>
                <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                <td>12 June 2018</td>
                <td><span class="status-icon bg-danger"></span> On going</td>
                <td>$45,087</td>
                <td class="text-right"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
              </tr>
              <tr>
                <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                <td>12 July 2018</td>
                <td><span class="status-icon bg-warning"></span> Pending</td>
                <td>$60,123</td>
                <td class="text-right"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
              </tr>
              <tr>
                <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                <td>14 June 2018</td>
                <td><span class="status-icon bg-warning"></span> Pending</td>
                <td>$70,435</td>
                <td class="text-right"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
              </tr>
              <tr>
                <td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
                <td>25 June 2018</td>
                <td><span class="status-icon bg-success"></span> Completed</td>
                <td>$15,987</td>
                <td class="text-right"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>