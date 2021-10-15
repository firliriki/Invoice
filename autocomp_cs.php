<?php
header("Content-Type: application/json; charset=UTF-8");

include "koneksi.php";

$brg = $_GET["query"];

// Query ke database.
$query  = $conn->query("SELECT * FROM costumer WHERE nm_cost LIKE '%$brg%' ORDER BY nm_cost DESC");
$result = $query->fetch_all(MYSQLI_ASSOC);

// Format bentuk data untuk autocomplete.
foreach($result as $data) {
    $output['suggestions'][] = [
        'value' => $data['nm_cost'],
        'cust_no' => $data['cust_no'],
        'nm_cost'  => $data['nm_cost']
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}

?>