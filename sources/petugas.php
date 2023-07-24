<?php

$title = "Daftar Petugas";
require_once "sources/maintemplate/header.php";

$selectPetugas = mysqli_query($connect, "SELECT * FROM tb_login WHERE Level <> 'Pelanggan' ORDER BY KodeLogin DESC");

if (mysqli_num_rows($selectPetugas) > 0) {
?>
	<?php
	include_once "sources/maintemplate/sidebar.php"
	?>
	<?php
	if (checkSession("success_delete_petugas")) {
	?>
		<div class="alert alert-success">
			<?php echo getSession("success_delete_petugas"); ?>
		</div>
	<?php
		removeSession('success_delete_petugas');
	}

	if (checkSession("failed_delete_petugas")) {
	?>
		<div class="alert alert-danger">
			<?php echo getSession("failed_delete_petugas"); ?>
		</div>
	<?php
		removeSession('failed_delete_petugas');
	}
	?>
	<section class="section">
		<div class="row" id="table-striped">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">View Petugas</h4>
					</div>
					<div class="card-content">
						<div class="table-responsive">
							<table class="table table-striped tabl-sm">
								<a href="index.php?pages=inputpetugas" class="button-group">
									<button type="button" class="btn btn-primary btn-sm ms-2 mb-2">+ Tambah Admin</button>
								</a>
								<thead>

									<tr>
										<th>No</th>
										<th>Username</th>
										<th>Nama Lengkap</th>
										<th>Level</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<?php
								$No = 1;
								while ($ptg = mysqli_fetch_assoc($selectPetugas)) {
									$msg = "Apakah anda yakin ingin menghapus admin atau petugas dengan nama " . $ptg['NamaLengkap'];
								?>
									<tr>
										<td><?php echo $No; ?></td>
										<td><?php echo $ptg['Username']; ?></td>
										<td><?php echo $ptg['NamaLengkap']; ?></td>
										<td><?php echo $ptg['Level']; ?></td>
										<td><a href="index.php?pages=editpetugas&KodeLogin=<?php echo $ptg['KodeLogin']; ?>"><i class="bi bi-pencil-square"></i></a>
											<?php
											if ($ptg['Username'] != $_SESSION['Username']) {
											?>
												<a href="index.php?process=deletepetugas&KodeLogin=<?php echo $ptg['KodeLogin']; ?>" onclick="return deleteAlert('<?php echo $msg; ?>')"><i class="bi bi-trash"></i></a>
										</td>
									<?php
											}
									?>
									</tr>
								<?php
									$No++;
								}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
<?php
} else {
	echo "Tidak ada ada petugas atau admin";
}
require_once "sources/maintemplate/footer.php";
