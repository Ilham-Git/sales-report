<?php
include 'inc/koneksi.php';
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pesanan
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pesanan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped text-center align-middle p-0">
				<thead>
					<tr>
						<th rowspan="2">No</th>
						<th rowspan="2">Nama Toko</th>
						<th colspan="2">Tanggal</th>
						<th rowspan="2">NoSPJ</th>
						<th rowspan="2">NoSO</th>
						<th colspan="3">IDENTITAS PENGIRIMAN BARANG</th>
						<th colspan="2">Zak</th>
						<!-- <th colspan="2">TON</th> -->
						<th colspan="2">Harga</th>
						<th rowspan="2">Total Harga</th>
						<th rowspan="2">Aksi</th>
					</tr>
					<tr>
						<th>Kirim</th>
						<th>Terima</th>
						<th>Sopir</th>
						<th>Plat</th>
						<th>Angkut</th>
						<th>40</th>
						<th>50</th>
						<!-- <th>40</th>
						<th>50</th> -->
						<th>40</th>
						<th>50</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * from tb_pesanan as p
					inner join tb_toko as t on p.id_toko=t.id_toko 
					inner join tb_angkut as a on p.id_angkut=a.id_angkut
					where wilayah = 'Wajo'");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nama_toko']; ?>
							</td>
							<td>
								<?php echo $data['kirim']; ?>
							</td>
							<td>
								<?php echo $data['terima']; ?>
							</td>
							<td>
								<?php echo $data['noSPJ']; ?>
							</td>
							<td>
								<?php echo $data['noSO']; ?>
							</td>
							<td>
								<?php echo $data['sopir']; ?>
							</td>
							<td>
								<?php echo $data['plat']; ?>
							</td>
							<td>
								<?php echo $data['angkut']; ?>
							</td>
							<td>
								<?php echo $data['zak_40']; ?>
							</td>
							<td>
								<?php echo $data['zak_50']; ?>
							</td>
							<!-- <td>
								<?php echo $data['zak_40'] * 40; ?> Kg
							</td>
							<td>
								<?php echo $data['zak_50'] * 50; ?> Kg
							</td> -->
							<td>
								Rp.<?php echo $data['harga_40']; ?>
							</td>
							<td>
								Rp.<?php echo $data['harga_50']; ?>
							</td>
							<td>
								Rp.<?php echo ($data['zak_40'] * $data['harga_40']) + ($data['zak_50'] * $data['harga_50']); ?>
							</td>

							<td>
								<!-- <a href="?page=view-pesanan&kode=<?php echo $data['id_pesan']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-user"></i>
								</a> -->
								<a href="?page=edit-pesanan&kode=<?php echo $data['id_pesan']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-pesanan&kode=<?php echo $data['id_pesan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->