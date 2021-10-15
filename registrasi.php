<?php
    $title = "Registrasi";

      session_start();
      include('header.php');
      include 'Invoice.php';
      $invoice = new Invoice();
      $invoice->checkLoggedIn();
      include "koneksi.php";
?>
<link href="css/style.css" rel="stylesheet">
     <div id="dashboard">
     <?php
                include "sidebar.php";
            ?>
        <div class="container">
            
            <div class="main-content col-md-10 ml-auto" style="width: 300px; height: 100px; margin-top: 70px;">
            <h1>Registrasi</h1>
                <div class="inner" style="margin-left: 300px;">
                    

                    <!-- Pesan Error -->
                    <?php if(isset($_GET["pesan"])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET["pesan"]; ?>
                        </div>
                    <?php } ?>
                    <!-- End Pesan Error -->
                

                    <form action="simpan_reg.php" method="POST" style="align-items: center;">
                        <div class="form-group" style="width: 300px; font-size: 20px; text-align: center;">
                            <label for="nama">NAMA</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama">                          
                          </div>                        
                        <div class="form-group" style="width: 300px; font-size: 20px; text-align: center;">
                          <label for="password">PASSWORD</label>
                          <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button type="submit" style="align-items: center" class="btn btn-primary">REGISTER</button>
                    </form>
                       
                </div>
            </div>
        </div>
    </div>
   <?php
        include "footer.php";
   ?>