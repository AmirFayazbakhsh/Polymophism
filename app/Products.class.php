<?php
namespace App\Controller;
$filePath = realpath(dirname(__FILE__));
include_once $filePath . "/../database/db.php";

use App\Database\Dbh;

class Products {

	public $db;
	public $data;

	public function __construct() {
		$this->db = new Dbh;
	}

	public function ShowAllProducts() {
		$sql = "SELECT * FROM products";
		$res = $this->db->Select($sql);
		return $res;

	}

	public function getProductById($id) {

		$sql = "SELECT * FROM products WHERE id = ?";
		$res = $this->db->Select($sql, [$id]);
		return $res;
	}

}
?>