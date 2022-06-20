<!-- form start -->
<form class="form-horizontal" method="POST">
	<?php if ($isError): ?>
		<br>
		<div class="alert alert-danger">
			<?= $error ?>
		</div>
	<?php endif ?>
	<div class="card-body">
		<div class="form-group row">
			<label for="inputKodeKelas" class="col-sm-2 col-form-label">Kelas</label>
			<div class="col-sm-10">
				<?php 
				if ($readonly == "found") {
					$isReadonly = " readonly";
				} else {
					$isReadonly = "";
				}

				?>
				<input type="text" class="form-control" id="inputKodeKelas" name="kode_kelas" placeholder="Kode Kelas" value="<?= $kode_kelas ?>" <?= $isReadonly ?>>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputKelas" class="col-sm-2 col-form-label">Kelas</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="inputKelas" name="kelas" placeholder="Kelas" value="<?= $kelas ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
			<div class="col-sm-10">
				<!-- <input type="text" class="form-control" id="inputJurusan" name="jurusan" placeholder="Jurusan" value="<?= $jurusan ?>"> -->
				<select class="form-control" name="jurusan">
					<option value="">-- Pilih Jurusan --</option>
					<?php 
					if (count($list_jurusan) > 0) {
						foreach ($list_jurusan as $kode => $nama) {
							$terpilih = '';
							if ($jurusan == $kode) {
								$terpilih = " selected";
							}
							echo "<option value='$kode' $terpilih>$nama</option>";
						}
					}
					?>
                 </select>
			</div>
		</div>
		<!-- <button type="submit" class="btn btn-info" value="Send">Submit</button> -->
		<!-- <button type="reset" class="btn btn-default">Reset</button> -->
	</div>
	<!-- /.card-body -->
	<div class="text-center card-footer">
		<button type="submit" class="btn btn-info" name="submit">Submit</button>
		<button type="reset" class="btn btn-default">Reset</button>
	</div>
	<!-- /.card-footer -->
</form>