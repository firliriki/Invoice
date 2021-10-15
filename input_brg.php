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
                    <h2>Form Penginputan Barang</h2>
                    <h3>Rincian Barang</h3>
                </div>

                <!-- error -->

                <?php if(isset($_GET["pesan"])){ ?>
                <div class="alert alert-<?php echo $_GET["type"]; ?>" role="alert"><?php echo $_GET["pesan"]; ?></div>

               <?php } ?>
                    <!-- end error -->
                

               <?php

                $kuota = "SELECT * FROM tb_barang";
                $k_res = @mysqli_query($conn,$kuota);
                $rsKuota = @mysqli_fetch_array($k_res);
                $kode = @$_GET["kd_barang"];
                $sql ="SELECT * FROM tb_barang WHERE kd_barang=$kode";
                $result = @mysqli_query($conn,$sql);
                $rsDaftar = @mysqli_fetch_array($result);

                ?>

               
                
                <!-- pendaftaran -->
                <form action="simpan_pendaftaran.php" method="post">
                    <div class="row">
                        <div class="form col-md-6">
                            <div class="form-group">
								<input type="hidden" name="kd_barang" value="<?= @$rsDaftar["kd_barang"]; ?>">                         
                            </div>
                            <div class="form-group">
                                <label for="nm_barang"> Nama Barang</label>
                                <input type="text" class="form-control" name="nm_barang" id="nm_barang" aria-describedby="nm_barang" value="<?= @$rsDaftar["nm_barang"]; ?>">                            
                            </div>
                            <div class="form-group">
                                <label for="kd_jns">Jenis Barang</label>
                                <input type="text" class="form-control" name="kd_jns" id="kd_jns" aria-describedby="kd_jns" value="<?= @$rsDaftar["kd_jns"]; ?>">                            
                            </div>
                            </div>
                        <div class="form col-md-6">
                            <div class="form-group">
                                <label for="harga">Harga Barang</label>
                                <input type="text" class="form-control" name="harga" id="harga" aria-describedby="harga" value="<?= @$rsDaftar["harga"]; ?>">                            
                            </div>

                            <div class="form-group">
                                <label for="harga_beli">Harga Beli Barang</label>
                                <input type="text" class="form-control" name="harga_beli" id="harga_beli" aria-describedby="harga_beli" value="<?= @$rsDaftar["harga_beli"]; ?>">                            
                            </div>
                            <div class="form-group">
                                <label for="stok">Jumlah Barang</label>
                                <input type="text" class="form-control" name="stok" id="stok" aria-describedby="stok" value="<?= @$rsDaftar["stok"]; ?>">                            
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