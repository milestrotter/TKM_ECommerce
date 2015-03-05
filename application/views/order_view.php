<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to TKM!</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
<nav class='navbar navbar-default navbar-fixed-top' role='navigation'>
	<div class='navbar-header'>
		<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-targets='#bs-example-navbar-collapse-1'>
			<span class='sr-only'>Toggle Navigation</span>
			<span class='icon-bar'></span>
			<span class='icon-bar'></span>
			<span class='icon-bar'></span>
		</button>
		<a class='navbar-brand' href="/">TKM Technologies</a>
	</div>
	<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
		<ul class='nav navbar-nav'>
			<li>
				<a class='btn' href="/cart"><h4 class='active'><span class='label label-primary'>Shopping Cart 
				<span class='label label-success label-as-badge'><?= $this->session->userdata('cart_contents')['total_items']?></span></span></h4></a>
			</li>
		</ul>
	</div>
</nav>
<div class="container">
	<div class='row'>
		<div class='col-sm-12'>
			<h2>Your Cart</h2>
				<table class='table table-striped'>
					<tr>
						<th>Item</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>
					<form action='update_cart' method='post'>
<?php 			
// var_dump($products);
// var_dump($this->cart->contents());
			foreach ($products as $item) { ?>
					<tr>
						<td><?=$item['name']?></td>
						<td><?=$item['price']?></td>
						<td>
							<select name='qty'>
<?php 			if ($item['qty_in_stock'] < 10) { 
					for ($i=1; $i <= $item['qty_in_stock'] ; $i++) { ?>
								<option value='<?= $i?>' <?php echo ($i == $item['qty']? "selected" : '');?> ><?= $i?></option>
<?php				}
				}
				else { 
					for ($i=1; $i < 11; $i++) { ?>
								<option value='<?= $i?>'<?php echo ($i == $item['qty']? 'selected' : '');?> ><?= $i?></option>
<?php 				}
				}	?>
							</select>
							<input type='hidden' name='rowid' value='<?= $item['rowid']?>'>
							<input type='submit' href="/update_cart" value='update'><a href="/users/remove_from_cart/<?= $item['rowid']?>"><span class='glyphicon glyphicon-trash' aria-hidden='true'></a></span>
						</td>
						<td><?=$item['subtotal']?></td>
					</tr>
<?php 			
			} 
					// die();?>
					</form>
				</table>
				<div class='table_summary'>
					<p>Total: $<?=$this->session->userdata('cart_contents')['cart_total']?></p>
					<a class='btn btn-success' href="/">Continue Shopping</a>
				</div>
		</div>
	</div>
	<div class='row'>
		<form action='submit_order' method='post'>
		<div class='col-sm-4 shipping'>
			<h2>Shipping Information</h2>
			<p><label>First Name: </label>
			<input type='text' name='ship_first_name'></p>
			<p><label>Last Name: </label>
			<input type='text' name='ship_last_name'></p>
			<p><label>Address: </label>
			<input type='text' name='ship_address'></p>
			<p><label>Address 2: </label>
			<input type='text' name='ship_address2'></p>
			<p><label>City: </label>
			<input type='text' name='ship_city'></p>
			<p><label>State: </label>
			<input type='text' name='ship_state'></p>
			<p><label>Zip Code: </label>
			<input type='text' name='ship_zip'></p>
		</div>
		<div class='col-sm-4 billing'>
			<h2>Billing Information</h2>
			<p><input type='checkbox'> Billing same as Shipping</p>
			<p><label>First Name: </label>
			<input type='text' name='bill_first_name'></p>
			<p><label>Last Name: </label>
			<input type='text' name='bill_last_name'></p>
			<p><label>Address: </label>
			<input type='text' name='bill_address'></p>
			<p><label>Address 2: </label>
			<input type='text' name='bill_address2'></p>
			<p><label>City: </label>
			<input type='text' name='bill_city'></p>
			<p><label>State: </label>
			<input type='text' name='bill_state'></p>
			<p><label>Zip Code: </label>
			<input type='text' name='bill_zip'></p>
		</div>
		<div class='col-sm-2 credit_card'>
			<h2>Credit Card</h2>
			<p>
				<label>Type</label>
				<select>
					<option>Visa</option>
					<option>American Express</option>
					<option>Mastercard</option>
					<option>Discover</option>
				</select>
			</p>
			<p><label>Credit Card</label></p>
			<input type='text' placeholder='xxxx-xxxx-xxxx-xxxx'>
			<p>Expiration Date</p>
			<p><label>Month</label>
			<select>
				<option>01 - Jan</option>
				<option>02 - Feb</option>
				<option>03 - Mar</option>
				<option>04 - Apr</option>
				<option>05 - May</option>
				<option>06 - Jun</option>
				<option>07 - Jul</option>
				<option>08 - Aug</option>
				<option>09 - Sep</option>
				<option>10 - Oct</option>
				<option>11 - Nov</option>
				<option>12 - Dec</option>
			</select></p>	
			<p><label>Year</label>
			<select>
				<option>2014</option>
				<option>2015</option>
				<option>2016</option>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
				<option>2020</option>
			</select></p>
<?php 	foreach ($products as $product) { ?>
			<input type='hidden' name='<?= "product_".$product['id']."_id"?>' value='<?= $product['id']?>'>
			<input type='hidden' name='<?= "product_".$product['id']."_name"?>' value='<?= $product['name']?>'>
			<input type='hidden' name='<?= "product_".$product['id']."_size"?>' value='<?= $product['size']?>'>
			<input type='hidden' name='<?= "product_".$product['id']."_qty"?>' value='<?= $product['qty']?>'>
			<input type='hidden' name='<?= "product_".$product['id']."_qty_in_stock"?>' value='<?= $product['qty_in_stock']?>'>
			<input type='hidden' name='<?= "product_".$product['id']."_subtotal"?>' value='<?= $product['subtotal']?>'>
<?php	}	?>
			<input type='hidden' name='<?= "products_total"?>' value='<?= $this->session->userdata('cart_contents')['cart_total']?>'>
			<input class='btn btn-primary' type='submit' value='Submit Payment'>
			</form>
		</div>
	</div>
	<div class='row'>
	</div>
</div>
</body>
</html>