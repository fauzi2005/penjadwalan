<!-- form start -->
<form class="form-horizontal" method="POST">
	<?php if ($isError): ?>
		<br>
		<div class="alert alert-danger">
			<?= $error ?>
		</div>
	<?php endif ?>
	<div class="card-body">
		<?php if ($readonly == "found") { $isReadonly = " readonly"; } else { $isReadonly = ""; } ?>
		<input type="hidden" class="form-control" id="inputKodeMapel" name="kode_gmp" placeholder="Kode Guru Mata Pelajaran" value="<?= $kode_gmp ?>" <?= $isReadonly ?>>
		<div class="form-group row">
			<label for="inputGuruMapel" class="col-sm-2 col-form-label">Pilih Guru</label>
			<div class="col-sm-10">
				<select class="form-control" name="kode_guru">
					<option value="">-- Pilih Guru --</option>
					<?php
					if (count($list_guru) > 0) {
						foreach ($list_guru as $kode => $nama) {
							// $terpilih = '';
							// if ($kategori_mapel == $kode) {
							// 	$terpilih = " selected";
							// }
							echo "<option value='$kode'>$nama</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputGuruMapel" class="col-sm-2 col-form-label">Pilih Guru</label>
			<div class="col-sm-10">
				<select class="form-control" name="kode_mapel">
					<option value="">-- Pilih Guru --</option>
					<?php
					// if (count($list_guru) > 0) {
					while($rowGuru = mysqli_fetch_assoc($resultJurusanMapel)) {
						$kode_mapel = $rowGuru['kode_mapel'];
						$nama_mapel = $rowGuru['nama_mapel'];
						$kategori_mapel = $rowGuru['nama_jurusan'];

						echo "<option value='$kode_mapel'>$kategori_mapel - $nama_mapel</option>";
					}
					?>
				</select>
			</div>
		</div>
	</div>
	<!-- /.card-body -->
	<div class="text-center card-footer">
		<button type="submit" class="btn btn-info" name="submit">Submit</button>
		<button type="reset" class="btn btn-default">Reset</button>
	</div>
	<!-- /.card-footer -->
</form>