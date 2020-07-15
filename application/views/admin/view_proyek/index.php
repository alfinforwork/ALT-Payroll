<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-body">
      <a class="btn btn-warning " href="<?php echo site_url('proyek/tambah') ?>">Tambah Data</a>
      <table class="table">
            <tr>
              <th>ID Proyek</th>
              <th>Nama Proyek</th>
              <th>Nama Client</th>
              <th>Start</th>
              <th>Deadline</th>
              <th>Total Budget</th>
              <th>Keterangan</th>
              <th>Detail</th>
              <th>Action</th>

            </tr>

            <?php 
            $i =1;
            foreach ($data as $key): ?>
                  <tr>
                    
                    <td>  <?php echo $key->id_proyek; ?></td>
                    <td>  <?php echo $key->nama_proyek; ?></td>
                    <td>  <?php echo $key->nama_client; ?></td>
                    <td>  <?php echo $key->tanggal_mulai_proyek; ?></td>
                    <td>  <?php echo $key->deadline_proyek; ?></td>
                    <td>  <?php echo $key->total_budget; ?></td>
                    <td>  <?php echo $key->keterangan; ?></td>
                    <td>
                    <a class="btn btn-primary" href="<?php echo site_url('detail/'.$key->id_proyek) ?>"
                    class="btn btn-small"> Detail</a>
                    </td>

                    <td>
                      <a class="btn btn-warning" href="<?php echo site_url('proyek/edit/'.$key->id_proyek) ?>"
                       class="btn btn-small"> Edit</a>
                      <a class="btn btn-danger" href="<?php echo site_url('proyek/delete/'.$key->id_proyek) ?>" 
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