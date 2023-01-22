<?php
include 'inc/koneksi.php';
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Angkut
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-angkut" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data Angkut</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped text-center align-middle">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Sopir</th>
						<th>Plat</th>
						<th>Wilayah Angkut</th>
						<th>Aktivitas</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;

					$sql = $koneksi->query("SELECT * from tb_angkut");

					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['sopir']; ?>
							</td>
							<td>
								<?php echo $data['plat']; ?>
							</td>
							<td>
								<?php echo $data['wilayah_angkut']; ?>
							</td>

							<td>
								<a href="?page=view-angkut&kode=<?php echo $data['id_angkut']; ?>" title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-user"></i>
								</a>
								<a href="?page=edit-angkut&kode=<?php echo $data['id_angkut']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-angkut&kode=<?php echo $data['id_angkut']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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