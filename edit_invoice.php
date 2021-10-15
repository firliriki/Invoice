<?php 
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
if(!empty($_POST['companyName']) && $_POST['companyName'] && !empty($_POST['invoiceId']) && $_POST['invoiceId']) {	
	$invoice->updateInvoice($_POST);	
	header("Location:invoice_list.php");	
}
if(!empty($_GET['update_id']) && $_GET['update_id']) {
	$invoiceValues = $invoice->getInvoice($_GET['update_id']);		
	$invoiceItems = $invoice->getInvoiceItems($_GET['update_id']);		
}
?>
<title>Edit Invoice</title>
<script src="js/invoice.js"></script>

<div id="dashboard" style="background-color: #eff8ed;"> 
        <?php
                include "sidebar.php";
            ?>
<div class="container content-invoice">
    	<form action="" id="invoice-form" method="post" class="invoice-form" role="form"> 
	    	<div class="load-animate animated fadeInUp">
		    	<div class="row">
		    		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		    			<h1 class="title">Edit Invoice</h1>		
		    		</div>		    		
		    	</div>
		      	<input id="currency" type="hidden" value="$">
		    	<div class="row">
		      		<div class="col-md-6">
		      			<h3>From,</h3>
						<?php echo $_SESSION['user']; ?><br>	
						<br>		      						      									
		      		</div>      		
		      		<div class="col-md-6">
					  <div class="autocomplete" style="margin-left: 60%;">
					<h3>To,</h3>
						<input type="text" name="companyName" id="companyName" placeholder="Company Name" required>
					</div>
		      		</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		      			<table class="table table-bordered table-hover" id="invoiceItem">	
							<tr style="background-color: #d3d3d4;">
								<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
								<th width="15%">Item No</th>
								<th width="38%">Item Name</th>
								<th width="15%">Quantity</th>
								<th width="15%">Price</th>								
								<th width="15%">Total</th>
							</tr>
							<?php 
							$count = 0;
							foreach($invoiceItems as $invoiceItem){
								$count++;
							?>								
							<tr>
								<td><input class="itemRow" type="checkbox"></td>
								<td><input type="text" value="<?php echo $invoiceItem["kd_barang"]; ?>" name="productCode[]" id="productCode_<?php echo $count; ?>" class="form-control" autocomplete="off"></td>
								<td><input type="text" value="<?php echo $invoiceItem["item_name"]; ?>" name="productName[]" id="productName_<?php echo $count; ?>" class="form-control productName" ></td>			
								<td><input type="number" value="<?php echo $invoiceItem["order_item_quantity"]; ?>" name="quantity[]" id="quantity_<?php echo $count; ?>" class="form-control quantity" autocomplete="off"></td>
								<td><input type="number" value="<?php echo $invoiceItem["order_item_price"]; ?>" name="price[]" id="price_<?php echo $count; ?>" class="form-control price" autocomplete="off"></td>
								<td><input type="number" value="<?php echo $invoiceItem["order_item_final_amount"]; ?>" name="total[]" id="total_<?php echo $count; ?>" class="form-control total" autocomplete="off"></td>
								<input type="hidden" value="<?php echo $invoiceItem['order_item_id']; ?>" class="form-control" name="itemId[]">
							</tr>	
							<?php } ?>		
						</table>
		      		</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
		      			<button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
		      			<button class="btn btn-success" id="addRows" type="button">+ Add More</button>
		      		</div>
		      	</div>
		      	<div class="row">	
		      		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		      			<!-- <h3>Notes: </h3>
		      			<div class="form-group">
							<textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"><?php echo $invoiceValues['note']; ?></textarea>
						</div> -->
						<br>
						<div class="form-group">
							<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
							<input type="hidden" value="<?php echo $invoiceValues['order_id']; ?>" class="form-control" name="invoiceId" id="invoiceId">
			      			<input data-loading-text="Updating Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
			      		</div>
						
		      		</div>
		      		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<span class="form-inline">
							<div class="form-group" hidden>
								<label>Subtotal: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon currency">Rp</div>
									<input value="<?php echo $invoiceValues['order_total_before_tax']; ?>" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
								</div>
							</div>
							<div class="form-group" hidden>
								<label>Tax Rate: &nbsp;</label>
								<div class="input-group">
									<input value="<?php echo $invoiceValues['order_tax_per']; ?>" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
									<div class="input-group-addon">%</div>
								</div>
							</div>
							<div class="form-group" hidden>
								<label>Tax Amount: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon currency">Rp</div>
									<input value="<?php echo $invoiceValues['order_total_tax']; ?>" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
								</div>
							</div>							
							<div class="form-group">
								<label style="padding-left: 23px;">Total: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon currency">Rp</div>
									<input value="<?php echo $invoiceValues['order_total_after_tax']; ?>" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
								</div>
							</div>
							<div class="form-group">
								<label>Dibayar: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon currency">Rp</div>
									<input value="<?php echo $invoiceValues['order_amount_paid']; ?>" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
								</div>
							</div>
							<br>
						<br>
							<div class="form-group">
								<label>Kembali: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-addon currency">Rp</div>
									<input value="<?php echo $invoiceValues['order_total_amount_due']; ?>" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
								</div>
							</div>
						</span>
					</div>
		      	</div>
		      	<div class="clearfix"></div>		      	
	      	</div>
		</form>	

		<script type="text/javascript">
   		 $(document).ready(function() {
		get_product();
  		  })

	function get_product(){
		        // Selector input yang akan menampilkan autocomplete.
				$( ".productName" ).autocomplete({
            serviceUrl: "autocomp.php",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
				var id = $(this).attr("id");
				var index = id.substring(id.indexOf('_')+1);
				
				console.log(suggestion);
				<?php 
							$count = 0;
							foreach($invoiceItems as $invoiceItem){
								$count++;
							?>	
                $(this).val("" + suggestion.nm_barang);
                $("#productCode_"+<?php echo json_encode($count); ?>).val("" + suggestion.kd_barang);
                $("#price_"+<?php echo json_encode($count); ?>).val("" + suggestion.harga);
                $("#quantity_"+<?php echo json_encode($count); ?>).attr("min",1);
                $("#quantity_"+<?php echo json_encode($count); ?>).attr("max",parseInt(suggestion.stok));
                $("#quantity_"+<?php echo json_encode($count); ?>).attr("title","Stok Maximal : "+parseInt(suggestion.stok));
				$("#price_"+<?php echo json_encode($count); ?>).attr("min",parseInt(suggestion.harga_beli));
                $("#price_"+<?php echo json_encode($count); ?>).attr("title","HPP : "+parseInt(suggestion.harga_beli));
				<?php } ?>
            }
        });
	}
	</script>
<script type="text/javascript">
    		$(document).ready(function() {
        // Selector input yang akan menampilkan autocomplete.
       		 $( "#companyName" ).autocomplete({
            serviceUrl: "autocomp_cs.php",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
                $( "#companyName" ).val("" + suggestion.nm_cost);
            }
        });
    })
</script>

<script type="text/javascript">
            function isi_otomatis(){
                var productName_1 = $("#productName_1").val();
                $.ajax({
                   
                    url: 'ajax.php/data',
					method:'GET',
					data:"productName_1="+productName_1,
                success: function (data) {
					console.log(data);
                    var json = data,
                    
                    obj = JSON.parse(json);
                    console.log(obj);
                    $('#productCode_1').val(obj.kd_barang);
                    $('#price_1').val(obj.harga);
                  }
                });

                
               }
              
        </script>		
    </div>
</div>
</div>	
<?php include('footer.php');?>