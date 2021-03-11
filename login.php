
<!-- DB Connection -->
<?php include "includes/db.php" ?>

<!-- header -->
<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php //include "includes/navigation.php" ?>

<!-- Login Content -->
<div class="login-body">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg login-card">
                <div class="card-header border-bottom-0 bg-white"><img src="img/lg-logo-color.png" class="img-fluid w-50 d-block m-auto pt-3"></div>
                <div class="card-body">
                    <form action="includes/login.php" method="post">
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
