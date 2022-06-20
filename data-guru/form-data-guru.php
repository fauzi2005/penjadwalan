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
			<label for="inputKodeGuru" class="col-sm-2 col-form-label">Kode Guru</label>
			<div class="col-sm-10">
				<?php if ($readonly == "found") { $isReadonly = " readonly"; } else { $isReadonly = ""; } ?>
				<input type="text" class="form-control" id="inputKodeGuru" name="kode_guru" placeholder="Kode Guru" value="<?= $kode_guru ?>" <?= $isReadonly ?>>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputNIPGuru" class="col-sm-2 col-form-label">NIP Guru</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="inputNIPGuru" name="nip_guru" placeholder="NIP Guru" value="<?= $nip_guru ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputNamaGuru" class="col-sm-2 col-form-label">Nama Guru</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputNamaGuru" name="nama_guru" placeholder="Nama Guru" value="<?= $nama_guru ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputGelarGuru" class="col-sm-2 col-form-label">Gelar Guru</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputGelarGuru" name="gelar_guru" placeholder="Gelar Guru" value="<?= $gelar_guru ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputGender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
			<div class="col-sm-10">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="gender_guru" value="Laki-laki" id="L" <?= $gender_guru == "Laki-laki" ? ' checked' : '' ?>>
					<label class="form-check-label" for="L">Laki-laki</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="gender_guru" value="Perempuan" id="P" <?= $gender_guru == "Perempuan" ? ' checked' : '' ?>>
					<label class="form-check-label" for="P">Perempuan</label>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputAlamatGuru" class="col-sm-2 col-form-label">Alamat Guru</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="3" placeholder="Alamat Guru" name="alamat_guru" id="inputAlamatGuru"><?= $alamat_guru ?></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputNoHPGuru" class="col-sm-2 col-form-label">No HP Guru</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="inputNoHPGuru" name="no_hp_guru" placeholder="No HP Guru" value="<?= $no_hp_guru ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputEmailGuru" class="col-sm-2 col-form-label">E-mail Guru</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="inputEmailGuru" name="email_guru" placeholder="E-mail Guru" value="<?= $email_guru ?>">
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