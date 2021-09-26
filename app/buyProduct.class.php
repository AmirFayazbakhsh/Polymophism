<?php
include_once "paymentInterface.php";
/////////////////////////////////////

class buyProduct {

	public function Pay(paymentInterface $ObjPaymentType) {

		$ObjPaymentType->paymentProcess();
	}
}

?>