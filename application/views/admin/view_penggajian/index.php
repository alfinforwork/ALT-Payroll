<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-body">
      <a class="btn btn-warning " href="<?php echo site_url('penggajian/tambah') ?>">Tambah Data</a>
      <table class="table">
            <tr>
              <th>ID Detail</th>
              <th>ID Proyek</th>
              <th>NIK</th>
              <th>Jobdesk</th>
              <th>Gaji</th>
              <th>Action</th>
            </tr>

            <?php 
            $i =1;
            foreach ($data as $key): ?>
                  <tr>
                    
                    <td>  <?php echo $key->id_penggajian; ?></td>
                    <td>  <?php echo $key->id_proyek; ?></td>
                    <td>  <?php echo $key->nik; ?></td>
                    <td>  <?php echo $key->id_jodesk; ?></td>
                    <td>  <?php echo $key->gaji; ?></td>

                    <td>
                      <a class="btn btn-warning" href="<?php echo site_url('penggajian/edit/'.$key->id_penggajian) ?>"
                       class="btn btn-small"> Edit</a>
                      <a class="btn btn-danger" href="<?php echo site_url('penggajian/delete/'.$key->id_penggajian) ?>" 
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