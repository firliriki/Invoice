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
                    <h2>Form Penginputan Costumer</h2>
                </div>

                <!-- error -->

                <?php if(isset($_GET["pesan"])){ ?>
                <div class="alert alert-<?php echo $_GET["type"]; ?>" role="alert"><?php echo $_GET["pesan"]; ?></div>

               <?php } ?>
                    <!-- end error -->
                

               <?php

                // $kuota = "SELECT * FROM tb_kuota";
                // $k_res = @mysqli_query($conn,$kuota);
                // $rsKuota = @mysqli_fetch_array($k_res);
                $kode = @$_GET["cust_no"];
                $sql ="SELECT * FROM costumer WHERE cust_no=$kode";
                $result = @mysqli_query($conn,$sql);
                $rsDaftar = @mysqli_fetch_array($result);

                ?>

               
                
                <!-- pendaftaran -->
                <form action="simpan_cust.php" method="post">
                    <div class="row">
                        <div class="form col-md-12">
                            <div class="form-group">
								<input type="hidden" name="cust_no" value="<?= @$rsDaftar["cust_no"]; ?>">
                                <label for="nm_cost"> Nama Costumer</label>
                                <input type="text" class="form-control" name="nm_cost" id="nm_cost" aria-describedby="nm_cost" value="<?= @$rsDaftar["nm_cost"]; ?>">                            
                            </div>
                            <div class="form-group">
                                <label for="alamat"> Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="alamat" value="<?= @$rsDaftar["alamat"]; ?>">                            
                            </div>
                           
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>                                
                            </div>
                        </div>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
<?php include "footer.php"; ?>