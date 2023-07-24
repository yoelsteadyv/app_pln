<?php

$title = "Halaman Admin";
require_once "sources/maintemplate/header.php";

?>
<?php
include_once "sources/maintemplate/sidebar.php";
?>
<div class="page-heading">
	<!-- heading -->
</div>
<div class="page-content">
	<section class="section">
		<div class="row">
			<div class="row">
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body px-4 py-4-5">
							<div class="row">
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="text-muted font-semibold text-center">
										Petugas Yang Terdaftar
									</h6>
									<h1 class="font-extrabold mb-0 text-center"><?php
																				$selectQuery = mysqli_query($connect, "SELECT * FROM tb_login WHERE Level <> 'Pelanggan'");
																				if (mysqli_num_rows($selectQuery) > 0) {
																					echo mysqli_num_rows($selectQuery);
																				} else {
																					echo "0";
																				}
																				?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body px-4 py-4-5">
							<div class="row">
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="text-muted font-semibold text-center">Total Pelanggan Yang Terdaftar</h6>
									<h1 class="font-extrabold mb-0 text-center"><?php
																				$selectQuery = mysqli_query($connect, "SELECT * FROM tb_pelanggan");
																				if (mysqli_num_rows($selectQuery) > 0) {
																					echo mysqli_num_rows($selectQuery);
																				} else {
																					echo "0";
																				}
																				?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body px-4 py-4-5">
							<div class="row">

								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="text-muted font-semibold text-center">Total Transaksi</h6>
									<h1 class="font-extrabold mb-0 text-center"><?php
																				$selectQuery = mysqli_query($connect, "SELECT * FROM tb_tagihan");
																				if (mysqli_num_rows($selectQuery) > 0) {
																					echo mysqli_num_rows($selectQuery);
																				} else {
																					echo "0";
																				}
																				?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body px-4 py-4-5">
							<div class="row">

								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="text-muted font-semibold text-center">Total Tarif</h6>
									<h1 class="font-extrabold mb-0 text-center"><?php
																				$selectQuery = mysqli_query($connect, "SELECT * FROM tb_tarif");
																				if (mysqli_num_rows($selectQuery) > 0) {
																					echo mysqli_num_rows($selectQuery);
																				} else {
																					echo "0";
																				}
																				?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- tabel -->
			<section class="section">
				<div class="row" id="table-striped">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">View Pelanggan</h4>
							</div>
							<div class="card-content">
								<!-- {{-- <div class="card-body">
                        
                    </div> --}} -->
								<!-- table striped -->
								<div class="table-responsive">
									<?php
									$selectPlg = mysqli_query($connect, "SELECT * FROM tb_pelanggan INNER JOIN tb_tarif USING(KodeTarif) ORDER BY KodePelanggan DESC");
									if (mysqli_num_rows($selectPlg) > 0) {
									?>
										<table class="table table-striped tabl-sm">
											<thead>
												<tr>
													<th>No</th>
													<th>No Pelanggan</th>
													<th>No Meter</th>
													<th>Daya/Tarif</th>
													<th>Nama</th>
													<th>No Telpon</th>
													<th>Alamat</th>
													<th>Action</th>
												</tr>
												<?php
												$No = 1;
												while ($row = mysqli_fetch_assoc($selectPlg)) {
													$msg = "Apakah anda yakin ingin menghapus pelanggan dengan Nomor Pelanggan " . $row['NoPelanggan'];
												?>
											</thead>

											<tr>
												<td><?php echo $No; ?></td>
												<td><?php echo $row['NoPelanggan']; ?></td>
												<td><?php echo $row['NoMeter']; ?></td>
												<td><?php echo $row['Daya'] . " Watt / Rp " . number_format($row['TarifPerKwh'], 0, '', '.'); ?></td>
												<td><?php echo $row['NamaLengkap']; ?></td>
												<td><?php echo $row['Telp']; ?></td>
												<td><?php echo $row['Alamat']; ?></td>
												<td><a href="index.php?pages=editpelanggan&NoPelanggan=<?php echo $row['NoPelanggan']; ?>"><i class="bi bi-pencil-square"></i></a><a href="index.php?process=deletepelanggan&NoPelanggan=<?php echo $row['NoPelanggan']; ?>" onclick="return deleteAlert('<?php echo $msg; ?>')"> <i class="bi bi-trash"></i></a></td>
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
			<!-- tabel end -->


		</div>
	</section>
</div>
<?php
									} else {
										echo "Data pelanggan Tidak ada";
									}
									require_once "sources/maintemplate/footer.php";
