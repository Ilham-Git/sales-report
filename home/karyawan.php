<?php

$sql = $koneksi->query("SELECT COUNT(id_pesan) as pesan from tb_pesanan");
while ($data = $sql->fetch_assoc()) {
	$pesan = $data['pesan'];
}

$sql = $koneksi->query("SELECT COUNT(tb_toko.id_toko) as bone1 from tb_pesanan 
						inner join tb_toko on tb_pesanan.id_toko=tb_toko.id_toko 
						where wilayah = 'Bone1'");
while ($data = $sql->fetch_assoc()) {
	$bone1 = $data['bone1'];
}

$sql = $koneksi->query("SELECT COUNT(tb_toko.id_toko) as bone2 from tb_pesanan 
						inner join tb_toko on tb_pesanan.id_toko=tb_toko.id_toko 
						where wilayah = 'Bone2'");
while ($data = $sql->fetch_assoc()) {
	$bone2 = $data['bone2'];
}

$sql = $koneksi->query("SELECT COUNT(tb_toko.id_toko) as bone3 from tb_pesanan 
						inner join tb_toko on tb_pesanan.id_toko=tb_toko.id_toko 
						where wilayah = 'Bone3'");
while ($data = $sql->fetch_assoc()) {
	$bone3 = $data['bone3'];
}

$sql = $koneksi->query("SELECT COUNT(tb_toko.id_toko) as pare from tb_pesanan 
						inner join tb_toko on tb_pesanan.id_toko=tb_toko.id_toko 
						where wilayah = 'Parepare'");
while ($data = $sql->fetch_assoc()) {
	$pare = $data['pare'];
}

$sql = $koneksi->query("SELECT COUNT(tb_toko.id_toko) as pinrang from tb_pesanan 
						inner join tb_toko on tb_pesanan.id_toko=tb_toko.id_toko 
						where wilayah = 'Pinrang'");
while ($data = $sql->fetch_assoc()) {
	$pinrang = $data['pinrang'];
}

$sql = $koneksi->query("SELECT COUNT(tb_toko.id_toko) as sidrap from tb_pesanan 
						inner join tb_toko on tb_pesanan.id_toko=tb_toko.id_toko 
						where wilayah = 'Sidrap'");
while ($data = $sql->fetch_assoc()) {
	$sidrap = $data['sidrap'];
}

$sql = $koneksi->query("SELECT COUNT(tb_toko.id_toko) as soppeng from tb_pesanan 
						inner join tb_toko on tb_pesanan.id_toko=tb_toko.id_toko 
						where wilayah = 'Soppeng'");
while ($data = $sql->fetch_assoc()) {
	$soppeng = $data['soppeng'];
}

$sql = $koneksi->query("SELECT COUNT(tb_toko.id_toko) as wajo from tb_pesanan 
						inner join tb_toko on tb_pesanan.id_toko=tb_toko.id_toko 
						where wilayah = 'Wajo'");
while ($data = $sql->fetch_assoc()) {
	$wajo = $data['wajo'];
}

$sql = $koneksi->query("SELECT COUNT(id_toko) as toko from tb_toko WHERE id_toko IS NOT NULL");
while ($data = $sql->fetch_assoc()) {
	$toko = $data['toko'];
}

$sql = $koneksi->query("SELECT COUNT(id_angkut) as angkut from tb_angkut WHERE id_angkut IS NOT NULL");
while ($data = $sql->fetch_assoc()) {
	$angkut = $data['angkut'];
}
?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $pesan;  ?>
				</h3>

				<p>Semua Data</p>
			</div>
			<div class="icon">
				<i class="fa fa-globe" aria-hidden="true"></i>
			</div>
			<a href="index.php?page=data-pesanan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-dark">
			<div class="inner">
				<h3>
					<?php echo $toko;  ?>
				</h3>
				<p>Data Toko</p>
			</div>
			<div class="icon">
				<i class="fa fa-home" aria-hidden="true"></i>
			</div>
			<a href="index.php?page=data-toko" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-secondary">
			<div class="inner">
				<h3>
					<?php echo $angkut;  ?>
				</h3>
				<p>Data Angkut</p>
			</div>
			<div class="icon">
				<i class="fa fa-truck" aria-hidden="true"></i>
			</div>
			<a href="index.php?page=data-angkut" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6"></div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>
					<?php echo $bone1;  ?>
				</h3>

				<p>Bone 1</p>
			</div>
			<div class="icon">
				<i class="ion ion-map"></i>
			</div>
			<a href="index.php?page=data-pesanan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>
					<?php echo $bone2;  ?>
				</h3>

				<p>Bone 2</p>
			</div>
			<div class="icon">
				<i class="ion ion-map"></i>
			</div>
			<a href="index.php?page=data-pesanan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>
					<?php echo $bone3;  ?>
				</h3>

				<p>Bone 3</p>
			</div>
			<div class="icon">
				<i class="ion ion-map"></i>
			</div>
			<a href="index.php?page=data-pesanan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $pare;  ?>
				</h3>

				<p>Parepare</p>
			</div>
			<div class="icon">
				<i class="ion ion-map"></i>
			</div>
			<a href="index.php?page=data-pesanan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>
					<?php echo $pinrang;  ?>
				</h3>

				<p>Pinrang</p>
			</div>
			<div class="icon">
				<i class="ion ion-map"></i>
			</div>
			<a href="index.php?page=data-pesanan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>
					<?php echo $sidrap;  ?>
				</h3>

				<p>Sidrap</p>
			</div>
			<div class="icon">
				<i class="ion ion-map"></i>
			</div>
			<a href="index.php?page=data-pesanan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>
					<?php echo $soppeng;  ?>
				</h3>

				<p>Soppeng</p>
			</div>
			<div class="icon">
				<i class="ion ion-map"></i>
			</div>
			<a href="index.php?page=data-pesanan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $wajo;  ?>
				</h3>

				<p>Wajo</p>
			</div>
			<div class="icon">
				<i class="ion ion-map"></i>
			</div>
			<a href="index.php?page=data-pesanan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
</div>