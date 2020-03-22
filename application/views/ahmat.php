<!DOCTYPE html>
<html>
<head>
	<title>Test </title>
</head>
<body>
	<p>Nama Saya <?php echo $nama; ?></p>
	<h3>Ramalan <b>Cuaca</b></h3>
	<ul>
		<?php 
		foreach((array) $data as $item) {
		    $time = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', @$item->jamCuaca);
		    $hari = @$time->format('l');
		    $tgl = @$time->format('d M Y');
		    $jam = @$time->format('H:i'); 
		  	?>
		  	<li>
		  	Cuaca kota singkawang
		  	Hari :<?php echo $hari; ?>,
		  	Tgl :<?php echo $tgl; ?>,
		  	Jam :<?php echo $jam; ?>,
		  	Cuaca :<?php echo $item->cuaca; ?>,
		  	Suhu :<?php echo $item->tempC; ?>°C nnnnnn</li>
		<?php }  ?>
	</ul>
</body>
</html>