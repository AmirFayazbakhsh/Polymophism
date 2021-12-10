
<!DOCTYPE html>
</html>
  <head>
  	<title>payment</title>
  <?php include_once "inc/header.php";?>
  </head>
<body>
<?php
include_once "inc/navbar.php";
include_once "app/buyProduct.class.php";
include_once "app/paymentInterface.php";
include_once "app/Products.class.php";
// include_once "inc/autoload.php";

use App\Controller\Products;

$products = new Products;
if (!isset($_GET["proId"])) {
	header("location:products.php");
}
$products = $products->getProductById($_GET["proId"]);

if (isset($_POST['payBtn'])) {
	$paymentType = $_POST['PaymentType'];
	$ObjPaymentType = new $paymentType;
	$buyProduct = new buyProduct();
	$buyProduct->pay($ObjPaymentType);
}
?>

	<div class="row container">

		<div class="col-6 text-center">
			<div class="text-center mt-5">
					<h3 class="p-3">choose your payment Type</h3>
			</div>
			<form method="post" action="">
				<div class="form-check p-3">
				  <input class="form-check-input" value="Cash" type="radio" name="PaymentType" id="exampleRadios1"  checked>
				  <label class="form-check-label" for="exampleRadios1">
				    Cash
				  </label>
				</div>
				<div class="form-check p-3">
				  <input class="form-check-input" value="IDpay" type="radio" name="PaymentType" id="exampleRadios2">
				  <label class="form-check-label" for="exampleRadios2">
				    IDpay
				  </label>
				</div>
				<div class="form-check p-3">
				  <input class="form-check-input" value="ZarinPall" type="radio" name="PaymentType" id="exampleRadios3">
				  <label class="form-check-label" for="exampleRadios3">
				    ZarinPall
				  </label>
				</div>
				<input type="submit" class="btn btn-dark mt-3" name="payBtn" value="Pay Now">
			</form>
	</div>
	<div class="col-6 text-center">
			<div class="text-center mt-5">
					<h3 class="p-3">Receipt</h3>
			</div>



			<table class="table">
						<thead>
							<tr>
								<th>name</th>
								<th>cash</th>
								<th>description</th>
							</tr>
						</thead>
				  <tbody>

					<?php foreach ($products as $row) {?>
						<tr>
							<th style="direction: rtl;"><?=$row["name"];?></th>
							<th style="direction: rtl;"><?=$row["cash"];?></th>
							<th style="direction: rtl;"><?=$row["description"];?></th>
						</tr>
						<?php }?>

				  </tbody>
		</table>
	</div>

	</div>
</body>
</html>