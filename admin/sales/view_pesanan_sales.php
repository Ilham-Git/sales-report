<?php
if (isset($_GET['kode'])) {
	$kode = $_GET['kode'];
	$stmt = $koneksi->prepare("SELECT * from tb_pesanan as p 
						inner join tb_toko as t on p.id_toko=t.id_toko 
						inner join tb_angkut as a on p.id_angkut=a.id_angkut 
						where id_pesan = ?");
	$stmt->bind_param('i', $kode);
	$stmt->execute();
	$sql = $stmt->get_result();
	$data = mysqli_fetch_array($sql);
}
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail Pesanan
		</h3>
		</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body p-0">
		<table class="table text-left">
			<tbody>
				<tr>
					<td style="width: 250px">
						<b>Nama Toko</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['nama_toko'] ?>
						-
						<?php echo $data['wilayah'] ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>Tanggal Kirim</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['kirim']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>Tanggal Terima</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['terima']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>No SPJ</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['noSPJ']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>No SO</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['noSO']; ?>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>Nama Sopir</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['sopir'] ?>
						-
						<?php echo $data['plat'] ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>Jenis Angkutan</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['angkut']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>Jumlah Pesanan 40kg (ZAK)</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['zak_40']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>Jumlah Pesanan 50kg (ZAK)</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						<?php echo $data['zak_50']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>Harga 40kg per ZAK</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						Rp.<?php echo $data['harga_40']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>Harga 50kg per ZAK</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						Rp.<?php echo $data['harga_50']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 250px">
						<b>Total Harga</b>
					</td>
					<td>
						<b class="mr-3">:</b>
						Rp.<?php echo ($data['zak_40'] * $data['harga_40']) + ($data['zak_50'] * $data['harga_50']); ?>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="card-footer">
			<a href="?page=data-pesanan-sales" class="btn btn-info">Kembali</a>
		</div>
	</div>
</div>