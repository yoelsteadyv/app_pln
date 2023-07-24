<?php
$title = "Tambah Pelanggan Baru";
require_once "sources/maintemplate/header.php";

$selectQuery = mysqli_query($connect, "SELECT * FROM tb_pelanggan ORDER BY NoPelanggan DESC");
if (mysqli_num_rows($selectQuery) > 0) {
	$NoPLG = mysqli_fetch_assoc($selectQuery);
	$NoPelanggan = explode('PLG', $NoPLG['NoPelanggan'])[1] + 1;
} else {
	$NoPelanggan = "PLG1000000";
}
?>
<?php
include_once "sources/maintemplate/sidebar.php"
?>


<section id="basic-horizontal-layouts">
	<div class="row match-height">
		<div class="col-md-6 col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Tambah Pelanggan</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<form action="index.php?process=inputpelanggan" method="post" class="form form-horizontal">
							<div class="form-body">
								<div class="row">
									<!-- no pelanggan -->
									<div class="col-md-4">
										<label for="first-name-horizontal">No Pelanggan</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" class="input form-control" name="NoPelanggan" value="<?php echo "PLG" . $NoPelanggan; ?>" id="NoPelanggan" readonly required>
									</div>
									<!-- no pelanggan end -->
									<!-- no meter -->
									<div class="col-md-4">
										<label for="email-horizontal">No Meter</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" class="input form-control" placeholder="No Meter" id="NoMeter" name="NoMeter" required>
									</div>
									<!-- no meter end -->
									<div class="col-md-4">
										<label for="contact-info-horizontal">Daya/Tarif per KWH</label>
									</div>
									<div class="col-md-8 form-group">
										<fieldset class="form-group">
											<select name="KodeTarif" class="input form-select" id="KodeTarif" required>
												<option value="">Pilih Tarif</option>
												<?php
												//Select Tarif
												$selectQueryTarif = mysqli_query($connect, "SELECT * FROM tb_tarif ORDER BY KodeTarif DESC");
												if (mysqli_num_rows($selectQueryTarif) > 0) {
													while ($tarif = mysqli_fetch_assoc($selectQueryTarif)) {
														echo '<option value="' . $tarif['KodeTarif'] . '">' . $tarif['Daya'] . ' Watt / Rp ' . number_format($tarif['TarifPerKwh'], 0, '', '.') . '</option>';
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
										<input type="text" class="input form-control" id="NamaLengkap" name="NamaLengkap" placeholder="Nama Lengkap" required>
									</div>
									<div class="col-md-4">
										<label for="password-horizontal">No Telpon</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" class="input form-control" id="Telp" name="Telp" placeholder="No Telpon" required>
									</div>
									<div class="col-md-4">
										<label for="password-horizontal">Alamat</label>
									</div>
									<div class="col-md-8 form-group">
										<textarea name="Alamat" id="Alamat" class="input form-control" cols="30" rows="3" placeholder="Alamat" required> </textarea>
									</div>
									<div class="col-sm-12 d-flex justify-content-end">
										<button type="submit" class="btn btn-primary btn-sm me-1 mb-1">
											Tambah
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
<!-- form end -->


<?php

require_once "sources/maintemplate/footer.php";
?>