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
							$terpilih = '';
							if ($kode_guru == $kode) {
								$terpilih = " selected";
							}
							echo "<option value='$kode' $terpilih>$nama</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputGuruMapel" class="col-sm-2 col-form-label">Pilih Mata Pelajaran</label>
			<div class="col-sm-10">
				<select class="form-control" name="kode_mapel">
					<option value="">-- Pilih Mata Pelajaran --</option>
					<?php
					// if (count($list_guru) > 0) {
					while($rowGuru = mysqli_fetch_assoc($resultJurusanMapel)) {
						$kode_mapel_guru = $rowGuru['kode_mapel'];
						$nama_mapel = $rowGuru['nama_mapel'];
						$kategori_mapel = $rowGuru['nama_jurusan'];

						$terpilih_two = '';
						if ($kode_mapel == $kode_mapel_guru) {
							$terpilih_two = " selected";
						}

						echo "<option value='$kode_mapel_guru' $terpilih_two>$kategori_mapel - $nama_mapel</option>";
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