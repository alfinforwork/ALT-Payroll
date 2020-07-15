<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-body">
      <a class="btn btn-primary " href="<?php echo site_url('karyawan/tambah') ?>">Tambah Data</a>
      <table class="table">
            <tr>
              <th>NIK</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Jabatan</th>
              <th>Telp</th>
              <th>Alamat</th>
              <th>Action</th>

            </tr>

            <?php 
            $i =1;
            foreach ($data as $key): ?>
                  <tr>
                    
                    <td>  <?php echo $key->nip; ?></td>
                    <td>  <?php echo $key->nama; ?></td>
                    <td>  <?php echo $key->jenis_kelamin; ?></td>
                    <td>  <?php echo $key->jabatan; ?></td>
                    <td>  <?php echo $key->telp; ?></td>
                    <td>  <?php echo $key->alamat; ?></td>
                    <td>
                      <a class="btn btn-warning" href="<?php echo site_url('karyawan/edit/'.$key->nip) ?>"
                       class="btn btn-small"> Edit</a>
                      <a class="btn btn-danger" href="<?php echo site_url('karyawan/delete/'.$key->nip) ?>" 
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