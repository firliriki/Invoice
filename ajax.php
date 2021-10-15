<?php

//membuat koneksi ke database
include  "koneksi.php";


$productName_1 = $_GET['productName_1'];

//mengambil data
$query  = mysqli_query($conn, "SELECT * FROM tb_barang WHERE nm_barang='$productName_1'");
$barang = mysqli_fetch_array($query);
$data[] = array(
            'kd_barang'      =>  $barang['kd_barang'],
            'harga'      =>  $barang['harga']
            );

//tampil data
echo json_encode($data);

?>