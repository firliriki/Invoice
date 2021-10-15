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
            <div class="main-content col-md-10 ml-auto">
            
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
                                            $sql_users = "SELECT count(*) as total FROM costumer";
                                            $result = @mysqli_query($conn,$sql_users);
                                            $total = @mysqli_fetch_array($result);
                                        ?>
                                            <h5>Total Costumer Langganan</h5>
                                            <h1><?= $total[0] ?></h1>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                                    
                    </div>
                </div>
                <div class="title">
                    <h2>Data Pelanggan</h2>
                </div>

                <?php
                    $sql_ckdt = "SELECT count(*) as total FROM costumer";
                    $result = @mysqli_query($conn,$sql_ckdt);
                    $total = @mysqli_fetch_array($result);
               

                if ($total>0){
                ?>
                <table id="dt-pendaftaran" class="table dt-responsive nowrap tabel">
                    <thead>
                        <tr>
                            <th>No. Costumer</th>
                            <th>Nama Costumer</th>
                            <th>Alamat Costumer</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $sql = "SELECT * FROM costumer";
                                $result = @mysqli_query($conn,$sql);
                                while($rsDaftar = @mysqli_fetch_array($result)):

                        ?>
                        <tr>
                                <td width="15%"><?= $rsDaftar["cust_no"] ?></td>
                                <td><?= $rsDaftar["nm_cost"] ?></td>
                                <td><?= $rsDaftar["alamat"] ?></td>
                                <td>[<a href="input_cust.php?cust_no=<?= $rsDaftar["cust_no"]; ?>"><i class="fas fa-user-edit"></i></a>]</td>
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
                 $('.tabel').DataTable();
                } ); </script>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
   ?>