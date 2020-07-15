<!-- Main content -->
<section class="content">

	<div class="box">
		<form class="form-horizontal" action="<?php echo base_url("detail/edit_proses/$id_proyek/$id_penggajian"); ?>" method="post">
			<div class="box-body">
				<div class="form-group">
					<label for="freelance" class="col-sm-2 control-label">NIK <?= form_error('freelance') ?></label>
					<div class="col-md-6">
						<select class="form-control" id="freelance" name="freelance" required>
							<option value="">Pilih Freelancer</option>
							<?php foreach ($data_freelance as $k) { ?>
								<option value="<?= $k->nik ?>" <?= $k->nik == $data->nik ? 'selected' : '' ?>><?= $k->nik . ' - ' . $k->nama ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="jobdesk" class="col-sm-2 control-label">Jobdesk <?= form_error('jobdesk') ?></label>
					<div class="col-md-6">
						<select class="form-control" id="jobdesk" name="jobdesk" onchange="persen()" required>
							<option value="">Pilih Jobdesk</option>
							<?php foreach ($data_jobdesk as $k) { ?>
								<option value="<?= $k->id_jobdesk ?>" <?= $k->id_jobdesk == $data->id_jobdesk ? 'selected' : '' ?>><?= $k->jobdesk . " | " . $k->persen_upah . "%" ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="persenjobdesk" class="col-sm-2 control-label">Persen Jobdesk</label>
					<div class="col-md-6">
						<input class="form-control" id="persenjobdesk" name="persenjobdesk" disabled>
					</div>
				</div>
				<div class="form-group">
					<label for="totalbudged" class="col-sm-2 control-label">Total Buged</label>
					<div class="col-md-6">
						<input class="form-control" id="totalbudged" name="totalbudged" value="<?= $data_proyek_row->total_budget ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="gaji" class="col-sm-2 control-label">Gaji <?= form_error('gaji') ?></label>
					<div class="col-md-6">
						<input class="form-control" id="gaji" name="gaji" readonly>
					</div>
				</div>
				<button type="submit" class=" col-md-offset-5 col-md-2 btn btn-warning" name="submit">Simpan</button>

		</form>

	</div>

</section>
<script>
	var totalbudget = Math.abs(document.getElementById('totalbudged').value);
	fetch(`<?= site_url("detail/api_persen/$data->id_jobdesk") ?>`)
		.then(response => response.json())
		.then(res => {
			console.log(res);
			document.getElementById('persenjobdesk').value = res.persen_upah;


			var persenjobdesk = Math.abs(res.persen_upah) / 100;
			console.log(persenjobdesk * totalbudget);
			document.getElementById('gaji').value = persenjobdesk * totalbudget;
		})

	function persen() {
		id_jobdesk = document.getElementById('jobdesk').value;
		var totalbudget = Math.abs(document.getElementById('totalbudged').value);
		fetch(`<?= site_url("detail/api_persen/") ?>${id_jobdesk}`)
			.then(response => response.json())
			.then(res => {
				console.log(res);
				document.getElementById('persenjobdesk').value = res.persen_upah;


				var persenjobdesk = Math.abs(res.persen_upah) / 100;
				console.log(persenjobdesk * totalbudget);
				document.getElementById('gaji').value = persenjobdesk * totalbudget;
			})

	}
</script>
