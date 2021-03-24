
<!-- DB Connection -->
<?php include "includes/db.php" ?>

<?php session_start(); ?>

<!-- header -->
<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php //include "includes/navigation.php" ?>


<?php 

if(isset($_POST['login'])){
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  // Clean Form Data
  $user_email = mysqli_real_escape_string($connection, $user_email);
  $user_password = mysqli_real_escape_string($connection, $user_password);

  $query = "SELECT * FROM users WHERE user_email = '{$user_email}' ";
  $select_user_query = mysqli_query($connection, $query);

  if(!$select_user_query){
    die("failed" . mysqli_error($connection));
  }

  while ($row = mysqli_fetch_array($select_user_query)) {
    $db_id = $row['user_id'];
    $db_username = $row['username'];
    $db_user_email = $row['user_email'];
    $db_user_password = $row['user_password'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
  }

  // Get encrypted password for login
  $user_password = crypt($user_password, $db_user_password);

  // ******** Need to change these index re-routes ********

  if($user_email === $db_user_email && $user_password === $db_user_password){
    // set session
    $_SESSION['username'] = $db_username;
    $_SESSION['user_firstname'] = $db_user_firstname;
    $_SESSION['user_lastname'] = $db_user_lastname;
    $_SESSION['user_email'] = $db_user_email;
    $_SESSION['user_role'] = $db_user_role;

    header("Location: admin/");

  }else{
    header("Location: index.php");
  }
  
}

?>

<!-- Login Content -->
<div class="login-body">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg login-card">
                <div class="card-header border-bottom-0 bg-white"><img src="img/lg-logo-color.png" class="img-fluid w-50 d-block m-auto pt-3"></div>
                <div class="card-body">
                    
                    <!-- start login form -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="mb-1" for="email">Email</label>
                            <input class="form-control py-4" type="email" placeholder="Enter email address" name="user_email" />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="inputPassword">Password</label>
                            <input class="form-control py-4" type="password" placeholder="Enter password" name="user_password" />
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                <label class="custom-control-label" for="rememberPasswordCheck">Remember Me</label>
                            </div>
                        </div>
                        <!-- login btn -->
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            <button class="btn btn-primary btn-lg btn-block" href="#" name="login" type="submit">
                            Login
                            </button>
                        </div>
                    </form>
                    <!-- end form -->

                </div>
                <div class="card-footer border-top-0 bg-white text-center">
                    <div class="small"><a href="#">Forgot Password?</a></div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- Footer -->
<?php //include "includes/footer.php" ?>
