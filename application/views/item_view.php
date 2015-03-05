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
		<div class='col-sm-4 item_display'>
			<a href="/">Go Back</a>
			<h2><?= $name?></h2>
			<img src="">
			<img class='small' src="">
			<img class='small' src="">
			<img class='small' src="">
			<img class='small' src="">
		</div>
		<div class='col-sm-7 description'>
			<p><?= $description?></p>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-offset-8'>
			<form action='/add_to_cart' method='post'>
				<input type='hidden' name='id' value='<?= $id?>'>
				<input type='hidden' name='name' value='<?= $name?>'>
				<input type='hidden' name='item_price' value='<?= $item_price?>'>
				<input type='hidden' name='size' value='<?= $size?>'>
				<input type='hidden' name='qty_in_stock' value='<?= $qty_in_stock?>'>
				<select name='qty'>
<?php 			if ($qty_in_stock < 1) { ?>
					<option>Out of Stock</option>
<?php }			elseif ($qty_in_stock < 10) {
					for ($i=1; $i <= $qty_in_stock ; $i++) { ?>
						<option value='<?= $i?>'><?= $i?>  ($<?= $i * $item_price?>)</option>
<?php				}
				}
				else {
					for ($i=1; $i < 11; $i++) { ?>
						<option value='<?= $i?>'><?= $i?>  ($<?= $i * $item_price?>)</option>
<?php 				}
				}	?>
				</select>
				<input class='btn' type='submit' value='Buy'>
			</form>
		</div>
	</div>
	<div class='row'>
		<div class='item'><a href="show">Click Here</a></div>
		<div class='item'></div>
		<div class='item'></div>
		<div class='item'></div>
		<div class='item'></div>
		<div class='item'></div>
	</div>
</div>
</body>
</html>