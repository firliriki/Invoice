<?php 
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
include "koneksi.php";
?>
<title>Invoice</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
                                                                                                                                                   

    <div id="dashboard" style="background-color: #eff8ed;">
    <?php
     include "sidebar.php";
     ?>
      <div class="container">
            <div class="main-content col-md-12">
            
                <div class="title">
                    <h2>Dashboard</h2>
                </div>
                <!-- error -->

                <?php if(isset($_GET["pesan"])){ ?>
                <div class="alert alert-<?php echo $_GET["type"]; ?>" role="alert"><?php echo $_GET["pesan"]; ?></div>

               <?php } ?>
                    <!-- end error -->
                <div class="info">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box card mb-3">
                                <div class="row no-gutters">
                                    <div class="icon col-md-4 bg-aqua">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content">
                                        <?php
                                            $sql_users = "SELECT count(*) as total FROM tb_barang";
                                            $result = @mysqli_query($conn,$sql_users);
                                            $total = @mysqli_fetch_array($result);
                                        ?>
                                            <h5>Total Barang</h5>
                                            <h1><?= $total[0] ?></h1>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-md-4">
                            <div class="info-box card mb-3">
                                <div class="row no-gutters">
                                    <div class="icon col-md-4 bg-yellow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content">
                                        <?php
                                            $sql_ver = "SELECT count(*) as total FROM invoice_order";
                                            $result = @mysqli_query($conn,$sql_ver);
                                            $total = @mysqli_fetch_array($result);
                                        ?>
                                            <h5>Total Transaksi</h5>
                                            <h1><?= $total[0] ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                                                
                    </div>
                </div>
                <div class="title">
                    <h2>Data Barang</h2>
                </div>

                <?php
                    $sql_ckdt = "SELECT count(*) as total FROM tb_barang";
                    $result = @mysqli_query($conn,$sql_ckdt);
                    $total = @mysqli_fetch_array($result);
               

                if ($total>0){
                ?>
                <table id="dt-pendaftaran" class="table dt-responsive nowrap tabel">
                    <thead>
                        <tr>
                        
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>HPP</th>
                            <th>Stok</th>
                            <th>Edit</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $sql = "SELECT * FROM tb_barang";
                                $result = @mysqli_query($conn,$sql);
                                while($rsDaftar = @mysqli_fetch_array($result)):

                        ?>
                        <tr>
                                <td width="30%"><?= $rsDaftar["kd_barang"] ?></td>
                                <td><?= $rsDaftar["nm_barang"] ?></td>
                                <td><?= $rsDaftar["kd_jns"] ?></td>
                                <td width="30%"><?= $rsDaftar["harga"] ?></td>
                                <td width="30%"><?= $rsDaftar["harga_beli"] ?></td>
                                <td width="15%"><?= $rsDaftar["stok"] ?></td>
                                 <td class="center">
                                
                                [<a href="input_brg.php?kd_barang=<?= $rsDaftar["kd_barang"]; ?>"><i class="fas fa-user-edit"></i></a>]
    
                                </td>
                        </tr>
                        <?php
                            endwhile;
                        ?>
                    </tbody>
                </table>
                <?php
                }
                ?>
                <script type="text/javascript" class="init">
                $(document).ready(function() {
                 $('.table').DataTable();
                } ); </script>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
   ?>