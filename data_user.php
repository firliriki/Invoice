<?php
      session_start();
      include('header.php');
      include 'Invoice.php';
      $invoice = new Invoice();
      $invoice->checkLoggedIn();
      include "koneksi.php";
?>
<link href="css/style.css" rel="stylesheet">
<?php
$title = "User Data";

  $query = mysqli_query($conn, "SELECT * FROM invoice_user");
?>

    <div id="dashboard" style="background-color: #eff8ed;">
            <?php
                include "sidebar.php";
            ?>
        <div class="container">
            
            <div class="main-content col-md-10 ml-auto">
                <div class="title">
                    <h2>Data Kasir</h2>
                </div>
                
                <!-- error -->

                <?php if(isset($_GET["pesan"])){ ?>
                <div class="alert alert-<?php echo $_GET["type"]; ?>" role="alert"><?php echo $_GET["pesan"]; ?></div>

               <?php } ?>
                    <!-- end error -->
                <div id="tabel_wrapper" class="dataTables_wrapper">
        <table class="table table-striped dt-responsive nowrap tabel" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kasir</th>
               
                
            </tr>
        </thead>
        <tbody>
        <?php

            while($rsDaftar = mysqli_fetch_array($query)):
                
        ?>
        <tr>
                <td><?= $rsDaftar["id"]; ?></td>
                <td><?= $rsDaftar["first_name"]; ?></td>
               
            </tr>
            <?php
                endwhile;
            ?>
        </tbody>
        </table>
        <script type="text/javascript" class="init">
    $(document).ready(function() {
    $('.tabel').DataTable();
    } ); </script>

        <p style="text-align : center;"><a href="registrasi.php" class="btn btn-primary">TAMBAH</a></p>
        </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
   ?>