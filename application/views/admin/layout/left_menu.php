<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/skins/_all-skins.css">
	<title>Document</title>
</head>

<body>
	<li class="header">MAIN MENU</li>
	<li>
		<?php echo anchor('dashboard', '<i class="fa fa-home"></i> <span>Dashboard</span>'); ?>
	</li>
	<li>
		<?php echo anchor('proyek', '<i class="fa fa-files-o"></i> <span>Proyek</span>'); ?>
	</li>
	<li class="treeview">
		<a href="#">
			<i class="fa fa-folder-open-o"></i>
			<span>File</span>
			<span class="pull-right-container">
				<span class="fa fa-angle-left pull-right"></span>
			</span>
		</a>
		<ul class="treeview-menu">
			<li> <?php echo anchor('freelancer', '<i class="fa fa-id-badge"></i><span>Freelancer</span>'); ?></li>
			<li> <?php echo anchor('karyawan', '<i class="fa fa-id-card-o"></i><span>Karyawan</span>'); ?></li>
			<li> <?php echo anchor('jobdesk', '<i class="fa fa-check-square-o"></i><span>Jobdesk</span>'); ?></li>
			<li><a href="pages/layout/top-nav.html"><i class="fa fa-key"></i> User</a></li>
		</ul>
	</li>
	<li class="treeview">
		<a href="#">
			<i class="fa fa-folder-open-o"></i>
			<span>Laporan</span>
			<span class="pull-right-container">
				<span class="fa fa-angle-left pull-right"></span>
			</span>
		</a>
		<ul class="treeview-menu">
			<li><a href="<?= site_url('slip_gaji') ?>"><i class="fa fa-money"></i> Slip Gaji</a></li>
			<li><a href="<?= site_url('laporan_penggajian') ?>"><i class="fa fa-print"></i> Laporan Penggajian</a></li>
		</ul>
	</li>
</body>

</html>
