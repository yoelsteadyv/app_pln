<?php

$title = "Daftar Pembayaran";
require_once "sources/maintemplate/header.php";

$KodePembayaran = mysqli_real_escape_string($connect, $_GET['KodePembayaran']);

$selectQuery = mysqli_query($connect, "SELECT * FROM tb_pembayaran INNER JOIN tb_tagihan USING(KodeTagihan) WHERE KodePembayaran='$KodePembayaran' ORDER BY KodePembayaran DESC");

if (mysqli_num_rows($selectQuery) > 0) {
	$pmb = mysqli_fetch_assoc($selectQuery);
?>
	<style type="text/css">
		label {
			margin-bottom: 10px;
		}
	</style>
	<?php
	include_once "sources/maintemplate/sidebar.php"
	?>

	<?php
	if (checkSession("success_edit_detail_pembayaran")) {
	?>
		<div class="alert alert-success">
			<?php echo getSession("success_edit_detail_pembayaran"); ?>
		</div>
	<?php
		removeSession('success_edit_detail_pembayaran');
	}

	if (checkSession("failed_edit_detail_pembayaran")) {
	?>
		<div class="alert alert-danger">
			<?php echo getSession("failed_edit_detail_pembayaran"); ?>
		</div>
	<?php
		removeSession('failed_edit_detail_pembayaran');
	}

	if (checkSession("validasi_pembayaran")) {
	?>
		<div class="alert alert-danger">
			<?php echo getSession("validasi_pembayaran"); ?>
		</div>
	<?php
		removeSession('validasi_pembayaran');
	}
	?>

	<section id="basic-horizontal-layouts">
		<div class="row match-height">
			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Detail Pembayaran</h4>
					</div>
					<div class="card-content">
						<div class="card-body">
							<form action="index.php?process=detailpembayaran&KodePembayaran=<?php echo $pmb['KodePembayaran']; ?>" method="post" class="form form-horizontal">

								<div class="form-body">
									<div class="row">
										<!-- no pelanggan -->
										<div class="col-md-4">
											<label for="first-name-horizontal">No Tagihan</label>
										</div>
										<div class="col-md-8 form-group">
											<input type="text" class="input form-control disable" value="<?php echo $pmb['NoTagihan']; ?>" readonly>
										</div>
										<!-- no pelanggan end -->
										<!-- no meter -->
										<div class="col-md-4">
											<label for="email-horizontal">Tanggal Bayar</label>
										</div>
										<div class="col-md-8 form-group">
											<input type="text" class="input form-control disable" value="<?php echo date('d-m-Y', strtotime($pmb['TglBayar'])); ?>" readonly>
										</div>
										<div class="col-md-4">
											<label for="email-horizontal">Jumlah Tagihan</label>
										</div>
										<div class="col-md-8 form-group">
											<input type="text" class="input form-control disable" value="<?php echo "Rp " . number_format($pmb['TotalBayar'], 0, '', '.'); ?>" readonly>
										</div>
										<!-- no meter end -->
										<div class=" col-md-4">
											<label for="contact-info-horizontal">Bukti Pembayaran</label>
										</div>
										<div class="col-md-8 form-group">
											<img src="assets/images/tagihan/<?php echo $pmb['BuktiPembayaran']; ?>" style="width:250px;height:300px;">
										</div>
										<!--  -->
										<!--  -->
										<?php
										if ($data['Level'] == "Admin" || $data['Level'] == "Petugas") {

											if ($pmb['Status'] != "2") {
										?>
												<div class="col-md-4">
													<label for="email-horizontal">Set Status Pembayaran</label>
												</div>
												<div class="col-md-8 form-group">
													<input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="Status">
													<label class="form-check-label" for="checkboxGlow1"> Lunas</label>
												</div>
												<div class="col-sm-12 d-flex justify-content-end">
													<button type="submit" class="btn btn-success btn-sm me-1 mb-1">Submit</button>
													<button type="reset" class="btn btn-danger btn-sm me-1 mb-1">Reset</button>
												</div>
											<?php
											} else {
											?>
												<div class="col-md-4">
													<label>Statuss</label>
												</div>
												<div class="col-md-8 form-group">
													<input type="text" class="input form-control disable" value="Lunas" readonly>
												</div>
											<?php
											}
										} else {
											if ($pmb['Status'] == 0) {
												$status = "Menunggu Pembayaran";
											} else if ($pmb['Status'] == 1) {
												$status = "Menunggu Konfirmasi";
											} else {
												$status = "Lunas";
											}
											?>
											<div class="col-md-4">
												<label>Statuss</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" class="input form-control disable" value="<?php echo $status; ?>" readonly>
											</div>
										<?php
										}
										?>

										<!--  -->

									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--  -->


<?php
} else {
	echo "Data Pembayaran Tidak ada";
}
require_once "sources/maintemplate/footer.php";
