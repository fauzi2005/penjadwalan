<div class="card-body">
	<!-- form start -->
	<form class="form-horizontal" method="POST">
		<table class="table table-bordered table-striped" style="font-size: 14px;">
			<thead>
				<tr>
					<th rowspan="2" class="align-middle text-center">Hari</th>
					<th rowspan="2" class="align-middle text-center">Kelas</th>
					<th rowspan="2" class="align-middle text-center">Guru Mata Pelajaran</th>
					<th colspan="3" rowspan="1" class="align-middle text-center">Sesi</th>
				</tr>
				<tr>
					<th class="align-middle text-center">Jam Ke</th>
					<th class="align-middle text-center">Jam Mulai<br>(WIB)</th>
					<th class="align-middle text-center">Jam Selesai<br>(WIB)</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($resultSesi as $sesi): ?>
					<tr>
						<td class="align-middle text-center">
							<?= $nama_hari ?>
						</td>

						<td>
							<select class="form-control select2bs4" style="width: 100%;" name="kelas[]">
								<option value="">-- Silahkan Pilih Kelas --</option>

								<?php foreach ($resultKelas as $kelas): ?>
									<option value="<?= $kelas['kode_kelas'] ?>"><?= $kelas['nama_jurusan'] . " - " . $kelas['kelas'] ?></option>							
								<?php endforeach ?>
							</select>
						</td>

						<td>
							<select class="form-control select2bs4" style="width: 100%;" name="gmp[]">
								<option value="">-- Silahkan Pilih Guru dan Mata Pelajaran --</option>

								<?php foreach ($resultGuruMapel as $guruMapel): ?>
									<option value="<?= $guruMapel['kode_gmp'] ?>"><?= "[Jurusan <br>" . $guruMapel['nama_jurusan'] . "] - [Mapel" . $guruMapel['nama_mapel'] . " - " . $guruMapel['nama_guru']?></option>							
								<?php endforeach ?>
							</select>
						</td>
						<input type="hidden" name="kode_sesi[]" value="<?= $sesi['kode_sesi'] ?>">
						<td class="align-middle text-center">
							<?= $sesi['id'] ?>
						</td>

						<td class="align-middle text-center">
							<?= $sesi['jam_mulai'] ?>
						</td>

						<td class="align-middle text-center">
							<?= $sesi['jam_selesai'] ?>
						</td>
					</tr>

				<?php endforeach ?>

			</tbody>
		</table>
		<div class="text-center card-footer">
			<button type="submit" class="btn btn-info" name="submit">Submit</button>
			<button type="reset" class="btn btn-default">Reset <?= $jumlahInput ?></button>
		</div>
	</form>
</div>
<!-- /.card-body -->