<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    
    <div class="box-body">
    <form class="form-horizontal"  action="<?php echo base_url(); ?>freelancer/edit_proses" method="post">
              <div class="box-body">
            
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>

                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $data->nik;?>" name="nik" >
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="inputEmail3" value="<?php echo $data->nama ;?>"name="nama" >
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-md-6">
                   <select class="form-control" value="<?php echo $data->jenis_kelamin ;?>"name="jenis_kelamin" id="jenis_kelamin">
                   <option value="<?php echo $data->jenis_kelamin ;?>"><?php echo $data->jenis_kelamin ;?></option>
                   <option value="laki-laki">Laki-Laki</option>
                   <option value="perempuan">Perempuan</option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $data->email ;?>" name="email" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telp</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputEmail3"value="<?php echo $data->telp ;?>" name="telp" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputEmail3"value="<?php echo $data->alamat;?>" name="alamat" >
                  </div>
                </div>
                <button type="submit" class=" col-md-offset-5 col-md-2 btn btn-primary" name="submit">Edit</button>
             
            </form>
         
    </div>
  
  </div>
</section>