<!-- As a link -->
<?php
session_start();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
	session_destroy();
	header('location:login.php');
}
?>

<nav class="navbar navbar-light bg-light">
	<?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {?>
  <a class="" href="?action=logout">Logout</a>
  <a class="" href="#"><?php echo $_SESSION["userEmail"]; ?></a>
	<?php } else {?>
  <a class="" href="login.php">Login</a>
  <a class="" href="register.php">Register</a>
	<?php }?>
</nav>