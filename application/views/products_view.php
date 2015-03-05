<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to TKM!</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<script>
		$(document).ready(function(){
			// alert("1");
			$('div.item').mouseover(function(){
				// $(this).toggleClass('active')}
				// // function(){$(this).fadeIn(500)
				// 	// .toggleClass('active')
					

			});

		});
	</script>
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
				<a class='btn' href="cart"><h4 class='active'><span class='label label-primary'>Shopping Cart 
				<span class='label label-success label-as-badge'><?= $this->session->userdata('cart_contents')['total_items']?></span></span></h4></a>
			</li>
		</ul>
	</div>
</nav>
<div class="container">
	<div class='row'>
		<div class='col-sm-2 product_nav'>
			<form action='' method='post'>
				<input class='search' type='text' placeholder='search'>
				<button class='btn btn-default' type='submit'>
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</button>
			</form>
			<ul>
				<li style='font-weight:bold'>Categories</li>
				<li><ul>
						<li><a href="/sort/2/11" value='tents'>Tents</a></li>
						<li><a href="/sort/5/11">Backpacks</a></li>
						<li><a href="/sort/3/11">Sleeping Bags</a></li>
						<li><a href="/sort/1/11">Clothing</a></li>
						<ul>
							<li><a href="/sort/1/">Jackets</a></li>
							<li><a href="/sort/1/">Pants</a></li>
							<li><a href="/sort/1/">Shirts</a></li>
							<li><a href="/sort/1/">Shoes</a></li>
						</ul>
						<li><a href="/sort/4/11">Accessories</a></li>
						<ul>
							<li><a href="/sort//">Headlamps</a></li>
							<li><a href="/sort//">Stoves</a></li>
							<li><a href="/sort//">Cookware</a></li>
							<li><a href="/sort//">Comforts</a></li>
						</ul>
				</ul></li>
			</ul>
		</div>
		<div class='col-sm-8 product_display'>
			<div class='body'>
				<div class='row body_header'>
<?php 			
echo (($this->session->userdata('category') != "all_products") ? (empty($results[0]['category']) ? "<h2>No items to display</h2>": "<h2>".$results[0]['category']."</h2>") : "<h2>All products</h2>")  ?>
					<ul class='pagination'>
						<li><a href=""><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a></li>
						<li><a href="">1</a></li>
						<li><a href=""><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>
					</ul>
				</div>
				<div class='row content'>
<?php 			foreach ($results as $result) { ?>
					<a href="/show_item/<?= $result['id']?>">
						<div class='item'>
							<img src="" alt='<?= $result['id']?>'>
							<div class='price'>
								<p><?= $result['item_price']?></p>
							</div>
							<p><?= $result['name']?></p>
						</div>
					</a>
<?php 			} ?>
				</div>
			</div>
			<nav>
				<ul class='pagination'>
					<li><a href=""><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a></li>
					<li class='active'><a href="">1</a></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">4</a></li>
					<li><a href="">5</a></li>
					<li><a href="">6</a></li>
					<li><a href=""><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class='row'></div>
</div>
</body>
</html>