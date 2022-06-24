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
			<?php 
				if ($readonly == "found") {
					$isReadonly = " readonly";
				} else {
					$isReadonly = "";
				}

				?>
			<input type="hidden" class="form-control" id="inputKodeJurusan" name="kode_jurusan" placeholder="Kode Jurusan" value="<?= $kode_jurusan ?>"  <?= $isReadonly ?>>
			<label for="inputKodeKelas" class="col-sm-2 col-form-label">Jurusan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputNamaJurusan" name="nama_jurusan" placeholder="Nama Jurusan" value="<?= $nama_jurusan ?>">
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