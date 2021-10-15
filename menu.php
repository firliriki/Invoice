<ul class="nav navbar-nav">
<li class="dropdown">
	<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Invoice
	<span class="caret"></span></button>
	<ul class="dropdown-menu">
		<li><a href="invoice_list.php">Invoice List</a></li>
		<li><a href="create_invoice.php">Create Invoice</a></li>				  
	</ul>
</li>
<li class="dropdown">
	<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Barang
	<span class="caret"></span></button>
	<ul class="dropdown-menu">
		<li><a href="input_brg.php">Input Barang</a></li>
		<li><a href="data_brg.php">Data Barang</a></li>				  
	</ul>
</li>
<li class="dropdown">
	<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Costumer
	<span class="caret"></span></button>
	<ul class="dropdown-menu">
		<li><a href="input_cust.php">Input Costumer</a></li>
		<li><a href="data_cust.php">Data Costumer</a></li>				  
	</ul>
</li>
<?php 
if($_SESSION['userid']) { ?>
	<li class="dropdown">
		<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Logged in <?php echo $_SESSION['user']; ?>
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="#">Account</a></li>
			<li><a href="action.php?action=logout">Logout</a></li>		  
		</ul>
	</li>
<?php } ?>
</ul>
<br /><br /><br /><br />