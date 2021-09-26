
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN USER</title>
    <?php include_once "inc/header.php";?>
  <?php include_once "app/Users.class.php";?>
</head>

<?php
$users = new Users;
if (isset($_POST["btn-login"])) {$users->loginUser($_POST);}
if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
	header("location:products.php");
}

?>

<body>
  <div class="center text-center d-flex justify-content-center">
    <div class="center-box mt-5 pt-5">
          <?php if (isset($users->infomsg)) {?>
          <div class="alert alert-success text-center"><?php echo $users->infomsg; ?></div>
          <?php }?>

         <?php if (isset($users->errormsg)) {?>
          <div class="alert alert-danger text-center"><?php echo $users->errormsg; ?></div>
          <?php }?>
    <h2 class="text-center mb-5">Sign in</h2>

      <form method="post" action="">

        <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Enter password" required>
        </div>
        <input type="submit" name="btn-login" class=" mt-2 btn" value="Login">
        <p class="text-center">if you dont have account click <a href="register.php" title="register">Sign Up</a></p>
      </form>
      <div class="center">
        <a href="products.php">Home</a>
      </div>


    </div>
  </div>

</body>
</html>