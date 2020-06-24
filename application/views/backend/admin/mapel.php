

<div class="row">
  <div class="col-sm-12 col-xl-6 xl-100">
    <div class="card">
      <div class="card-header">
        <h5>Data Mata Pelajaran</h5>
        <div class="card-header-right">
          <a href="" class="btn btn-primary" type="button" data-original-title="Tambah Data Mapel" data-toggle="modal" data-target="#addMapel">Tambah</a>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3 col-xs-12">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            </div>
          </div>
          <div class="col-sm-9 col-xs-12">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="col-sm-12 col-xl-6 xl-100">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3 col-xs-12">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <?php foreach ($jenjang as $row): ?>
                <a class="nav-link" data-toggle="pill" href="JavaScript:void(0);" onclick="jenjang('<?php echo $row['id_jenjang'] ?>');" role="tab" aria-controls="jenjang" aria-selected="true"><?=$row['nama']?></a>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="col-sm-9 col-xs-12">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="jenjang-tab">
                <div id="mapel">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="modal fade" id="addMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Mapel Baru</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data" id="mapeldesc" role="form" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="recipient-name">Nama Mata Pelajaran</label>
                <input class="form-control" type="text" name="nama" value="" required="Nama tidak boleh kosong">
                <div class="form-group">
                  <label class="col-form-label" for="recipient-name">Jenjang</label>
                  <select class="form-control" name="jenjang" id="jenjang" required="">
                      <option selected="" disabled="">Pilih Jenjang</option>
                      <?php foreach ($jenjang as $j) { ?>
                          <option value="<?php echo $j['id_jenjang'] ?>"><?php echo $j['nama']; ?></option>
                      <?php } ?>
                  </select>
                </div>
 
               <div class="form-group">
                  <label class="col-form-label" for="recipient-name">Kurikulum</label>
                  <select class="form-control" name="kurikulum" id="kurikulum" required="">
                      <option selected="" disabled="">Pilih Kurikulum</option>
                      <?php foreach ($kurikulum as $k) { ?>
                          <option value="<?php echo $k['id_kurikulum'] ?>"><?php echo $k['nama']; ?></option>
                      <?php } ?>
                  </select>
                  <i>*) kurikulum bisa dikosongkan</i>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" onclick="storeMapel();">Simpan</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

</div>

<script>
  function jenjang(id){
    $.ajax({
        url: "<?php echo base_url('admin/get_mapel_jenjang/'); ?>" + id,
        method: "POST",
        data: {"id": id},
        success: function (data) {
            $('#mapel').html(data);
        }
    });
  }

  function storeMapel() {        
    var form = $('#mapeldesc').get(0);
    $('#loader').show();
    $.ajax({
        url: '<?php echo base_url('admin/store_mapel') ?>',
        method: "POST",
        data: new FormData(form),
        contentType: false,
        processData: false,
        success: function (resp) {
            $('#alert').html(resp);
            $('#loader').hide();
            dataMapel();
        }
    });
    $("[data-dismiss=modal]").trigger({type: "click"});
  }
</script>