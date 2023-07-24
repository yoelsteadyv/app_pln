<?php

$title = "Edit Petugas";
require_once "sources/maintemplate/header.php";

if (isset($_GET['KodeLogin'])) {
	$KodeLogin = mysqli_real_escape_string($connect, $_GET['KodeLogin']);

	$selectQuery = mysqli_query($connect, "SELECT * FROM tb_login WHERE KodeLogin='$KodeLogin'");
	if (mysqli_num_rows($selectQuery) > 0) {
		$row = mysqli_fetch_assoc($selectQuery);
?>
		<?php
		include_once "sources/maintemplate/sidebar.php"
		?>
		<legend>Edit Petugas</legend>
		<?php
		if (checkSession("success_edit_petugas")) {
		?>
			<div class="alert alert-success">
				<?php echo getSession("success_edit_petugas"); ?>
			</div>
		<?php
			removeSession('success_edit_petugas');
		}

		if (checkSession("failed_edit_petugas")) {
		?>
			<div class="alert alert-danger">
				<?php echo getSession("failed_edit_petugas"); ?>
			</div>
		<?php
			removeSession('failed_edit_petugas');
		}
		?>

		<section id="basic-horizontal-layouts">
			<div class="row match-height">
				<div class="col-md-6 col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Edit Pelanggan</h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form action="index.php?process=editpetugas" method="post" class="form form-horizontal">
									<div class="form-body">
										<input type="hidden" name="KodeLogin" value="<?php echo $row['KodeLogin']; ?>">
										<div class="row">
											<!-- no pelanggan -->
											<div class="col-md-4">
												<label for="first-name-horizontal">Username</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" class="input form-control" id="Username" name="Username" value="<?php echo $row['Username']; ?>">
											</div>
											<!-- no pelanggan end -->
											<!-- no meter -->
											<div class="col-md-4">
												<label for="email-horizontal">Password</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="password" class="input form-control" id="Password" name="Password">
											</div>
											<!-- no meter end -->
											<div class="col-md-4">
												<label for="email-horizontal">Nama Lengkap</label>
											</div>
											<div class="col-md-8 form-group">
												<input type="text" class="input form-control" id="NamaLengkap" name="NamaLengkap" value="<?php echo $row['NamaLengkap']; ?>">
											</div>
											<div class="col-md-4">
												<label for="contact-info-horizontal">Level</label>
											</div>
											<div class="col-md-8 form-group">
												<fieldset class="form-group">
													<select name="Level" class="input form-select">
														<option value="">Pilih Level</option>
														<option value="Admin" <?php echo ($row['Level'] == "Admin") ? 'selected' : ''; ?>>Admin</option>
														<option value="Petugas" <?php echo ($row['Level'] == "Petugas") ? 'selected' : ''; ?>>Petugas</option>
													</select>
												</fieldset>
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
			</div>
		</section>
		<!-- form end -->

<?php
	} else {
		echo "Petugas tidak ditemukan!";
	}
}
require_once "sources/maintemplate/footer.php";
?>