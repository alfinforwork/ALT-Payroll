<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-body">
      <a class="btn btn-primary " href="<?php echo site_url('jobdesk/tambah') ?>">Tambah Data</a>
      <table class="table">
            <tr>
              <th>ID Jobdesk</th>
              <th>Jobdesk</th>
              <th>Persentase fee</th>
              <th>Action</th>

            </tr>

            <?php 
            $i =1;
            foreach ($data as $key): ?>
                  <tr>
                    
                    <td>  <?php echo $key->id_jobdesk; ?></td>
                    <td>  <?php echo $key->jobdesk; ?></td>
                    <td>  <?php echo $key->persen_upah; ?></td>

                    <td>
                      <a class="btn btn-warning" href="<?php echo site_url('jobdesk/edit/'.$key->id_jobdesk) ?>"
                       class="btn btn-small"> Edit</a>
                      <a class="btn btn-danger" href="<?php echo site_url('jobdesk/delete/'.$key->id_jobdesk) ?>" 
                       class="btn btn-small text-danger"> Hapus</a>
                    </td>
                  </tr>
            <?php endforeach; ?>
    
      </table>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->