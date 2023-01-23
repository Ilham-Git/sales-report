<?php
$user = $_SESSION["ses_username"];
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Angkut
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Sopir</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="sopir" name="sopir" placeholder="Nama Sopir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Plat Kendaraan</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="plat" name="plat" placeholder="Plat Kendaraan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Wilayah Angkut</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="wilayah_angkut" name="wilayah_angkut" placeholder="Wilayah Angkut" value="<?php echo $user ?>" readonly>
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-angkut-sales" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_angkut (sopir, plat, wilayah_angkut) 
	VALUES ('" . $_POST['sopir'] . "',
			'" . $_POST['plat'] . "',
            '" . $_POST['wilayah_angkut'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-angkut-sales';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-angkut-sales';
          }
      })</script>";
	}
}
     //selesai proses simpan data
