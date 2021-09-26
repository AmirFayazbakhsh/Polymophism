<!DOCTYPE html>
<html>
<head>
  <?php include_once "inc/header.php";?>
	<?php include_once "app/Users.class.php";?>
	<title>register USER</title>
</head>

<?php
$users = new Users;
if (isset($_POST['btn-signUp'])) {$res = $users->Resgister($_POST);}
if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) {
	header("location:products.php");
}
?>

<body>
  <div class="center text-center d-flex justify-content-center">


    <div class="center-box  mt-5 pt-5">
                <?php if (isset($users->infomsg)) {?>
          <div class="alert alert-success text-center"><?php echo $users->infomsg; ?></div>
          <?php }?>

         <?php if (isset($users->errormsg)) {?>
          <div class="alert alert-danger text-center"><?php echo $users->errormsg; ?></div>
          <?php }?>
    <h2 class="text-center mb-5">Sign Up</h2>

      <form method="post" action="">

        <div class="form-group">

          <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
        </div>

        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Enter password" required>
        </div>


        <div class="form-group">
          <input type="password" class="form-control" name="confirmPassword" placeholder="Enter confirm password" required>
        </div>

        <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
        </div>

        <input type="submit" name="btn-signUp" class=" mt-2 btn" value="Next">
         <p class="text-center">if you already have an account <a href="login.php" title="register">log in</a>
      </form>

     </p>
    </div>
  </div>

</body>
</html>