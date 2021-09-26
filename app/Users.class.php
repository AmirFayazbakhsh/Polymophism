<?php
session_start();

$filePath = realpath(dirname(__FILE__));
include_once $filePath . "/../database/db.php";

class Users {

	public $query;
	public $errormsg;
	public $infomsg;
	public $username;
	public $password;
	public $email;
	public $age;
	public $db;
	public $res;

	public function __construct() {

		$this->db = new Dbh;

	}

	public function RowsCount() {

		return $this->db->query->rowCount();
	}

	public function fetchUser() {

		return $this->db->query->fetch(PDO::FETCH_ASSOC);
	}

	public function Resgister($post) {

		$username = $post['username'];
		$password = $post['password'];
		$email = $post['email'];
		$confirm = $post['confirmPassword'];

		if (empty($post['username']) || empty($post['password']) || empty($post['confirmPassword']) || empty($post['email'])) {

			return $this->errormsg .= "input are empty";

		}

		$sql = "SELECT * FROM `users` WHERE email  = ?";

		if ($this->db->Query($sql, [$email])) {

			if ($this->RowsCount() > 0) {
				$this->errormsg .= "!!شرمنده این ایمیل قبلا استفاده شده <br>";
				return $this->errormsg;

			}
		}

		if (strlen($password) < 5) {

			$this->errormsg .= "!! این پسورد خیلی ضعیفه<br>";
			return $this->errormsg;

		}

		//confirm password validation

		if ($password != $confirm) {

			$this->errormsg .= "!!پسورد ها یکسان نیستند <br>";
			return $this->errormsg;

		}

		if ($this->errormsg == "") {
			$password_hash = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES (NULL, ? , ? , ?);";
			$res = $this->db->Insert($sql, [$username, $email, $password_hash]);

			header('location:login.php');
			return $this->infomsg = "اطلاعات با موفقیت ثبت شد  برای  ورود ";

		} else {

			return $this->errormsg .= "مشکل در آپلود فایلک";

		}

	}

	public function loginUser($post) {

		$email = $post['email'];
		$password = $post['password'];
		if (empty($email) || empty($password)) {

			$this->errormsg .= "inputs are empty";
		}

		$sql = "SELECT * FROM `users` WHERE email = ?";
		$data = $this->db->Query($sql, [$email]);
		if ($this->RowsCount() > 0) {

			$row = $this->fetchUser();
			$password_hash = $row['password'];

			if (password_verify($password, $password_hash)) {

				$this->infomsg .= "login successfuly";
				$_SESSION['userLogin'] = true;
				$_SESSION['userEmail'] = $email;
				$_SESSION['userId'] = $row['id'];
				header("location:products.php");

			} else {

				$this->errormsg .= "email or password is wrong";

			}

		}

	}
}

?>