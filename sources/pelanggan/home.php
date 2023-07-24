<?php

$title = "Halaman Pelanggan";
require_once "sources/maintemplate/header.php";

$NoPelanggan = $data['Username'];
?>
<?php
include_once "sources/maintemplate/sidebar.php"
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
										Total Tagihan
									</h6>
									<h1 class="font-extrabold mb-0 text-center"><?php
																				$selectQuery = mysqli_query($connect, "SELECT * FROM tb_tagihan WHERE NoPelanggan = '$NoPelanggan'");
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
									<h6 class="text-muted font-semibold text-center">Total Tagihan Berhasil</h6>
									<h1 class="font-extrabold mb-0 text-center"><?php
																				$selectQuery = mysqli_query($connect, "SELECT * FROM tb_tagihan WHERE NoPelanggan='$NoPelanggan' AND Status='2'");
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
									<h6 class="text-muted font-semibold text-center">Tagihan Menunggu Konfirmasi</h6>
									<h1 class="font-extrabold mb-0 text-center"><?php
																				$selectQuery = mysqli_query($connect, "SELECT * FROM tb_tagihan WHERE NoPelanggan='$NoPelanggan' AND Status='1'");
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
									<h6 class="text-muted font-semibold text-center">Transaksi Belum Bayar</h6>
									<h1 class="font-extrabold mb-0 text-center"><?php
																				$selectQuery = mysqli_query($connect, "SELECT * FROM tb_tagihan WHERE NoPelanggan='$NoPelanggan' AND Status='0'");
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
									<!--  -->
									<?php
									$NoPelanggan = $data['Username'];
									$selectTagihan = mysqli_query($connect, "SELECT * FROM tb_tagihan WHERE NoPelanggan='$NoPelanggan' ORDER BY KodeTagihan DESC");
									if (mysqli_num_rows($selectTagihan) > 0) {
									?>
										<table class="table table-striped tabl-sm">
											<thead>
												<tr>
													<th>No</th>
													<th>No Tagihan</th>
													<th>Tahun Tagih</th>
													<th>Bulan Tagih</th>
													<th>Jumlah Pemakaian</th>
													<th>Total Bayar</th>
													<th>Status</th>
													<th>Aksi</th>
												</tr>
												<!--  -->
												<?php
												$No = 1;
												while ($row = mysqli_fetch_assoc($selectTagihan)) {
													$msg = "Apakah anda yakin ingin menghapus No Tagihan " . $row['NoTagihan'];
												?>
											</thead>
											<tr>
												<td><?php echo $No; ?></td>
												<td><?php echo $row['NoTagihan']; ?></td>
												<td><?php echo $row['TahunTagih']; ?></td>
												<td>
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

													echo $bulan[$row['BulanTagih']];
													?>
												</td>
												<td><?php echo $row['JumlahPemakaian']; ?></td>
												<td><?php echo "Rp " . number_format($row['TotalBayar'], 0, '', '.'); ?></td>
												<td>
													<?php
													if ($row['Status'] == 0) {
														echo "Menunggu Pembayaran";
													} else if ($row['Status'] == 1) {
														echo "Menunggu Konfirmasi";
													} else {
														echo "Lunas";
													}
													?>
												</td>
												<td>
													<a href="index.php?pages=cetaktagihan&amp;NoPelanggan=<?php echo $row['NoPelanggan']; ?>&amp;NoTagihan=<?php echo $row['NoTagihan']; ?>"><i class="bi bi-pass"></i></a>
													<?php
													if ($row['Status'] != 2) {

													?>
														<a href="index.php?pages=inputpembayaran&KodeTagihan=<?php echo $row['KodeTagihan']; ?>" style="color: #00ff00;"><i class="bi bi-check2-square"></i></a>
														<?php
													}
													if ($data['Level'] == "Admin" || $data['Level'] == "Petugas") {
														if ($row['Status'] != 2) {
														?>
															<a href="index.php?pages=edittagihan&NoTagihan=<?php echo $row['NoTagihan']; ?>" style="color: #000;"><i class="bi bi-pencil-square"></i></a>
														<?php
														}
														?><a href="index.php?process=deletetagihan&NoTagihan=<?php echo $row['NoTagihan']; ?>" onclick="return deleteAlert('<?php echo $msg; ?>')"><i class="bi bi-trash"></i></a>
													<?php
													}
													?>
												</td>
											</tr>
											<!--  -->
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
										echo "Data Tagihan Tidak ada";
									}
									require_once "sources/maintemplate/footer.php";
?>