<?php
include_once "config.php";
class Dbh {

	private $username = DB_USER;
	private $password = DB_PASS;

	public $conn;
	public $query;

	public function __construct() {

		return $this->connection();
	}

	public function connection() {

		try {

			$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
			$this->conn = new pdo($dsn, $this->username, $this->password);
			$this->conn->query("SET charachter set utf8");
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			return $this->conn;

		} catch (PDOException $e) {

			echo 'faild to connection' . $e->getMessage();

		}
	}

	public function Select($sql, $param = []) {
		if (empty($param)) {
			$res = $this->connection()->prepare($sql);
			$res->execute();
			$data = $res->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		} else {
			$res = $this->connection()->prepare($sql);
			$res->execute($param);
			$data = $res->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
	}

	public function Query($sql, $val = []) {

		if (empty($val)) {

			$this->query = $this->connection()->prepare($sql);
			return $this->query->execute();

		} else {

			$this->query = $this->connection()->prepare($sql);
			return $this->query->execute($val);

		}
	}

	public function Insert($sql, $val = []) {

		if (empty($val)) {

			$res = $this->connection()->prepare($sql);
			return $res->execute();

		} else {

			$res = $this->connection()->prepare($sql);
			return $res->execute($val);

		}
	}

}

?>