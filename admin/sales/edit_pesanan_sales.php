<?php
if (isset($_GET['kode'])) {
	$user = $_SESSION["ses_username"];
	$kode = $_GET['kode'];
	$stmt = $koneksi->prepare("SELECT * from tb_pesanan as p 
						inner join tb_toko as t on p.id_toko=t.id_toko 
						inner join tb_angkut as a on p.id_angkut=a.id_angkut 
						where id_pesan = ?");
	$stmt->bind_param('i', $kode);
	$stmt->execute();
	$sql = $stmt->get_result();
}

while ($data = $sql->fetch_assoc()) {
?>
	<div class="card card-success">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-edit"></i> Ubah Data
			</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">No Sistem</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="id_pesan" name="id_pesan" value="<?php echo $data['id_pesan']; ?>" readonly />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Toko</label>
					<div class="col-sm-4">
						<select name="id_toko" id="id_toko" class="form-control select2bs4" required>
							<option selected="selected">---Nama Toko---</option>
							<?php
							// ambil data dari database
							$stmt = $koneksi->prepare("select * from tb_toko where wilayah = ?");
							$stmt->bind_param('s', $user);
							$stmt->execute();
							$hasil = $stmt->get_result();
							while ($row = mysqli_fetch_array($hasil)) {
							?>
								<option value="<?php echo $row['id_toko'] ?>">
									<?php echo $row['nama_toko'] ?>
									-
									<?php echo $row['wilayah'] ?>
								</option>
							<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tanggal Kirim</label>
					<div class="col-sm-3">
						<input type="date" class="form-control" id="kirim" name="kirim" placeholder="Tanggal Kirim" value="<?php echo $data['kirim']; ?>" required>
					</div>
				</div>

				<div class=" form-group row">
					<label class="col-sm-2 col-form-label">Tanggal Terima</label>
					<div class="col-sm-3">
						<input type="date" class="form-control" id="terima" name="terima" placeholder="Tanggal Terima" value="<?php echo $data['terima']; ?>" required>
					</div>
				</div>

				<div class=" form-group row">
					<label class="col-sm-2 col-form-label">No SPJ</label>
					<div class="col-sm-6">
						<input type="number" class="form-control" id="spj" name="spj" placeholder="Masukkan No SPJ" value="<?php echo $data['noSPJ']; ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">No SO</label>
					<div class="col-sm-6">
						<input type="number" class="form-control" id="so" name="so" placeholder="Masukkan No SO" value="<?php echo $data['noSO']; ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Sopir</label>
					<div class="col-sm-4">
						<select name="id_angkut" id="id_angkut" class="form-control select2bs4" required>
							<option selected="selected">---Nama Sopir---</option>
							<?php
							// ambil data dari database
							$stmt = $koneksi->prepare("select * from tb_angkut where wilayah_angkut = ?");
							$stmt->bind_param('s', $user);
							$stmt->execute();
							$hasil = $stmt->get_result();
							while ($row = mysqli_fetch_array($hasil)) {
							?>
								<option value="<?php echo $row['id_angkut'] ?>">
									<?php echo $row['sopir'] ?>
									-
									<?php echo $row['plat'] ?>
								</option>
							<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jenis Angkutan</label>
					<div class="col-sm-3">
						<select name="angkut" id="angkut" class="form-control" required>
							<option value="">---Pilih Angkutan---</option>
							<option value="LT">LT</option>
							<option value="PB">PB</option>
							<option value="GD">GD</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jumlah Pesanan (ZAK)</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="zak_40" name="zak_40" placeholder="40 KG" value="<?php echo $data['zak_40']; ?>">
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="zak_50" name="zak_50" placeholder="50 KG" value="<?php echo $data['zak_50']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Harga (ZAK)</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="harga_40" name="harga_40" placeholder="40 KG" value="<?php echo $data['harga_40']; ?>">
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="harga_50" name="harga_50" placeholder="50 KG" value="<?php echo $data['harga_50']; ?>">
					</div>
				</div>
			</div>
			<div class="card-footer">
				<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
				<a href="?page=data-pesanan-sales" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>
<?php
}
?>
<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah = "UPDATE tb_pesanan SET 
		id_toko='" . $_POST['id_toko'] . "',
		id_angkut='" . $_POST['id_angkut'] . "',
		noSPJ='" . $_POST['spj'] . "',
		noSO='" . $_POST['so'] . "',
		angkut='" . $_POST['angkut'] . "',
		zak_40='" . $_POST['zak_40'] . "',
		zak_50='" . $_POST['zak_50'] . "',
		harga_40='" . $_POST['harga_40'] . "',
		harga_50='" . $_POST['harga_50'] . "',
		kirim='" . $_POST['kirim'] . "',
		terima='" . $_POST['terima'] . "'
		WHERE id_pesan='" . $_POST['id_pesan'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pesanan-sales';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pesanan-sales';
        }
      })</script>";
	}
}
