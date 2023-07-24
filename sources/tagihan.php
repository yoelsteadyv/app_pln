<?php

$title = "Daftar Tagihan";
require_once "sources/maintemplate/header.php";

if ($data['Level'] == "Pelanggan") {
	$NoPelanggan = $data['Username'];
	if (isset($_GET['q'])) {
		$q = mysqli_real_escape_string($connect, $_GET['q']);
		$selectTarif = mysqli_query($connect, "SELECT * FROM tb_tagihan WHERE NoPelanggan='$NoPelanggan' AND NoTagihan LIKE '%$q%' OR TahunTagih LIKE '%$q%'  ORDER BY KodeTagihan DESC");
	} else {
		$selectTarif = mysqli_query($connect, "SELECT * FROM tb_tagihan WHERE NoPelanggan='$NoPelanggan' ORDER BY KodeTagihan DESC");
	}
} else {
	if (isset($_GET['q'])) {
		$q = mysqli_real_escape_string($connect, $_GET['q']);

		$selectTarif = mysqli_query($connect, "SELECT * FROM tb_tagihan WHERE NoTagihan LIKE '%$q%' OR TahunTagih LIKE '%$q%' ORDER BY KodeTagihan DESC");
	} else {
		$selectTarif = mysqli_query($connect, "SELECT * FROM tb_tagihan ORDER BY KodeTagihan DESC");
	}
}
?>
<?php
include_once "sources/maintemplate/sidebar.php";
?>
<div class="container">

	<form action="index.php" method="GET">
		<div class="dataTable-search mb-3 d-flex justify-content-end">
			<input type="hidden" name="pages" value="tagihan">
			<input type="text" name="q" class="input dataTable-input ml-2" placeholder="Search..." <?php echo isset($_GET['q']) ? "value='" . $_GET['q'] . "'" : ''; ?>>
			<button type="submit" class="btn btn-primary mr-2">Cari</button>
		</div>
	</form>
</div>

<?php
if (mysqli_num_rows($selectTarif) > 0) {
?>
	<?php
	if (checkSession("success_delete_tagihan")) {
	?>
		<div class="alert alert-success" style="margin-top: 75px;">
			<?php echo getSession("success_delete_tagihan"); ?>
		</div>
	<?php
		removeSession('success_delete_tagihan');
	}

	if (checkSession("failed_delete_tagihan")) {
	?>
		<div class="alert alert-danger" style="margin-top: 75px;">
			<?php echo getSession("failed_delete_tagihan"); ?>
		</div>
	<?php
		removeSession('failed_delete_tagihan');
	}

	if (checkSession("have_pembayaran")) {
	?>
		<div class="alert alert-danger" style="margin-top: 75px;">
			<?php echo getSession("have_pembayaran"); ?>
		</div>
	<?php
		removeSession('have_pembayaran');
	}
	?>
	<?php
	if (checkSession("success_konfirmasi_tagihan")) {
	?>
		<div class="alert alert-success" style="margin-top: 75px;">
			<?php echo getSession("success_konfirmasi_tagihan"); ?>
		</div>
	<?php
		removeSession('success_konfirmasi_tagihan');
	}
	?>
	<section class="section">
		<div class="row" id="table-striped">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">View Tagihan</h4>
					</div>
					<div class="card-content">
						<div class="table-responsive">
							<table class="table table-striped tabl-sm">
								<?php
								if ($data['Level'] != "Pelanggan") {
								?>
									<a href="index.php?pages=pilih-pelanggan" class="button-group">
										<button type="button" class="btn btn-primary btn-sm ms-2 mb-2">Buat Tagihan Baru</button>
									</a>
								<?php
								}
								?>
								<thead>

									<tr>
										<th>No</th>
										<th>No Tagihan</th>
										<th>Tahun Tagih</th>
										<th>Bulan Tagih</th>
										<th>Jumlah Pemakaian</th>
										<th>Total Tagihan</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<?php
								$No = 1;
								while ($row = mysqli_fetch_assoc($selectTarif)) {
									$msg = "Apakah anda yakin ingin menghapus No Tagihan " . $row['NoTagihan'];
								?>
									<tr>
										<td><?php echo $No; ?></td>
										<td><?php echo $row['NoTagihan']; ?></td>
										<td><?php echo $row['TahunTagih']; ?></td>
										<td>
											<?php
											$bulan = [
												1 => 'Januari',
												2 => 'Februari',
												3 => 'Maret',
												4 => 'April',
												5 => 'Mei',
												6 => 'Juni',
												7 => 'Juli',
												8 => 'Agustus',
												9 => 'September',
												10 => 'Oktober',
												11 => 'November',
												12 => 'Desember',
											];

											echo $bulan[$row['BulanTagih']];
											?>
										</td>
										<td><?php echo $row['JumlahPemakaian']; ?></td>
										<td><?php echo "Rp " . number_format($row['TotalBayar'], 0, '', '.'); ?></td>
										<td>
											<?php
											if ($row['Status'] == 0) {
												echo "Menunggu Pembayaran";
											} else if ($row['Status'] == 1) {
												echo "Menunggu Konfirmasi";
											} else {
												echo "Lunas";
											}
											?>
										</td>
										<td>
											<a href="index.php?pages=cetaktagihan&amp;NoPelanggan=<?php echo $row['NoPelanggan']; ?>&amp;NoTagihan=<?php echo $row['NoTagihan']; ?>"><i class="bi bi-pass"></i></a>
											<?php
											if ($row['Status'] != 2) {

											?>
												<a href="index.php?pages=inputpembayaran&KodeTagihan=<?php echo $row['KodeTagihan']; ?>" style="color: #00ff00;"><i class="bi bi-check2-square"></i></a>
												<?php
											}
											if ($data['Level'] == "Admin" || $data['Level'] == "Petugas") {
												if ($row['Status'] != 2) {
												?>
													<a href="index.php?pages=edittagihan&NoTagihan=<?php echo $row['NoTagihan']; ?>" style="color: #000;"><i class="bi bi-pencil-square"></i></a>
												<?php
												}
												?><a href="index.php?process=deletetagihan&NoTagihan=<?php echo $row['NoTagihan']; ?>" onclick="return deleteAlert('<?php echo $msg; ?>')"><i class="bi bi-trash"></i></a>
											<?php
											}
											?>
										</td>
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
	if (isset($_GET['q'])) {
		echo "<div style='margin-top:80px;text-align:center;'>Pencarian dengan kata kunci '" . $_GET['q'] . "' tidak ditemukan.<div>";
	} else {
		echo "<div style='margin-top:80px;text-align:center;'>Data Tagihan Tidak ada</div>";
	}
}
require_once "sources/maintemplate/footer.php";
