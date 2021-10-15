<?php
    if(!@$_SERVER['HTTP_REFERER']){
        die("koneksi error!");
    }
     include "koneksi.php";


     $nama =htmlspecialchars($_POST["nama"]);
     $password =htmlspecialchars(md5($_POST["password"]));

    //  cek data
    $sql_cek = "SELECT * FROM 'tb_karyawan' WHERE nm_user='$nama'";
    $res_cek = @mysqli_query($conn,$sql_cek);

    if(mysqli_num_rows($res_cek)==0){
        $sql = "INSERT INTO tb_karyawan(nm_user,password) VALUES('$nama','$password')";
        $result = @mysqli_query($conn,$sql);

        // print_r($result);
        // jika berhasil
        header("location:data_user.php?pesan=Registrasi Sukses!");

    } else {
        header("location:data_user.php?pesan=Karyawan Sudah Terdaftar");
    }
?>