<?php 

require 'vendor/autoload.php';
use Carbon\Carbon;

#date_default_timezone_set('Asia/jakarta');

# $date = Carbon::createFromDate(2020, 2, 29);
# $date = Carbon::now();
# $date = Carbon::createFromDate(1945, 8, 17);

# printf("Tanggal berapakah sekarang? %s\n", $date->diffForHumans());
# printf("Tanggal berapakah sekarang? %s\n", $date);
# printf("Tanggal berapakah indonesia merdeka? %s\n", $date->diffForHumans());


$api = new RestClient([
	'base_url' => "https://ibnux.github.io/BMKG-importer",
	'format' => "json"
]);
$result = $api->get("cuaca/501320");
$data = $result->decode_response();

foreach((array) $data as $item) {
    // $time = date('d F Y', strtotime($item->jamCuaca));
    // $jam = date('H:i', strtotime($item->jamCuaca));
    $time = Carbon::createFromFormat('Y-m-d H:i:s', @$item->jamCuaca);
    $hari = @$time->format('l');
    $tgl = @$time->format('d M Y');
    $jam = @$time->format('H:i');
	printf("Cuaca kota singkawang Hari %s tanggal %s jam %s, adalah %s dengan suhu %s °C . \n", $hari, $tgl, $jam, $item->cuaca, $item->tempC );
}

