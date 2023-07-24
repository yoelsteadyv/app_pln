<?php

$title = "Edit Tarif";
require_once "sources/maintemplate/header.php";

if (isset($_GET['KodeTarif'])) {
	$KodeTarif = mysqli_real_escape_string($connect, $_GET['KodeTarif']);

	$selectQuery = mysqli_query($connect, "SELECT * FROM tb_tarif WHERE KodeTarif='$KodeTarif'");
	if (mysqli_num_rows($selectQuery) > 0) {
		$row = mysqli_fetch_assoc($selectQuery);
?>
		<?php
		include_once "sources/maintemplate/sidebar.php"
		?>
		<?php
		if (checkSession("success_tarif")) {
		?>
			<div class="alert alert-success">
				<?php echo getSession("success_tarif"); ?>
			</div>
		<?php
			removeSession('success_tarif');
		}

		if (checkSession("failed_tarif")) {
		?>
			<div class="alert alert-danger">
				<?php echo getSession("failed_tarif"); ?>
			</div>
		<?php
			removeSession('failed_tarif');
		}
		?>
		<div class="col-md-6 col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edit Tarif</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<form action="index.php?process=edittarif" method="POST" class="form form-horizontal">
							<div class="form-body">
								<div class="row">
									<input type="hidden" name="KodeTarif" value="<?php echo $row['KodeTarif']; ?>">
									<!-- no pelanggan -->
									<div class="col-md-4">
										<label for="first-name-horizontal">Daya</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" class="input form-control" name="Daya" value="<?php echo $row['Daya']; ?>">
									</div>
									<!-- no pelanggan end -->
									<!-- no meter -->
									<div class="col-md-4">
										<label for="email-horizontal">Tarif per KWH</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" class="input form-control" name="TarifPerKwh" value="<?php echo $row['TarifPerKwh']; ?>">
									</div>
									<!-- no meter end -->
									<div class="col-md-4">
										<label for="password-horizontal">Beban</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" class="input form-control" name="Beban" value="<?php echo $row['Beban']; ?>">
									</div>

									<div class="col-sm-12 d-flex justify-content-end">
										<button type="submit" class="btn btn-primary btn-sm me-1 mb-1">
											Edit
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

<?php
	} else {
	}
}
require_once "sources/maintemplate/footer.php";
?>