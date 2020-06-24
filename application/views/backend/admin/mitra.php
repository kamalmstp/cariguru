<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5>Data Guru</h5>
            <!-- <span>In some tables you might wish to have some content generated automatically.</span> -->
            <div class="card-header-right">
                <a href="" class="btn btn-primary" type="button" data-original-title="Tambah Data Guru" data-toggle="modal" data-target="#addGuru">Tambah</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <?php if (!empty($this->session->flashdata('success'))) { ?>
                  <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                    <strong>Suksess </strong><?php echo $this->session->flashdata('success'); ?>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  </div>
              <?php }elseif (!empty($this->session->flashdata('error'))) { ?>
                  <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                    <strong>Suksess </strong><?php echo $this->session->flashdata('error'); ?>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  </div>
              <?php } ?>
              <table class="table table-striped table-bordered" id="dataTables">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Provinsi</th>
                    <th>Kabupaten</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i=1;foreach ($data as $value) { ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $value->nama; ?></td>
                            <td><?php echo $value->provinsi; ?></td>
                            <td><?php echo $value->kabupaten; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->no_telp; ?></td>
                            <td>
                                <select name="status<?php echo $value->id_mitra; ?>" id="status<?php echo $value->id_mitra; ?>" class="form-control">
                                    <option value="<?php echo $value->status; ?>"><?php echo $value->status; ?></option>
                                    <option value="Active">Active</option>
                                    <option value="Suspend">suspend</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </td>
                            <td><?php echo $value->joindate; ?></td>
                            <td align="center">
                                <button class="btn btn-sm btn-success" title="update" onclick="updateStatusGuru('<?php echo $value->id_mitra; ?>');"><i class="fa fa-refresh"></i></button>
                                <button class="btn btn-sm btn-danger" title="delete" data-toggle="modal" data-target="#deleteG<?=$value->id_mitra;?>"><i class="fa fa-trash"></i></button>
                                <!-- <button class="btn btn-sm btn-danger" title="delete" onclick="deleteGuru('<?php echo $value->id_mitra; ?>');"><i class="fa fa-trash"></i></button> -->
                                <button class="btn btn-sm btn-warning" title="update" data-toggle="modal" data-target="#editG<?=$value->id_mitra;?>"><i class="fa fa-pencil"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="addGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Guru Baru</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form enctype="multipart/form-data" id="gurudesc" role="form" action="<?=site_url('administrator/mitra_save')?>" method="POST">
          <div class="modal-body">
              <div class="form-group">
                <label class="col-form-label" for="recipient-name">Nama</label>
                <input class="form-control" type="text" name="nama" value="" required="Nama tidak boleh kosong">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="message-text">Email</label>
                <input class="form-control" type="email" name="email" value="">
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <?php 
    foreach ($data as $row): ?>
        <div class="modal fade" id="deleteG<?=$row->id_mitra;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                  <p>
                      Apakah anda yakin ingin menghapus data <b><?=$row->nama;?></b> ?
                  </p>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" onclick="deleteGuru('<?php echo $row->id_mitra; ?>');" type="button">Hapus</button>
                <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>
    <?php endforeach; ?>

    <?php foreach ($data as $row1):?>
        <div class="modal fade" id="editG<?=$row1->id_mitra;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Guru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form enctype="multipart/form-data" id="edit" role="form" method="POST">
                  <div class="form-group">
                    <label class="col-form-label" for="recipient-name">Nama</label>
                    <input type="hidden" name="idguru" value="<?=$row1->id_mitra;?>">
                    <input class="form-control" type="text" name="nama" value="<?=$row1->nama;?>" required="Nama tidak boleh kosong">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="recipient-name">Provinsi</label>
                        <select class="form-control" name="provinsi" required="">
                            <!-- <option selected="" disabled="">Pilih Provinsi</option> -->
                            <?php foreach ($provinsi as $pro) { ?>
                                <option value="<?php echo $pro->id_prov ?>" <?php  if($pro->id_prov == $row1->provinsi) ?>><?php echo $pro->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  <div class="form-group">
                    <label class="col-form-label" for="message-text">Email</label>
                    <input class="form-control" type="email" name="email" value="<?=$row1->email;?>">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="message-text">Telepon</label>
                    <input class="form-control" type="text" name="tel" value="<?=$row1->nomor_hp;?>">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" type="button" onclick="updateGuru();">Simpan</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    <?php endforeach;?>

</div>