<?php

class Invoice{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "kasir";   
	private $invoiceUserTable = 'invoice_user';	
    private $invoiceOrderTable = 'invoice_order';
	private $invoiceOrderItemTable = 'invoice_order_item';
	private $tb_barang = 'tb_barang';
	
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function loginUsers($username, $password){
		$sqlQuery = "
			SELECT user_id, username, first_name, last_name, address, mobile 
			FROM ".$this->invoiceUserTable." 
			WHERE username='".$username."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
	}	
	public function checkLoggedIn(){
		if(!$_SESSION['userid']) {
			header("Location:index.php");
		}
	}		
	public function saveInvoice($POST) {
		include "koneksi.php";

		$sqlInsert = "
			INSERT INTO ".$this->invoiceOrderTable."(user_id, nm_cost, cust_no, alamat, order_total_before_tax, order_total_tax, order_tax_per, order_total_after_tax, dibayarkan, order_total_amount_due, note) 
			VALUES ('".$POST['userId']."', '".$POST['companyName']."', '".@$POST['companyNo']."', '".$POST['address']."', '".$POST['subTotal']."', '".$POST['taxAmount']."', '".$POST['taxRate']."', '".$POST['totalAftertax']."', '".$POST['amountPaid']."', '".$POST['amountDue']."', '".$POST['notes']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['productCode']); $i++) {
				$sqlInsertItem = "INSERT INTO ".$this->invoiceOrderItemTable."(order_id, kd_barang, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
				VALUES ('".$lastInsertId."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
				mysqli_query($this->dbConnect, $sqlInsertItem);	

				$stok = mysqli_query($conn,"SELECT * FROM tb_barang WHERE kd_barang='".$POST['productCode'][$i]."'");
				while($stoc = mysqli_fetch_array($stok)):
				$sto = $stoc['stok'];

				
				endwhile;
				$sisa =$sto-$POST['quantity'][$i];
				mysqli_query($conn,"UPDATE tb_barang SET stok='$sisa' WHERE kd_barang='".$POST['productCode'][$i]."'");
				
						
		}       	
	}	
	public function updateInvoice($POST) {
		include "koneksi.php";
		if($POST['invoiceId']) {	
			$sqlInsert = "
				UPDATE ".$this->invoiceOrderTable." 
				SET nm_cost = '".$POST['companyName']."', alamat= '".$POST['address']."', order_total_before_tax = '".$POST['subTotal']."', order_total_tax = '".$POST['taxAmount']."', order_tax_per = '".$POST['taxRate']."', order_total_after_tax = '".$POST['totalAftertax']."', dibayarkan = '".$POST['amountPaid']."', order_total_amount_due = '".$POST['amountDue']."', note = '".$POST['notes']."' 
				WHERE user_id = '".$POST['userId']."' AND order_id = '".$POST['invoiceId']."'";		
			mysqli_query($this->dbConnect, $sqlInsert);
			for ($i = 0; $i < count($POST['productCode']); $i++) {
				$stok = mysqli_query($conn,"SELECT * FROM tb_barang WHERE kd_barang='".$POST['productCode'][$i]."'");
				$stos = mysqli_query($conn,"SELECT * FROM invoice_order_item WHERE kd_barang='".$POST['productCode'][$i]."'");
				while($stoc = mysqli_fetch_array($stok)):
				while($stom = mysqli_fetch_array($stos)):

					$sto = $stoc['stok']+$stom['order_item_quantity'];
					
				endwhile;	
				endwhile;
				if($POST['quantity'][$i]>$stom['order_item_quantity']){
				$sisa =$sto-$POST['quantity'][$i];
				}else{
					$sisa = $stoc['stok']+$stom['order_item_quantity']-$POST['quantity'][$i];
				}
				mysqli_query($conn,"UPDATE tb_barang SET stok='$sisa' WHERE kd_barang='".$POST['productCode'][$i]."'");
			}
		}		
		$this->deleteInvoiceItems($POST['invoiceId']);
		for ($i = 0; $i < count($POST['productCode']); $i++) {			
			$sqlInsertItem = "
				INSERT INTO ".$this->invoiceOrderItemTable."(order_id, kd_barang, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
				VALUES ('".$POST['invoiceId']."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);			
		}       	
	}	
	public function getInvoiceList(){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE user_id = '".$_SESSION['userid']."'";
		return  $this->getData($sqlQuery);
	}	
	public function getInvoice($invoiceId){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE user_id = '".$_SESSION['userid']."' AND order_id = '$invoiceId'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}	
	public function getInvoiceItems($invoiceId){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderItemTable." 
			WHERE order_id = '$invoiceId'";
		return  $this->getData($sqlQuery);	
	}
	public function deleteInvoiceItems($invoiceId){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderItemTable." 
			WHERE order_id = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);				
	}
	public function deleteInvoice($invoiceId){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderTable." 
			WHERE order_id = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);	
		$this->deleteInvoiceItems($invoiceId);	
		return 1;
	}
	public function UserLevel($email){
		$sqlQuery = "
			SELECT user_id 
			FROM ".$this->invoiceUserTable." 
			WHERE email='".$email."' ";
        return  $this->getData($sqlQuery);
	}	
}
?>