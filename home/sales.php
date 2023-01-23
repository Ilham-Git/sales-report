<?php
$sales = $_SESSION["ses_username"];

$sql = $koneksi->query("SELECT COUNT(id_pesan) as pesan from tb_pesanan");
while ($data = $sql->fetch_assoc()) {
	$pesan = $data['pesan'];
}

$stmt = $koneksi->prepare("SELECT COUNT(id_toko) as toko from tb_toko WHERE wilayah = ?");
$stmt->bind_param('s', $sales);
$stmt->execute();
$result = $stmt->get_result();
while ($data = $result->fetch_assoc()) {
	$toko = $data['toko'];
}

$stmt = $koneksi->prepare("SELECT COUNT(id_angkut) as angkut from tb_angkut WHERE wilayah_angkut = ?");
$stmt->bind_param('s', $sales);
$stmt->execute();
$result = $stmt->get_result();
while ($data = $result->fetch_assoc()) {
	$angkut = $data['angkut'];
}

$stmt = $koneksi->prepare("SELECT COUNT(tb_toko.id_toko) as sales from tb_pesanan 
						inner join tb_toko on tb_pesanan.id_toko=tb_toko.id_toko 
						where wilayah = ?");
$stmt->bind_param('s', $sales);
$stmt->execute();
$result = $stmt->get_result();
while ($data = $result->fetch_assoc()) {
	$sales = $data['sales'];
}

?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>
					<?php echo $sales;  ?>
				</h3>
				<p>Data Pesanan</p>
			</div>
			<div class="icon">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			</div>
			<a href="index.php?page=data-pesanan-sales" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>
					<?php echo $toko;  ?>
				</h3>
				<p>Data Toko</p>
			</div>
			<div class="icon">
				<i class="fa fa-home" aria-hidden="true"></i>
			</div>
			<a href="index.php?page=data-toko-sales" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>
					<?php echo $angkut;  ?>
				</h3>
				<p>Data Angkut</p>
			</div>
			<div class="icon">
				<i class="fa fa-truck" aria-hidden="true"></i>
			</div>
			<a href="index.php?page=data-angkut-sales" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
</div>