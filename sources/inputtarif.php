<?php
$title = "Buat Data Tarif";

require_once "sources/maintemplate/header.php";
?>
<?php
include_once "sources/maintemplate/sidebar.php"
?>

<!--  -->
<div class="col-md-6 col-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Add Data Tarif</h4>
		</div>
		<div class="card-content">
			<div class="card-body">
				<form action="index.php?process=inputtarif" method="POST" class="form form-horizontal">
					<div class="form-body">
						<div class="row">
							<input type="hidden" name="KodeTarif" value="<?php echo $row['KodeTarif']; ?>">
							<!-- no pelanggan -->
							<div class="col-md-4">
								<label for="first-name-horizontal">Daya</label>
							</div>
							<div class="col-md-8 form-group">
								<input type="text" class="input form-control" name="Daya" placeholder="Daya" required="">
							</div>
							<!-- no pelanggan end -->
							<!-- no meter -->
							<div class="col-md-4">
								<label for="email-horizontal">Tarif per KWH</label>
							</div>
							<div class="col-md-8 form-group">
								<input type="text" class="input form-control" name="TarifPerKwh" placeholder="Tarif per KWH" required="">
							</div>
							<!-- no meter end -->
							<div class="col-md-4">
								<label for="password-horizontal">Beban</label>
							</div>
							<div class="col-md-8 form-group">
								<input type="text" class="input form-control" name="Beban" placeholder="Beban" required="">
							</div>

							<div class="col-sm-12 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary btn-sm me-1 mb-1">
									+ Tambah
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
<!--  -->

<?php
require_once "sources/maintemplate/footer.php";
?>