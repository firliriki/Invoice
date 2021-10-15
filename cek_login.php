<?php
    if(!@$_SERVER['HTTP_REFERER']){
        die("koneksi error!");
    }
    session_start();

include "koneksi.php";

//cek data dari login
$nm_user       = htmlspecialchars($_POST["nm_user"]);
$password   = htmlspecialchars($_POST["password"]);

//cek data
$sql  = "SELECT * FROM tb_karyawan WHERE nm_user ='$nm_user'";
$result = @mysqli_query($conn,$sql);
$rsLogin = @mysqli_fetch_array($result);

if(mysqli_num_rows($result)>0){

    #cek data
    if(md5($password)==$rsLogin["password"]){
        $_SESSION["login"] = $rsLogin;

        header("location:invoice_list.php");
    }
    else {
        header("location:/invo/?pesan=Password Salah !");
    }
} else {
    header("location:/invo/?pesan=NISN tidak terdaftar !");
}

?>