<?php

$id_provinsi_terpilih = $_POST["id_provinsi"];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_provinsi_terpilih,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: 2ca69c1a3eb7a685980f2aa5ae1436a8"
    ),
)
);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    //dapatnya dalam bentuk json, jadikan array dulu agar bisa dipakai oleh php
    $array_response = json_decode($response, TRUE);
    $data_kota = $array_response["rajaongkir"]["results"];

    // echo "<pre>";
    // print_r($data_kota);
    // echo "</pre>";

    echo "<option value=''>Pilih Kota / Kabupaten</option>";

    foreach ($data_kota as $key => $tiap_kota) {
        echo "<option value=''
        id_kota='" . $tiap_kota["city_id"] . "'
        nama_provinsi='" . $tiap_kota["province"] . "' 
        nama_kota='" . $tiap_kota["city_name"] . "' 
        tipe_kota='" . $tiap_kota["type"] . "'
        kode_pos='" . $tiap_kota["postal_code"] . "' >";
        echo $tiap_kota["type"] . " ";
        echo $tiap_kota["city_name"];
        echo "</option>";
    }
}
