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
					<a class="btn btn-success " href="<?php echo site_url('laporan_penggajian/cetak_laporan/' . $id_proyek) ?>" target="__blank">Cetak PDF</a>
				</div>
				<div class="col-md">
					<form action="<?= site_url("laporan_penggajian/detail/$id_proyek") ?>">
						<div class="input-group">
							<input type="text" name="q" id="q" class="form-control" placeholder="Search">
							<div class="input-group-addon">
								<button class="btn btn-warning">cari</button>
							</div>
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
