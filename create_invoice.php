<?php 
session_start();
include('header.php');
include 'Invoice.php';
include 'koneksi.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
if(!empty($_POST['companyName']) && $_POST['companyName']) {	
	$invoice->saveInvoice($_POST);
	header("Location:invoice_list.php");	
}
?>
<title>Invoice System</title>
<script src="js/invoice.js"></script>



<div id="dashboard" style="background-color: #eff8ed;"> 
        <?php
                include "sidebar.php";
            ?>
	<div class="container content-invoice">
	<form action="" id="invoice-form" method="post" class="invoice-form" role="form"> 
		<div class="load-animate animated fadeInUp">
			<div class="row">
				<div class="col-md-12">
					<h2 class="title" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Cetak Invoice</h2>	
				</div>		    		
			</div>
			<?php if(isset($_GET["pesan"])){ ?>
                <div class="alert alert-<?php echo $_GET["type"]; ?>" role="alert"><?php echo $_GET["pesan"]; ?></div>

               <?php } ?>
			<input id="currency" type="hidden" value="$">
			<div class="row">
				<div class="col-md-6">
					<h3>From,</h3>
					<?php echo $_SESSION['user']; ?><br>	
					
					<?php echo $_SESSION['username']; ?><br>	
				</div>      		
				<div class="col-md-6">
					<div class="autocomplete" style="margin-left: 60%;">
					<h3>To,</h3>
						<input type="text" name="companyName" id="companyName" placeholder="Company Name" required>
						<input type="text" name="companyNo" id="companyNo"  hidden>
					</div>
					<?php
								 $sqlb = "SELECT * FROM tb_barang";
								 $resultb = mysqli_query($conn,$sqlb);
								 while($rsBarang = mysqli_fetch_array($resultb)){
									 $nmb[] = $rsBarang['nm_barang'];
								 }
								 $cols = implode(",",$nmb);
								

                                $sql = "SELECT * FROM costumer";
                                $result = mysqli_query($conn,$sql);
                                while($rsDaftar = mysqli_fetch_array($result)){
									$nm[] = $rsDaftar['nm_cost'];
								}
								$coll = implode(",",$nm);
								
								
                        ?>
							
				
	 				
					<!-- <div class="form-group">
						<textarea class="form-control" rows="3" name="address" id="address" placeholder="Your Address"></textarea>
					</div> -->
					
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr style="background-color: #d3d3d4;">
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							<th width="15%">Item No</th>
							<th width="30%">Item Name</th>
							<th width="15%">Quantity</th>
							<th width="15%">Price</th>								
							<th width="15%">Total</th>
						</tr>							
						<tr>
							<td><input class="itemRow" type="checkbox"></td>
							<td><input type="text" name="productCode[]" id="productCode_1"  class="form-control" autocomplete="off" required></td>
							<td><input type="text" name="productName[]" id="productName_1"  class="form-control productName" required></td>			
							<td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off" required/></td>
							<td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off" required></td>
							<td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off" required></td>
						</tr>						
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
						<textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"></textarea>
					</div> -->
					<br>
					
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<span class="form-inline">
						<div class="form-group" hidden>
							<label>Subtotal: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">Rp</div>
								<input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
							</div>
						</div>
						<div class="form-group" hidden>
							<label>Tax Rate: &nbsp;</label>
							<div class="input-group">
								<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
								<div class="input-group-addon">%</div>
							</div>
						</div>
						<div class="form-group" hidden>
							<label>Tax Amount: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
							</div>
						</div>							
						<div class="form-group">
							<label style="padding-left: 23px;">Total: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">Rp</div>
								<input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
							</div>
						</div>
						<div class="form-group">
							<label>Dibayar: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">Rp</div>
								<input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
							</div>
						</div>

						<br>
						<br>
						<div class="form-group">
							<label>Kembali: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">Rp</div>
								<input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
							</div>
						</div>

					</span>
				</div>
				<br>
				<div class="form-group" style="margin-left: 850px; padding-top: 50px;">
						<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
						<input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">						
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
                $(this).val("" + suggestion.nm_barang);
                $("#productCode_"+index).val("" + suggestion.kd_barang);
                $("#price_"+index).val("" + suggestion.harga);
                $("#quantity_"+index).attr("min",1);
                $("#quantity_"+index).attr("max",parseInt(suggestion.stok));
                $("#quantity_"+index).attr("title","Stok Maximal : "+parseInt(suggestion.stok));
				$("#price_"+index).attr("min",parseInt(suggestion.harga_beli));
                $("#price_"+index).attr("title","HPP : "+parseInt(suggestion.harga_beli));
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
				$( "#companyNo" ).val("" + suggestion.cust_no);
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
<?php include('footer.php');?>