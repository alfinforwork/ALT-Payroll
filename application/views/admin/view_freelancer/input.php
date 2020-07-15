<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    
    <div class="box-body">
    <form class="form-horizontal"  action="<?php echo base_url(); ?>freelancer/tambah_proses" method="post">
              <div class="box-body">
            
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>

                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputEmail3" name="nik" >
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputEmail3" name="email" >
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
                    <input type="text" class="form-control" id="inputEmail3" name="alamat" >
                  </div>
                </div>
                <button type="submit" class=" col-md-offset-5 col-md-2 btn btn-primary" name="submit">Simpan</button>
             
            </form>
         
    </div>
  
  </div>
</section>