<?php
$title = "Add Petugas / Admin";
require_once "sources/maintemplate/header.php";
?>
<?php
include_once "sources/maintemplate/sidebar.php"
?>
<?php
if (checkSession("success_add_petugas")) {
?>
	<div class="alert alert-success">
		<?php echo getSession("success_add_petugas"); ?>
	</div>
<?php
	removeSession('success_add_petugas');
}

if (checkSession("failed_add_petugas")) {
?>
	<div class="alert alert-danger">
		<?php echo getSession("failed_add_petugas"); ?>
	</div>
<?php
	removeSession('failed_add_petugas');
}

if (checkSession("username_already_claimed")) {
?>
	<div class="alert alert-danger">
		<?php echo getSession("username_already_claimed"); ?>
	</div>
<?php
	removeSession('username_already_claimed');
}
?>


<section id="basic-horizontal-layouts">
	<div class="row match-height">
		<div class="col-md-6 col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Add Petugas / Admin</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<form action="index.php?process=inputpetugas" method="post" class="form form-horizontal">
							<div class="form-body">
								<div class="row">
									<!-- no pelanggan -->
									<div class="col-md-4">
										<label for="first-name-horizontal">Username</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" class="input form-control" id="Username" name="Username" placeholder="Username" required>
									</div>
									<!-- no pelanggan end -->
									<!-- no meter -->
									<div class="col-md-4">
										<label for="email-horizontal">Password</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="password" class="input form-control" id="Password" name="Password" placeholder="Password" required>
									</div>
									<!-- no meter end -->
									<div class="col-md-4">
										<label for="email-horizontal">Nama Lengkap</label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" class="input form-control" id="NamaLengkap" name="NamaLengkap" placeholder="Nama Lengkap" required>
									</div>
									<div class="col-md-4">
										<label for="contact-info-horizontal">Level</label>
									</div>
									<div class="col-md-8 form-group">
										<fieldset class="form-group">
											<select name="Level" class="input form-select" required>
												<option value="">Pilih Level</option>
												<option value="Admin">Admin</option>
												<option value="Petugas">Petugas</option>
											</select>
										</fieldset>
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
<!-- form end -->

<?php
require_once "sources/maintemplate/footer.php";
?>