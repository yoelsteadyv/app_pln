<?php

if (isset($_GET['KodeTagihan'])) {
	$KodeTagihan = $_GET['KodeTagihan'];
	$selectQuery = mysqli_query($connect, "SELECT * FROM tb_tagihan WHERE KodeTagihan='$KodeTagihan'");
	if (mysqli_num_rows($selectQuery) > 0) {

		$pmb = mysqli_fetch_assoc($selectQuery);

		if ($data['Level'] == "Pelanggan") {
			$title = "Konfirmasi Pembayaran";
		} else {
			$title = "Input Pembayaran";
		}

		require_once "sources/maintemplate/header.php";

?>
		<?php
		include_once "sources/maintemplate/sidebar.php"
		?>
		<?php
		if ($data['Level'] == "Pelanggan") {
			echo '<legend>Konfirmasi Pembayaran</legend>';
		} else {
			// echo '<legend>Input Pembayaran</legend>';
		}
		?>
		<?php
		if (checkSession("imagetype_upload")) {
		?>
			<div class="alert alert-danger">
				<?php echo getSession("imagetype_upload"); ?>
			</div>
		<?php
			removeSession('imagetype_upload');
		}

		if (checkSession("maxsize_upload")) {
		?>
			<div class="alert alert-danger">
				<?php echo getSession("maxsize_upload"); ?>
			</div>
		<?php
			removeSession('maxsize_upload');
		}

		if (checkSession("failed_konfirmasi_tagihan")) {
		?>
			<div class="alert alert-danger">
				<?php echo getSession("failed_konfirmasi_tagihan"); ?>
			</div>
		<?php
			removeSession('failed_konfirmasi_tagihan');
		}
		?>

		<section id="basic-horizontal-layouts">
			<div class="row match-height">
				<div class="col-md-6 col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Konformasi Pembayaran</h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form action="index.php?process=inputpembayaran" method="post" class="form form-horizontal" enctype="multipart/form-data">

									<div class="form-body">
										<div class="row">
											<!-- no pelanggan -->
											<div class="col-md-4">
												<label for="first-name-horizontal">No Tagihan</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" class="input form-control" id="NoTagihan" name="NoTagihan" value="<?php echo $pmb['NoTagihan']; ?>" readonly required></input>
											</div>
											<!-- no pelanggan end -->
											<!-- no meter -->
											<div class="col-md-4">
												<label for="email-horizontal">Tanggal Bayar</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="date" name="TanggalBayar" id="TanggalBayar" class="input form-control flatpickr-range" required></input>
											</div>
											<!-- no meter end -->
											<div class="col-md-4">
												<label for="contact-info-horizontal">Jumlah Tagihan</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" name="JumlahTagihan" id="JumlahTagihan" class="input form-control" required value="<?php echo $pmb['TotalBayar'] ?>"></input>
											</div>
											<div class="col-md-4">
												<label for="email-horizontal">Bukti Pembayaran</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="file" name="BuktiPembayaran" id="BuktiPembayaran" class="input form-control" required></input>
											</div>

											<div class="col-sm-12 d-flex justify-content-end">
												<button type="submit" class="btn btn-primary btn-sm me-1 mb-1">
													Submit
												</button>
												<button type="reset" class="btn btn-danger btn-sm me-1 mb-1">
													Reset
												</button>
											</div>
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
		require_once "sources/maintemplate/footer.php";
		?>

<?php

	} else {
		echo "Kode Pembayaran Tidak ditemukan";
	}
}
?>