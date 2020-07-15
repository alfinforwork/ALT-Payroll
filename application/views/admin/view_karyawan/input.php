<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    
    <div class="box-body">
    <form class="form-horizontal"  action="<?php echo base_url(); ?>karyawan/tambah_proses" method="post">
              <div class="box-body">
            
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIP</label>

                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputEmail3" name="nip" >
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="inputEmail3" name="nama" >
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-md-6">
                   <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                   <option value="">--Jenis Kelamin--</option>
                   <option value="laki-laki">Laki-Laki</option>
                   <option value="perempuan">Perempuan</option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
                  <div class="col-md-6">
                   <select class="form-control" name="jabatan" id="jabatan">
                   <option value="">--Jabatan--</option>
                   <option value="Ketua Komisaris">Ketua Komisaris</option>
                   <option value="CEO">CEO</option>
                   <option value="Chief of Human Resource">Chief of Human Resource</option>
                   <option value="Chief of Technology Officer">Chief of Technology Officer</option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telp</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputEmail3" name="telp" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-md-6">
                    <input type="textarea" class="form-control" id="inputEmail3" name="alamat" >
                  </div>
                </div>
                <button type="submit" class=" col-md-offset-5 col-md-2 btn btn-primary" name="submit">Simpan</button>
             
            </form>
         
    </div>
  
  </div>
</section>