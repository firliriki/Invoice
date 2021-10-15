<?php
    if(!@$_SERVER['HTTP_REFERER']){
        die("koneksi error!");
    }
    include "koneksi.php";

    if(!$_POST){
        header("location:invoice_list.php");
    }
    $cust_no               = htmlspecialchars($_POST["cust_no"]);
    $nm_cost             = htmlspecialchars($_POST["nm_cost"]);
    $alamat             = htmlspecialchars($_POST["alamat"]);
    

    if($cust_no){
            $sql = "UPDATE costumer SET nm_cost='$nm_cost',alamat='$alamat'";
           
            
    } else {
        $sql = "INSERT INTO costumer(nm_cost,alamat) VALUES('$nm_cost','$alamat')";
    }

    $result = @mysqli_query($conn,$sql);
    if($result){

        $error = "";
    
    if($error){
        header("location:data_cust.php?pesan=$error&type=danger");
    } else{
        header("location:data_cust.php?pesan=Data Berhasil Disimpan!&type=success");
    }
    
} else  {
        // print_r($result);
        header("location:data_cust.php?pesan=Data gagal disimpan !&type=danger");
    }

?>