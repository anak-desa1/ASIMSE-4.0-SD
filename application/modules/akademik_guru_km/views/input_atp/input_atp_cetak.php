<!DOCTYPE html>
<html>

<head>
	<title>Cetak ATP</title>
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
	echo '<p align="left"><b>ATP (SILABUS) KURIKULUM MERDEKA BELAJAR</b>
                <br>
				<div class="card-body">
                     <p class="text-muted">' . $data['id_kelas'] . ' | ' . $data['nama'] . '</p>
                     <p class="text-muted">' . $data['mapel_id'] . ' | ' . $data['nama_lengkap'] . '</p>
                     <hr style="border: solid 1px #000; margin-top: -10px">
                 </div>';
	?>
	<hr>   
	
	<br>
	<table class="table table-striped table table-sm" style="width:100%">
	<thead>
    	<tr>   
            <th width="30px">ELEMEN</th>
            <th width="50px">CAPAIAN PEMBELAJARAN</th>                                                   
            <th width="5px">TUJUAN PEMBELAJARAN</th>
			<th width="5px">PROFIL PELAJAR PANCASILA</th>
			<th width="5px">KATA KUNCI</th>
			<th width="5px">GLOSARIUM</th>
			<th width="5px">ALOKASI WAKT</th>
        </tr>
    </thead>
    <tbody>
	<?php
        $i = 1;
    ?>
	<?php foreach ($atp as $s) :
        if ($s['semester'] == $semester) { ?>
		<tr>
			<td><?=$s['elemen']?></td>
			<td><?=$s['no_sumatif']?>.<?=$s['nama_sumatif']?></td>
			<td><?=$s['tujuan_pembelajaran']?></td>			
			<td><?=$s['profil_pancasila']?></td>
			<td><?=$s['kata_kunci']?></td>
			<td><?=$s['glorasium']?></td>
			<td><?=$s['alokasi_waktu']?> JP</td>
		</tr>     
		<?php $i++ ?>
    <?php }
    endforeach ?>	                
	</tbody>
	</table>	
			
</body>

</html>