<?php

$title = "Edit Pelanggan";
require_once "sources/maintemplate/header.php";

if (isset($_GET['NoPelanggan'])) {
	$NoPelanggan = mysqli_real_escape_string($connect, $_GET['NoPelanggan']);

	$selectQuery = mysqli_query($connect, "SELECT * FROM tb_pelanggan WHERE NoPelanggan='$NoPelanggan'");

	if (mysqli_num_rows($selectQuery) > 0) {
		$plg = mysqli_fetch_assoc($selectQuery);
?>
		<?php
		include_once "sources/maintemplate/sidebar.php"
		?>
		<?php
		if (checkSession("success_edit_pelanggan")) {
		?>
			<div class="alert alert-success">
				<?php echo getSession("success_edit_pelanggan"); ?>
			</div>
		<?php
			removeSession('success_edit_pelanggan');
		}

		if (checkSession("failed_edit_pelanggan")) {
		?>
			<div class="alert alert-danger">
				<?php echo getSession("failed_edit_pelanggan"); ?>
			</div>
		<?php
			removeSession('failed_edit_pelanggan');
		}
		?>

		<!-- form -->
		<section id="basic-horizontal-layouts">
			<div class="row match-height">
				<div class="col-md-6 col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Edit Pelanggan</h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form action="index.php?process=editpelanggan" method="post" class="form form-horizontal">
									<div class="form-body">
										<div class="row">
											<!-- no pelanggan -->
											<div class="col-md-4">
												<label for="first-name-horizontal">No Pelanggan</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" class="input form-control" name="NoPelanggan" value="<?php echo $NoPelanggan; ?>" id="NoPelanggan" readonly>
											</div>
											<!-- no pelanggan end -->
											<!-- no meter -->
											<div class="col-md-4">
												<label for="email-horizontal">No Meter</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" class="input form-control" id="NoMeter" name="NoMeter" value="<?php echo $plg['NoMeter']; ?>">
											</div>
											<!-- no meter end -->
											<div class="col-md-4">
												<label for="contact-info-horizontal">Daya/Tarif per KWH</label>
											</div>
											<div class="col-md-8 form-group">
												<fieldset class="form-group">
													<select class="input form-select" name="KodeTarif" id="KodeTarif basicSelect">
														<option value="">Pilih Tarif</option>
														<?php
														//Select Tarif
														$selectQueryTarif = mysqli_query($connect, "SELECT * FROM tb_tarif ORDER BY KodeTarif DESC");
														if (mysqli_num_rows($selectQueryTarif) > 0) {
															while ($tarif = mysqli_fetch_assoc($selectQueryTarif)) {
																if ($plg['KodeTarif'] == $tarif['KodeTarif']) {
																	echo '<option value="' . $tarif['KodeTarif'] . '" selected>' . $tarif['Daya'] . ' Watt / Rp ' . number_format($tarif['TarifPerKwh'], 0, '', '.') . '</option>';
																} else {
																	echo '<option value="' . $tarif['KodeTarif'] . '">' . $tarif['Daya'] . ' Watt / Rp ' . number_format($tarif['TarifPerKwh'], 0, '', '.') . '</option>';
																}
															}
														}
														?>
													</select>
												</fieldset>
											</div>
											<div class="col-md-4">
												<label for="password-horizontal">Nama Lengkap</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" class="input form-control" id="NamaLengkap" name="NamaLengkap" value="<?php echo $plg['NamaLengkap']; ?>">
											</div>
											<div class="col-md-4">
												<label for="password-horizontal">No Telpon</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" class="input form-control" id="Telp" name="Telp" value="<?php echo $plg['Telp']; ?>">
											</div>
											<div class="col-md-4">
												<label for="password-horizontal">Alamat</label>
											</div>
											<div class="col-md-8 form-group">
												<textarea name="Alamat" id="Alamat" class="input form-control" cols="30" rows="3"><?php echo $plg['Alamat']; ?></textarea>
											</div>
											<div class="col-sm-12 d-flex justify-content-end">
												<button type="submit" class="btn btn-primary me-1 mb-1">
													Edit
												</button>
												<button type="reset" class="btn btn-danger me-1 mb-1">
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
		<!-- form end -->

<?php
	} else {
		echo "No Pelanggan Tidak Ditemukan";
	}
} else {
	echo "File Not Found";
}
require_once "sources/maintemplate/footer.php";
?>