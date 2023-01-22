<?php
include 'inc/koneksi.php';
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Toko
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-toko" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data Toko</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped text-center align-middle">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Toko</th>
						<th>Wilayah</th>
						<th>Aktivitas</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;

					$sql = $koneksi->query("SELECT * from tb_toko");

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
								<?php echo $data['wilayah']; ?>
							</td>

							<td>
								<a href="?page=view-toko&kode=<?php echo $data['id_toko']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-user"></i>
								</a>
								<a href="?page=edit-toko&kode=<?php echo $data['id_toko']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-toko&kode=<?php echo $data['id_toko']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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