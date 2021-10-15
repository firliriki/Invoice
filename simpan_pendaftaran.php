<?php
    if(!@$_SERVER['HTTP_REFERER']){
        die("koneksi error!");
    }
    include "koneksi.php";

    if(!$_POST){
        header("location:invoice_list.php");
    }

   
    $nm_barang              = htmlspecialchars($_POST["nm_barang"]);
    $kd_barang               = htmlspecialchars($_POST["kd_barang"]);
    $kd_jns                 = htmlspecialchars($_POST["kd_jns"]);
    $harga                 = htmlspecialchars($_POST["harga"]);
    $harga_beli             = htmlspecialchars($_POST["harga_beli"]);
    $stok                 = htmlspecialchars($_POST["stok"]);



    if($kd_barang){
            $sql = "UPDATE tb_barang SET nm_barang='$nm_barang',kd_jns='$kd_jns',harga='$harga',harga_beli='$harga_beli',stok='$stok' ,updated_at=current_timestamp() WHERE kd_barang='$kd_barang'";
           
            
    } else {
        $sql = "INSERT INTO tb_barang(nm_barang,kd_jns,harga,harga_beli,stok) VALUES('$nm_barang','$kd_jns','$harga','$harga_beli','$stok')";
    }

    $result = @mysqli_query($conn,$sql);
    if($result){

        $error = "";
    
    if($error){
        header("location:data_brg.php?pesan=$error&type=danger");
    } else{
        header("location:data_brg.php?pesan=Data Berhasil Disimpan!&type=success");
    }
    
} else  {
        // print_r($result);
        header("location:data_brg.php?pesan=Data gagal disimpan !&type=danger");
    }

?>