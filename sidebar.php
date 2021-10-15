<?php
    // session_start();
    $login = @$_SESSION['userid'];
    include "koneksi.php";
?>


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" >

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dash.php">
    
    <div class="sidebar-brand-text mx-3">UD Hakim <sup>Invoice</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="invoice_list.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="create_invoice.php">
        <i class="fas fa-plus-square"></i>
        <span>Cetak Invoice</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="input_brg.php">
        <i class="fas fa-boxes"></i>
        <span>Input Barang</span></a>
</li>
<!-- <?php
    //  $query = mysqli_query($conn, "SELECT * FROM invoice_user WHERE id = '".$_SESSION['userid']."'");

    //  while($rsDaftar = mysqli_fetch_array($query)):

    //   if($rsDaftar["level"]=="admin"): 
?> -->
<!-- <li class="nav-item active">
    <a class="nav-link" href="registrasi.php">
        <i class="fas fa-boxes"></i>
        <span>Input Karyawan</span></a>
</li> -->
<?php
    // endif;
    // endwhile;
?>

<!-- <li class="nav-item active">
    <a class="nav-link" href="data_user.php">
        <i class="fas fa-user"></i>
        <span>Data Kasir</span></a>
</li> -->
<li class="nav-item active">
    <a class="nav-link" href="data_brg.php">
        <i class="fas fa-clipboard"></i>
        <span>Data Barang</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="print_laporan.php">
        <i class="fas fa-clipboard"></i>
        <span>Print Laporan</span></a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="data_cust.php">
        <i class="fas fa-user-alt"></i>
        <span>Data Costumer</span></a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="input_cust.php">
        <i class="fas fa-users"></i>
        <span>Input Costumer</span></a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="action.php?action=logout">
        <i class="fas fa-external-link-alt"></i>
        <span>Logout</span></a>
</li>



</ul>