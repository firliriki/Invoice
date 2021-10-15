<?php
header("Content-Type: application/json; charset=UTF-8");

include "koneksi.php";

$brg = $_GET["query"];

// Query ke database.
$query  = $conn->query("SELECT * FROM tb_barang WHERE nm_barang LIKE '%$brg%' ORDER BY nm_barang DESC");
$result = $query->fetch_all(MYSQLI_ASSOC);

// Format bentuk data untuk autocomplete.
foreach($result as $data) {
    $output['suggestions'][] = [
        'value' => $data['nm_barang'],
        'nm_barang'  => $data['nm_barang'],
        'kd_barang' => $data['kd_barang'],
        'harga' => $data['harga'],
        'harga_beli' => $data['harga_beli'],
        'stok' => $data['stok']
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}

?>