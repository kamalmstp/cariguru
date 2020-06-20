<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5><?=$page_title;?></h5>
            <div class="card-header-right">
                <a href="" class="btn btn-primary" type="button" data-original-title="Tambah Data Jenjang" data-toggle="modal" data-target="#addJenjang">Tambah</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered" id="dataTables">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i=1;foreach ($data as $value) { ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $value->nama; ?></td>
                            <td align="center">
                                <button class="btn btn-sm btn-danger" title="delete" data-toggle="modal" data-target="#deleteG<?=$value->id_jenjang;?>"><i class="fa fa-trash"></i></button>
                                <button class="btn btn-sm btn-warning" title="update" data-toggle="modal" data-target="#editG<?=$value->id_jenjang;?>"><i class="fa fa-pencil"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

  <div class="modal fade" id="addJenjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form enctype="multipart/form-data" action="<?=site_url('administrator/jenjang_save')?>" method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Jenjang Baru</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label class="col-form-label" for="recipient-name">Nama</label>
                <input class="form-control" type="text" name="nama" value="" required="Nama tidak boleh kosong">
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
        <div class="modal fade" id="deleteG<?=$row->id_jenjang;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form enctype="multipart/form-data" action="<?=site_url('administrator/jenjang_del')?>" method="POST">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                  <p>
                      Apakah anda yakin ingin menghapus data <b><?=$row->nama;?></b> ?
                  </p>
                  <input type="hidden" name="id" value="<?=$row->id_jenjang;?>">
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" type="submit">Hapus</button>
                <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    <?php endforeach; ?>

    <?php foreach ($data as $row1):?>
        <div class="modal fade" id="editG<?=$row1->id_jenjang;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form enctype="multipart/form-data" action="<?=site_url('administrator/jenjang_update')?>" method="POST">
              <div class="modal-header">
                <h5 class="modal-title">Edit Jenjang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label class="col-form-label" for="recipient-name">Nama</label>
                    <input type="hidden" name="id" value="<?=$row1->id_jenjang;?>">
                    <input class="form-control" type="text" name="nama" value="<?=$row1->nama;?>" required="Nama tidak boleh kosong">
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Update</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    <?php endforeach;?>

</div>