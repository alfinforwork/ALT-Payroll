<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-body">
			<form action="<?= site_url('slip_gaji/cetak_laporan') ?>" target="__blank">
				<div class="form-group">
					<label for="freelance">NIK</label>
					<select name="freelance" id="freelance" class="form-control">
						<option value="">Pilih Freelance</option>
						<?php foreach ($data_freelance as $k) { ?>
							<option value="<?= $k->nik ?>"><?= $k->nik . ' - ' . $k->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="proyek">Proyek</label>
					<select name="proyek" id="proyek" class="form-control">
						<option value="">Pilih Proyek</option>
						<?php foreach ($data_proyek as $k) { ?>
							<option value="<?= $k->id_proyek ?>"><?= $k->nama_proyek ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-success">Cetak</button>
			</form>


		</div>
		<!-- /.box-body -->
		<div class="box-footer">

		</div>
		<!-- /.box-footer-->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->
