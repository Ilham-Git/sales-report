<?php

$sql = $koneksi->query("SELECT COUNT(id_pesan) as pesan from tb_pesanan");
while ($data = $sql->fetch_assoc()) {
	$pesan = $data['pesan'];
}

// $sql = $koneksi->query("SELECT COUNT(id_pend) as laki  from tb_pdd where status = 'Ada' and  jekel='L'");
// while ($data = $sql->fetch_assoc()) {
// 	$laki = $data['laki'];
// }

// $sql = $koneksi->query("SELECT COUNT(id_pend) as prem  from tb_pdd where status = 'Ada' and  jekel='P'");
// while ($data = $sql->fetch_assoc()) {
// 	$prem = $data['prem'];
// }

?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $pend;  ?>
				</h3>

				<p>Penduduk</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php echo $laki;  ?>
				</h3>

				<p>Laki-laki</p>
			</div>
			<div class="icon">
				<i class="ion ion-male"></i>
			</div>
			<a href="index.php?page=data-laki" class="small-box-footer">Selengkapnya
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
					<?php echo $prem;  ?>
				</h3>

				<p>Perempuan</p>
			</div>
			<div class="icon">
				<i class="ion ion-female"></i>
			</div>
			<a href="index.php?page=data-prem" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>