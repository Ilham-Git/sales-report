<?php
if (isset($_GET['kode'])) {
	$kode = $_GET['kode'];
	$stmt = $koneksi->prepare("SELECT * from tb_angkut WHERE id_angkut = ?");
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
						<input type="text" class="form-control" id="id_angkut" name="id_angkut" value="<?php echo $data['id_angkut']; ?>" readonly />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Sopir</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sopir" name="sopir" placeholder="Nama Sopir" value="<?php echo $data['sopir']; ?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Plat Kendaraan</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="plat" name="plat" placeholder="Plat Kendaraan" value="<?php echo $data['plat']; ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Wilayah Angkut</label>
					<div class="col-sm-3">
						<select name="wilayah_angkut" id="wilayah_angkut" class="form-control select2bs4" required>
							<option selected="selected">---Pilih Wilayah---</option>
							<option value="Bone1">Bone1</option>
							<option value="Bone2">Bone2</option>
							<option value="Bone3">Bone3</option>
							<option value="Parepare">Parepare</option>
							<option value="Pinrang">Pinrang</option>
							<option value="Sidrap">Sidrap</option>
							<option value="Soppeng">Soppeng</option>
							<option value="Wajo">Wajo</option>
						</select>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
				<a href="?page=data-angkut" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>
<?php
}
?>
<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah = "UPDATE tb_angkut SET 
		sopir='" . $_POST['sopir'] . "',
		plat='" . $_POST['plat'] . "',
		wilayah_angkut='" . $_POST['wilayah_angkut'] . "'
		WHERE id_angkut='" . $_POST['id_angkut'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-angkut';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-angkut';
        }
      })</script>";
	}
}
