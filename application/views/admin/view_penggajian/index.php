<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-body">
			<div style="margin-top: 10px;margin-bottom: 10px">
				<?= $this->session->flashdata('message') ?>
			</div>
			<div class="row">
				<div class="col-md-6">
					<a class="btn btn-warning " href="<?php echo site_url('detail/tambah/' . $id_proyek) ?>">Tambah Data</a>
				</div>
				<div class="col-md">
					<form action="<?= site_url("detail/index/$id_proyek") ?>">
						<div class="input-group">
							<input type="text" name="q" id="q" class="form-control" placeholder="Search">
							<button class="btn btn-warning">cari</button>
						</div>
					</form>
				</div>
			</div>
			<table class="table">
				<tr>
					<th>No</th>
					<th>ID Detail</th>
					<th>ID Proyek</th>
					<th>NIK</th>
					<th>Nama Freelance</th>
					<th>Jobdesk</th>
					<th>Gaji</th>
					<th>Action</th>
				</tr>

				<?php $nomor = 1;
				foreach ($data as $key) : ?>
					<tr>
						<td><?php echo $nomor++; ?></td>
						<td> <?php echo $key->id_penggajian; ?></td>
						<td> <?php echo $key->id_proyek; ?></td>
						<td> <?php echo $key->nik; ?></td>
						<td> <?php echo $key->nama_freelance; ?></td>
						<td> <?php echo $key->jobdesk; ?></td>
						<td> <?php echo $key->gaji; ?></td>

						<td>
							<a class="btn btn-warning" href="<?php echo site_url("detail/edit/$id_proyek/" . $key->id_penggajian) ?>" class="btn btn-small"> Edit</a>
							<a class="btn btn-danger" href="<?php echo site_url("detail/delete/$id_proyek/" . $key->id_penggajian) ?>" class="btn btn-small text-danger"> Hapus</a>
						</td>
					</tr>
				<?php endforeach; ?>

			</table>

		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<?= $pagination ?>
		</div>
		<!-- /.box-footer-->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->
