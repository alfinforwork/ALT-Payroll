<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cetak Laporan</title>
	<style>
		table {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		table td,
		table th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		table tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		table tr:hover {
			background-color: #ddd;
		}

		table th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>

<body>

	<table>
		<tr>
			<th>No</th>
			<th>ID Detail</th>
			<th>ID Proyek</th>
			<th>NIK</th>
			<th>Nama Freelance</th>
			<th>Jobdesk</th>
			<th>Gaji</th>
		</tr>

		<?php
		$nomor = 1;
		$jumlah_biaya = 0;
		foreach ($data as $key) : ?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td> <?php echo $key->id_penggajian; ?></td>
				<td> <?php echo $key->id_proyek; ?></td>
				<td> <?php echo $key->nik; ?></td>
				<td> <?php echo $key->nama; ?></td>
				<td> <?php echo $key->jobdesk; ?></td>
				<td> <?php echo $key->gaji; ?></td>
			</tr>
		<?php $jumlah_biaya += $key->gaji;
		endforeach; ?>

	</table>
	<p style="text-align: right">
		<b>Jumlah Biaya</b> : <?= $jumlah_biaya ?>
	</p>
	<script>
		window.print();
		window.onafterprint = function() {
			window.close();
		}
	</script>
</body>

</html>
