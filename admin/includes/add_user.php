<style>
  /* hide add post btn */
  .add-user-btn{
    display: none;
  }
</style>


<?php

// Create User
if (isset($_POST['create_user'])) {
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $username = $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $user_role = $_POST['user_role'];

  // Clean Form Data
  $username = mysqli_real_escape_string($connection, $username);
  $user_email = mysqli_real_escape_string($connection, $user_email);
  $user_password = mysqli_real_escape_string($connection, $user_password);


  $query = "SELECT randSalt FROM users";
  $select_randsalt_query = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($select_randsalt_query);
  $salt = $row['randSalt'];
  $user_password = crypt($user_password, $salt);
  


  // Add user query
  $query = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_password, user_role) ";

  $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$username}', '{$user_email}', '{$user_password}', '{$user_role}') ";

  $create_user_query = mysqli_query($connection, $query);
  
  // reload page after Submit
  // header("Location: users.php");

  // show success message
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  User Added Succesfully! <a href="users.php" class="alert-link">View All Users</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

  /* check for error */
  if(!$create_user_query){
    die("QUERY FAILED" . mysqli_error($connection));
  }

}

?>

<p>add user page</p>


<div class="col-lg-6 mt-3">
  
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
      <label for="lastname">Last Name</label>
      <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
      <label for="tags">Email</label>
      <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
      <label for="tags">Password</label>
      <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group w-50">
      <label for="role">User Role</label>
      <select type="text" class="form-control" name="user_role">
        <option value="admin">Select User Role</option>
        <option value="admin">Admin</option>
        <option value="peasant">Peasant</option>
      </select>
    </div>

    <!-- submit btn -->
    <button type="submit" name="create_user" class="btn btn-lg btn-primary mt-3">Add User</button>

  </form>

</div>