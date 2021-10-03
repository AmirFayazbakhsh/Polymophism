<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Products</title>
	<?php include_once "inc/header.php";?>
	<?php use App\Controller\Products;?>
</head>
<body>
<?php
include_once "inc/navbar.php";
include_once "app/Products.class.php";
$products = new Products;
$data = $products->ShowAllProducts();
?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<h3 class="p-3 text-center">Choose your Product</h3>
		</div>
	</div>
	<div class="row ">
		<?php foreach ($data as $row) {?>
		<div class="col-md-3">
			<div class="card text-center p-2" style="width: 18rem;">
				<img class="card-img-top" src="https://www.incimages.com/uploaded_files/image/1920x1080/getty_655998316_2000149920009280219_363765.jpg" alt="Card image cap">
				<div class="card-body">
				    <h5 class="card-title"><?=$row['name'];?></h5>
				    <p class="card-text"><?=$row['description']?></p>
				    <p class="card-text"><?=$row['cash']?></p>
				    <?php $productId = $row['id'];?>
				    <a href="payment.php?proId=<?=$productId?>">Buy Now</a>
			  	</div>
			</div>
		</div>
		<?php }?>
	</div>
</div>
</body>
</html>