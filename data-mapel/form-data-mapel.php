<!-- form start -->
<form class="form-horizontal" method="POST">
	<?php if ($isError): ?>
		<br>
		<div class="alert alert-danger">
			<?= $error ?>
		</div>
	<?php endif ?>
	<div class="card-body">
		<!-- <div class="form-group row">
			<label for="inputKodeMapel" class="col-sm-2 col-form-label">Kode Mata Pelajaran</label>
			<div class="col-sm-10">
				<?php if ($readonly == "found") { $isReadonly = " readonly"; } else { $isReadonly = ""; } ?>
				<input type="text" class="form-control" id="inputKodeMapel" name="kode_mapel" placeholder="Kode Mata Pelajaran" value="<?= $kode_mapel ?>" <?= $isReadonly ?>>
			</div>
		</div> -->
		<?php if ($readonly == "found") { $isReadonly = " readonly"; } else { $isReadonly = ""; } ?>
		<input type="hidden" class="form-control" id="inputKodeMapel" name="kode_mapel" placeholder="Kode Mata Pelajaran" value="<?= $kode_mapel ?>" <?= $isReadonly ?>>
		<div class="form-group row">
			<label for="inputNamaMapel" class="col-sm-2 col-form-label">Nama Mata Pelajaran</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputNamaMapel" name="nama_mapel" placeholder="Nama Mata Pelajaran" value="<?= $nama_mapel ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputKategoriMapel" class="col-sm-2 col-form-label">Kategori Mata Pelajaran</label>
			<div class="col-sm-10">
				<select class="form-control" name="kategori_mapel">
					<option value="">-- Pilih Kategori Mata Pelajaran --</option>
					<?php
					if (count($list_jurusan) > 0) {
						foreach ($list_jurusan as $kode => $nama) {
							$terpilih = '';
							if ($kategori_mapel == $kode) {
								$terpilih = " selected";
							}
							echo "<option value='$kode' $terpilih>$nama</option>";
						}
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