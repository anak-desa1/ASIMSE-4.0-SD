<!DOCTYPE html>
<html>

<head>
	<title>Cetak Nilai Pengetahuan</title>
	<style type="text/css">
		body {
			font-family: arial;
			font-size: 12pt
		}

		.table {
			border-collapse: collapse;
			border: solid 1px #999;
			width: 100%
		}

		.table tr td,
		.table tr th {
			border: solid 1px #999;
			padding: 3px;
			font-size: 12px
		}

		.rgt {
			text-align: right;
		}

		.ctr {
			text-align: center;
			text-align: middle;
		}

		.des {
			text-align: justify;
			text-align: middle;
		}
	</style>
</head>

<body>

	<?php
	echo '<p align="left"><b>REKAP NILAI PENGETAHUAN</b>
                <br>
				<div class="card-body">
                     <p class="text-muted">' . $data['rombel'] . ' | ' . $data['nama'] . '</p>
                     <p class="text-muted">' . $data['mapel_id'] . ' | ' . $data['nama_lengkap'] . '</p>
                     <hr style="border: solid 1px #000; margin-top: -10px">
                 </div>';
	?>
	<table class="table table-striped table table-sm">
		<thead></thead>
		<tbody>
			<tr>
				<td rowspan="2" colspan="4" class="ctr"><b>DATA SISWA</b></td>
				<td colspan="23" class="ctr"><b>KI-3 PENGETAHUAN</b></td>
				<!-- <?php echo $ta ?> -->
			</tr>
			<?php foreach ($siswa as $s) :
			endforeach ?>
			<tr>
				<?php if (!empty($nilai)) { ?>
					<?php foreach ($nilai as $n) : ?>
					<?php endforeach ?>
					<?php if ($ta == 1) { ?>
						<td colspan="2" class="ctr">TEMA 1</td>
						<td colspan="2" class="ctr">TEMA 2</td>
						<td colspan="2" class="ctr">TEMA 3</td>
						<td colspan="2" class="ctr">TEMA 4</td>
					<?php } ?>
					<td colspan="2" class="ctr">TEMA 5</td>
					<?php if ($ta == 2) { ?>
						<td colspan="2" class="ctr">TEMA 6</td>
						<td colspan="2" class="ctr">TEMA 7</td>
						<td colspan="2" class="ctr">TEMA 8</td>
						<td colspan="2" class="ctr">TEMA 9</td>
					<?php } ?>
					<?php if ($n['tema'] == '-') { ?>
						<td colspan="2" class="ctr">NON TEMATIK</td>
					<?php } ?>
					<td colspan="11" class="ctr">REKAP NILAI</td>
			</tr>
			<tr>
				<td class="ctr">NO</td>
				<td class="ctr">NIS</td>
				<td class="ctr">Nama Siswa</td>
				<td class="ctr">KKM</td>
				<?php if ($ta == 1) { ?>
					<td class="ctr">KD</td>
					<td class="ctr">PH</td>
					<td class="ctr">KD</td>
					<td class="ctr">PH</td>
					<td class="ctr">KD</td>
					<td class="ctr">PH</td>
					<td class="ctr">KD</td>
					<td class="ctr">PH</td>
				<?php } ?>
				<td class="ctr">KD</td>
				<td class="ctr">PH</td>
				<?php if ($ta == 2) { ?>
					<td class="ctr">KD</td>
					<td class="ctr">PH</td>
					<td class="ctr">KD</td>
					<td class="ctr">PH</td>
					<td class="ctr">KD</td>
					<td class="ctr">PH</td>
					<td class="ctr">KD</td>
					<td class="ctr">PH</td>
				<?php } ?>
				<?php if ($n['tema'] == '-') { ?>
					<td class="ctr">KD</td>
					<td class="ctr">PH</td>
				<?php } ?>
			<?php } ?>
			<td class="ctr">KD</td>
			<td class="ctr">NPH</td>
			<td class="ctr">KD</td>
			<td class="ctr">NPTS</td>
			<td class="ctr">KD</td>
			<td class="ctr">NPAS</td>
			<td class="ctr">NILAI KD</td>
			<td class="ctr">Deskripsi</td>
			<td class="ctr">NILAI AKHIR</td>
			<td class="ctr">Predikat</td>
			<td class="ctr">Ketuntasan</td>
			</tr>
			<?php $no = 1;  ?>
			<?php if (!empty($nilai)) { ?>
				<?php foreach ($siswa as $s) : ?>
					<tr>
						<td class="ctr"><?= $no; ?></td>
						<td class="ctr"><?= $s['nis']; ?></td>
						<td><?= $s['nama']; ?></td>
						<td class="ctr"><?= $s['kkm']; ?></td>
						<!-- hitung nilai -->
						<?php
						$total_all = 0;
						$total_na = 0;
						$total_all_n = 0;
						$akd = array();
						$all_kd = "";
						$jum_kd = 0;
						foreach ($nilai as $n) :
							if ($n['tasm'] == $tasm)
								if ($n['id_siswa'] == $s['id_siswa']) {
									if (strpos($all_kd, $n['no_kd']) === false) {
										$all_kd = $all_kd . $n['no_kd'];
										array_push($akd, $n['no_kd']);
										$jum_kd++;
									} else if ($all_kd == "") {
										$all_kd = $all_kd . $n['no_kd'];
										array_push($akd, $n['no_kd']);
										$jum_kd++;
									}
						?>
						<?php }
						endforeach
						?>
						<!-- end hitung nilai -->
						<?php if ($ta == 1) { ?>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 1) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['no_kd'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 1) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['nilai'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 2) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['no_kd'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 2) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['nilai'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 3) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['no_kd'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 3) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['nilai'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 4) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['no_kd'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 4) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['nilai'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
						<?php } ?>
						<td class="ctr">
							<?php
							foreach ($nilai as $n) :
								if ($n['id_siswa'] == $s['id_siswa']) {
									if ($n['tema'] == 5) {
										if (substr($n['jenis'], 0, 2) == 'PH') {
											echo ' <div>' . $n['no_kd'] . ' </div>';
										}
									}
								}
							endforeach;
							?>
						</td>
						<td class="ctr">
							<?php
							foreach ($nilai as $n) :
								if ($n['id_siswa'] == $s['id_siswa']) {
									if ($n['tema'] == 5) {
										if (substr($n['jenis'], 0, 2) == 'PH') {
											echo ' <div>' . $n['nilai'] . ' </div>';
										}
									}
								}
							endforeach;
							?>
						</td>
						<?php if ($ta == 2) { ?>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 6) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['no_kd'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 6) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['nilai'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 7) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['no_kd'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 7) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['nilai'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 8) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['no_kd'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 8) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['nilai'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 9) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['no_kd'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa']) {
										if ($n['tema'] == 9) {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['nilai'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
						<?php } ?>
						<?php if ($n['tema'] == '-') if ($n['tasm'] == $tasm) { ?>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa'])   if ($n['tasm'] == $tasm) {
										if ($n['tema'] == '-') {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['no_kd'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
							<td class="ctr">
								<?php
								foreach ($nilai as $n) :
									if ($n['id_siswa'] == $s['id_siswa'])   if ($n['tasm'] == $tasm) {
										if ($n['tema'] == '-') {
											if (substr($n['jenis'], 0, 2) == 'PH') {
												echo ' <div>' . $n['nilai'] . ' </div>';
											}
										}
									}
								endforeach;
								?>
							</td>
						<?php } ?>
						<td class="ctr">
							<?php
							for ($i = 0; $i < $jum_kd; $i++) {
								echo '<div>' . $akd[$i] . '</div>';
							}
							?>
						</td>
						<td class="ctr">
							<?php
							if (!empty($nilai)) {
								for ($i = 0; $i < $jum_kd; $i++) {
									$total = 0;
									$jum_n = 0;
									foreach ($nilai as $n) :
										if ($n['tasm'] == $tasm)
											if ($n['id_siswa'] == $s['id_siswa']) {
												if (substr($n['jenis'], 0, 2) == 'PH') {
													if ($n['no_kd'] == $akd[$i]) {
														$jum_n++;
														$total = $total + $n['nilai'];
														// echo substr($n['jenis'], 0, 2);
													}
												}
											}
									endforeach;
									$total_all_n = (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
									// echo '<div>' . $akd[$i] . ': ' . (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP) . '</div>';
									echo '<div>' .  $total_all_n . '</div>';
								}
							}
							?>
						</td>
						<td class="ctr">
							<?php
							$total_all_pts = 0;
							$akd = array();
							$all_kd = "";
							$jum_kd = 0;
							foreach ($nilai as $n) :
								if ($n['tasm'] == $tasm)
									if ($n['jenis'] == 'PTS') {
										if ($n['id_siswa'] == $s['id_siswa']) {
											if (strpos($all_kd, $n['no_kd']) === false) {
												$all_kd = $all_kd . $n['no_kd'];
												array_push($akd, $n['no_kd']);
												$jum_kd++;
											} else if ($all_kd == "") {
												$all_kd = $all_kd . $n['no_kd'];
												array_push($akd, $n['no_kd']);
												$jum_kd++;
											}
										}
							?>
							<?php }
							endforeach
							?>
							<?php
							for ($i = 0; $i < $jum_kd; $i++) {
								echo '<div>' . $akd[$i] . '</div>';
							}
							?>
						</td>
						<td class="ctr">
							<?php
							if (!empty($nilai_pts)) {
								for ($i = 0; $i < $jum_kd; $i++) {
									$total = 0;
									$jum_n = 0;
									foreach ($nilai_pts as $n) :
										if ($n['tasm'] == $tasm)
											if ($n['id_siswa'] == $s['id_siswa']) {
												if ($n['no_kd'] == $akd[$i]) {
													$jum_n++;
													$total =  $total + $n['nilai'];
												}
											}
									endforeach;
									$total_all_pts = (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
									echo '<div>' .  $total_all_pts . '</div>';
								}
							}
							?>
						</td>
						<td class="ctr">
							<?php
							$total_all_pas = 0;
							$akd = array();
							$all_kd = "";
							$jum_kd = 0;
							foreach ($nilai as $n) :
								if ($n['tasm'] == $tasm)
									if ($n['jenis'] == 'PAS') {
										if ($n['id_siswa'] == $s['id_siswa']) {
											if (strpos($all_kd, $n['no_kd']) === false) {
												$all_kd = $all_kd . $n['no_kd'];
												array_push($akd, $n['no_kd']);
												$jum_kd++;
											} else if ($all_kd == "") {
												$all_kd = $all_kd . $n['no_kd'];
												array_push($akd, $n['no_kd']);
												$jum_kd++;
											}
										}
							?>
							<?php }
							endforeach
							?>
							<?php
							for ($i = 0; $i < $jum_kd; $i++) {
								echo '<div>' . $akd[$i] . '</div>';
							}
							?>
						</td>
						<td class="ctr">
							<?php
							if (!empty($nilai_pas)) {
								for ($i = 0; $i < $jum_kd; $i++) {
									$total = 0;
									$jum_n = 0;
									foreach ($nilai_pas as $n) :
										if ($n['tasm'] == $tasm)
											if ($n['id_siswa'] == $s['id_siswa']) {
												if ($n['no_kd'] == $akd[$i]) {
													$jum_n++;
													$total = $total + $n['nilai'];
												}
											}
									endforeach;
									$total_all_pas = (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
									echo '<div>' . $total_all_pas . '</div>';
								}
							}
							?>
						</td>
						<td class="ctr">
							<?php
							if (!empty($nilai)) {
								$maxmin = [];
								$desckd = [];
								for ($i = 0; $i < $jum_kd; $i++) {
									$total_n = 0;
									$jum_n = 0;
									$total_t = 0;
									$jum_t = 0;
									$total_p = 0;
									$jum_p = 0;
									if (!empty($nilai)) {
										foreach ($nilai as $n) :
											if ($n['tasm'] == $tasm)
												if ($n['id_siswa'] == $s['id_siswa']) {
													if (substr($n['jenis'], 0, 2) == 'PH') {
														if ($n['no_kd'] == $akd[$i]) {
															$jum_n++;
															$total_n = $total_n + $n['nilai'];
															$kd = $n['nama_kd'];
															//$desckd[] = $n['nama_kd'];
															if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
																$desckd[] = $n['nama_kd'];
															}
														}
													}
												}
										endforeach;
										$total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
										// echo '<div>' .  $total_all_n . '</div>';
									} else {
										echo $total_all_n = 0;
									}
									if (!empty($nilai_pts)) {
										foreach ($nilai_pts as $n) :
											if ($n['tasm'] == $tasm)
												if ($n['id_siswa'] == $s['id_siswa']) {
													if ($n['no_kd'] == $akd[$i]) {
														$jum_t++;
														$total_t =  $total_t + $n['nilai'];
													}
												}
										endforeach;
										// $total_all_pts = (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1;
										$total_all_pts = ($total_t != 0) ? (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1 : 0;
										// echo '<div>' .  $total_all_pts . '</div>';
									} else {
										// echo $total_all_pts = 0;
									}
									if (!empty($nilai_pas)) {
										foreach ($nilai_pas as $n) :
											if ($n['tasm'] == $tasm)
												if ($n['id_siswa'] == $s['id_siswa']) {
													if ($n['no_kd'] == $akd[$i]) {
														$jum_p++;
														$total_p =  $total_p + $n['nilai'];
													}
												}
										endforeach;
										$total_all_pas = (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1;
										// echo '<div>' .  $total_all_pas . '</div>';
									} else {
										// echo $total_all_pas = 0;
									}

									$total_na = $total_all_n +  $total_all_pts + $total_all_pas;
									// var_dump($nilai_rapor);
									// die;
									if ($total_all_pts > 1) {
										echo '<div>' . (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP) . '</div>';
										$total_all += (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP);
									} else {
										echo '<div>' . (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP) . '</div>';
										$total_all += (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP);
									}
								}
							}
							?>
						</td>
						<td class="des">
							<?php
							if (!empty($nilai)) {
								$maxmin = [];
								$desckd = [];
								for ($i = 0; $i < $jum_kd; $i++) {
									$total_n = 0;
									$jum_n = 0;
									$total_t = 0;
									$jum_t = 0;
									$total_p = 0;
									$jum_p = 0;
									if (!empty($nilai)) {
										foreach ($nilai as $n) :
											if ($n['tasm'] == $tasm)
												if ($n['id_siswa'] == $s['id_siswa']) {
													if (substr($n['jenis'], 0, 2) == 'PH') {
														if ($n['no_kd'] == $akd[$i]) {
															$jum_n++;
															$total_n = $total_n + $n['nilai'];
															$kd = $n['nama_kd'];
															//$desckd[] = $n['nama_kd'];
															if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
																$desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr($n['nama_kd'], 0, 115) . "..." : $n['nama_kd']);
															}
														}
													}
												}
										endforeach;
										$total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
										// echo '<div>' .  $total_all_n . '</div>';
									} else {
										echo $total_all_n = 0;
									}
									if (!empty($nilai_pts)) {
										foreach ($nilai_pts as $n) :
											if ($n['tasm'] == $tasm)
												if ($n['id_siswa'] == $s['id_siswa']) {
													if ($n['no_kd'] == $akd[$i]) {
														$jum_t++;
														$total_t =  $total_t + $n['nilai'];
													}
												}
										endforeach;
										// $total_all_pts = (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1;
										$total_all_pts = ($total_t != 0) ? (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1 : 0;
										// echo '<div>' .  $total_all_pts . '</div>';
									} else {
										// echo $total_all_pts = 0;
									}
									if (!empty($nilai_pas)) {
										foreach ($nilai_pas as $n) :
											if ($n['tasm'] == $tasm)
												if ($n['id_siswa'] == $s['id_siswa']) {
													if ($n['no_kd'] == $akd[$i]) {
														$jum_p++;
														$total_p =  $total_p + $n['nilai'];
													}
												}
										endforeach;
										$total_all_pas = ($total_p != 0) ? (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1 : 0;
										// $total_all_pas = (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1;
										// echo '<div>' .  $total_all_pas . '</div>';
									} else {
										// echo $total_all_pas = 0;
									}

									$total_na = $total_all_n +  $total_all_pts + $total_all_pas;
									// var_dump($nilai_rapor);
									// die;
									if ($total_all_pts >= 1) {
										$maxmin[] = (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP);
									} else {
										$maxmin[] = (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP);
									}
								}
								// echo "<h2>Nilai Min : " .  min($maxmin) . "</h2>";
								// echo "<h2>Nilai Max : " .  max($maxmin) . "</h2>";
								// echo "<div>Ananda" . $s['nama'] . " sangat baik 
								//                                     " . $desckd[array_search(max($maxmin), $maxmin)] . "
								//                                     , cukup 
								//                                     " . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
								if (empty($maxmin)) {
									echo 0;
								} else {
									echo "<div>Ananda <b>" . $s['nama'] . " sangat baik</b> 
                                                                    " . $desckd[array_search(max($maxmin), $maxmin)] . "
                                                                    , <b>cukup</b> 
                                                                    " . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
								}
							}
							?>
						</td>
						<td class="ctr">
							<?php if (!empty($total_all)) { ?>
								<?php $nilai_rapor =  round($total_all / count($akd), 0, PHP_ROUND_HALF_UP) ?>
								<?php echo '<div>' .  $nilai_rapor . '</div>'; ?>

							<?php
							} else {
								// echo $nilai_rapor = 0;
							} ?>
						</td>
						<td class="ctr">
							<?php if (!empty($total_all)) {
								$in_kkm = (string)round((100 - $s['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
								$C = $s['kkm'];
								$B = $C + $in_kkm;
								$A = $B + $in_kkm;
								// echo $in_kkm;
							?>
								<?php if ($nilai_rapor >= $A) {
									echo "A";
								} elseif ($nilai_rapor >= $B) {
									echo "B";
								} elseif ($nilai_rapor >= $C) {
									echo "C";
								} elseif ($nilai_rapor <= $C) {
									echo "D";
								} else {
									echo "Jangan menyerah, anda pasti bisa!  ";
								} ?>
							<?php
							} else {
								// echo $total_nph = 0;
							} ?>
						</td>
						<td class="ctr">
							<?php if (!empty($total_all)) { ?>
								<?php if ($nilai_rapor > $s['kkm']) { ?>
									<p>Tuntas</p>
								<?php
								} else {
									echo 'Belum Tuntas';
								}
								?>
							<?php
							} else {
								// echo $total_nph = 0;
							} ?>
						</td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php } ?>
		</tbody>
	</table>
</body>

</html>