<?php
if (isset($_GET['kode'])) {
	$kode = $_GET['kode'];
	$stmt = $koneksi->prepare("SELECT * from tb_angkut WHERE id_angkut = ?");
	$stmt->bind_param('i', $kode);
	$stmt->execute();
	$sql = $stmt->get_result();
	$data = mysqli_fetch_array($sql);
}
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail Angkutan
		</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body p-0">
		<table class="table text-left">
			<tbody>
				<tr>
					<td style="width: 250px">
						<b>Nama Sopir</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['sopir'] ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>Plat Kendaraan</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['plat'] ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>Wilayah</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['wilayah_angkut']; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="card-footer">
			<a href="?page=data-angkut-sales" class="btn btn-info">Kembali</a>
		</div>
	</div>
</div>