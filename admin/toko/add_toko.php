<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Toko
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Toko</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama Toko" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Wilayah</label>
				<div class="col-sm-3">
					<select name="wilayah" id="wilayah" class="form-control select2bs4" required>
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

			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-toko" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_toko (nama_toko, wilayah) 
	VALUES ('" . $_POST['nama_toko'] . "',
            '" . $_POST['wilayah'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-toko';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-toko';
          }
      })</script>";
	}
}
     //selesai proses simpan data
