<?php

interface paymentInterface {

	public function payNow();
}

interface loginInterface {

	public function loginFirst();
}

// pay with cash
class Cash implements paymentInterface {

	public function payNow() {echo "pay cash";}

	public function paymentProcess() {

		$this->payNow();
	}
}

//pay with IDpay seystem
class IDpay implements paymentInterface, loginInterface {
	public function payNow() {echo "pay IDpay";}
	public function loginFirst() {
		header("location:login.php");
	}

	public function paymentProcess() {

		if (!isset($_SESSION["userId"])) {
			$this->loginFirst();
		}
		$this->payNow();

	}
}

//pay with ZarinPall seystem
class ZarinPall implements paymentInterface, loginInterface {

	public function payNow() {echo "pay ZarinPall";}
	public function loginFirst() {
		header("location:login.php");
	}

	public function paymentProcess() {

		if (!isset($_SESSION['userId'])) {
			$this->loginFirst();
		}
		$this->payNow();

	}

}

?>