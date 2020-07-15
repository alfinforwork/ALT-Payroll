<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    
    <div class="box-body">
    <form class="form-horizontal"  action="<?php echo base_url(); ?>proyek/edit_proses" method="post">
              <div class="box-body">
            
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Id Proyek</label>

                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $data->id_proyek ;?>"name="id_proyek" >
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Proyek</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="inputEmail3" value="<?php echo $data->nama_proyek;?>"name="nama_proyek" >
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Client</label>

                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $data->nama_client ;?>"name="nama_client" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Waktu</label>
                  <div class="col-md-6">
                    <input type="date" class="form-control" id="inputEmail3" value="<?php echo $data->tanggal_mulai_proyek ;?>"name="tanggal_mulai_proyek">
                    <label for="inputEmail3" class="col-sm-2 control-label">s/d</label>
                    <input type="date" class="form-control" id="inputEmail3" value="<?php echo $data->deadline_proyek ;?>"name="deadline_proyek">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Total Budget</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $data->total_budget ;?>" name="total_budget" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-md-6">
                    <input type="textarea" class="form-control" id="inputEmail3" value="<?php echo $data->keterangan ;?>" name="keterangan" >
                  </div>
                </div>
                <button type="submit" class=" col-md-offset-5 col-md-2 btn btn-warning" name="submit">Edit</button>
             
            </form>
         
    </div>
  
  </div>
</section>