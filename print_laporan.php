<?php
session_start();
include 'Invoice.php';
include 'koneksi.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
$invoiceList = $invoice->getInvoiceList();

$output = '';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="left" style="font-size:18px"><b>CV Sukses Jaya Abadi</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>

	<td align="center">
    <b>Laporan Penjualan</b><br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
    <th style="width: 20px;">Invoice No.</th>
    <th style="width: 80px;">Create Date</th>
    <th style="width: 80px;">Nama Costumer</th>
    <th>Invoice Total</th>
	
	</tr>';
   
foreach($invoiceList as $invoiceDetails){
	$output .= '
	<tr>
    <td style="width: 20px;">'.$invoiceDetails["order_id"].'</td>
    <td style="width: 80px;">'.$invoiceDetails["order_date"].'</td>
    <td style="width: 80px;">'.$invoiceDetails["nm_cost"].'</td>
    <td style="width: 115px;">'.$invoiceDetails["order_total_after_tax"].'</td>
	</tr>';
}

$sql = "SELECT SUM(`order_total_after_tax`) AS total FROM `invoice_order`";
$result = @mysqli_query($conn,$sql);
while($rsDaftar = @mysqli_fetch_array($result)):


$output .= '
	</table>
	</td>
	</tr>
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td align="right">Total :'.$rsDaftar["total"].'</td>
	</tr>
	</table>
	</table>';
endwhile;
// create pdf of invoice	
$invoiceFileName = 'Laporan Penjualan.pdf';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>   
   