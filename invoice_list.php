<?php 
session_start();
include('header.php');
include 'Invoice.php';
include "koneksi.php";
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<title>Invoice</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">

		

    <div id="dashboard" style="background-color: #eff8ed;">
    <?php
                include "sidebar.php";
            ?>
      <div class="container">
        <!-- <div class="row no-gutters"> -->
            
            <div class="main-content col-md-12">
            <h2 class="title">Dashboard</h2>
	  			  
      <table id="data-table" class="table dt-responsive nowrap tabel" >
        <thead>
          <tr style="font-size: 16px;">
            <th style="width: 20px;">Invoice No.</th>
            <th style="width: 80px;">Create Date</th>
            <th style="width: 80px;">Nama Costumer</th>
            <th>Invoice Total</th>
            <th>Print</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <?php		
		$invoiceList = $invoice->getInvoiceList();
        foreach($invoiceList as $invoiceDetails){
			$invoiceDate = date("d/M/Y, H:i", strtotime($invoiceDetails["order_date"]));
            echo '
              <tr style="height: 20px;">
                <td style="width: 20px;">'.$invoiceDetails["order_id"].'</td>
                <td style="width: 80px;">'.$invoiceDate.'</td>
                <td style="width: 80px;">'.$invoiceDetails["nm_cost"].'</td>
                <td style="width: 115px;">'.$invoiceDetails["order_total_after_tax"].'</td>
                <td style="width: 20px;"><a href="print_invoice.php?invoice_id='.$invoiceDetails["order_id"].'" title="Print Invoice"><span class="fas fa-print"></span></a></td>
                <td style="width: 20px;"><a href="edit_invoice.php?update_id='.$invoiceDetails["order_id"].'"  title="Edit Invoice"><span class="fas fa-edit"></span></a></td>
                <td style="width: 20px;"><a href="#" id="'.$invoiceDetails["order_id"].'" class="deleteInvoice"  title="Delete Invoice"><span class="fas fa-user-minus"></span></a></td>
              </tr>
            ';
        }       
        ?>
      </table>
      <script type="text/javascript" class="init">
                $(document).ready(function() {
                 $('.tabel').DataTable();
                } ); </script>
      </div>    
        </div>
    </div>
    <?php include('footer.php');?>
