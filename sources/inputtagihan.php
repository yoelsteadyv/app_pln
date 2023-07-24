<?php

$title = "Buat Tagihan Baru";

require_once "sources/maintemplate/header.php";

if (isset($_GET['NoPelanggan'])) {
	$NoPelanggan = mysqli_real_escape_string($connect, $_GET['NoPelanggan']);
	$selectQuery = mysqli_query($connect, "SELECT * FROM tb_pelanggan WHERE NoPelanggan='$NoPelanggan'");
	if (mysqli_num_rows($selectQuery) > 0) {
		$row = mysqli_fetch_assoc($selectQuery);
?>
		<?php
		include_once "sources/maintemplate/sidebar.php"
		?>

		<?php
		if (checkSession("success_input_tagihan")) {
		?>
			<div class="alert alert-success">
				<?php echo getSession("success_input_tagihan"); ?>
			</div>
		<?php
			removeSession('success_input_tagihan');
		}

		if (checkSession("failed_input_tagihan")) {
		?>
			<div class="alert alert-danger">
				<?php echo getSession("failed_input_tagihan"); ?>
			</div>
		<?php
			removeSession('failed_input_tagihan');
		}
		if (checkSession("failed_input_tagihan_same")) {
		?>
			<div class="alert alert-danger">
				<?php echo getSession("failed_input_tagihan_same"); ?>
			</div>
		<?php
			removeSession('failed_input_tagihan_same');
		}
		?>


		<section id="basic-horizontal-layouts">
			<div class="row match-height">
				<div class="col-md-6 col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Add Tagihan Baru</h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form action="index.php?process=inputtagihan" method="post" class="form form-horizontal">

									<div class="form-body">
										<div class="row">
											<!-- no pelanggan -->
											<div class="col-md-4">
												<label for="first-name-horizontal">No Pelanggan</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" class="input form-control" id="NoPelanggan" name="NoPelanggan" value="<?php echo $row['NoPelanggan']; ?>" readonly required>
											</div>
											<!-- no pelanggan end -->
											<!-- no meter -->
											<div class="col-md-4">
												<label for="email-horizontal">Tahun Tagih</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" class="input form-control" id="TahunTagih" name="TahunTagih" value="<?php echo date('Y'); ?>" required>
											</div>
											<!-- no meter end -->
											<div class="col-md-4">
												<label for="contact-info-horizontal">Bulan Tagih</label>
											</div>
											<div class="col-md-8 form-group">
												<fieldset class="form-group">
													<select name="BulanTagih" id="BulanTagih" class="input form-select" required>
														<option value="">Pilih Bulan</option>
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

														for ($i = 1; $i <= 12; $i++) {
															echo '<option value="' . $i . '">' . $bulan[$i] . '</option>';
														}
														?>
													</select>
												</fieldset>
											</div>
											<div class="col-md-4">
												<label for="email-horizontal">Jumlah Pemakaian</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" class="input form-control" id="JumlahPemakaian" name="JumlahPemakaian" placeholder="Jumlah Pemakaian" required>
											</div>

											<div class="col-sm-12 d-flex justify-content-end">
												<button type="submit" class="btn btn-primary btn-sm me-1 mb-1">
													Add
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
	} else {
		echo "No Pelanggan Tidak Ditemukan";
	}
} else {
}
require_once "sources/maintemplate/footer.php";
?>