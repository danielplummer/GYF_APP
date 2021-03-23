<style>
  /* hide add post btn */
  .add-user-btn{
    display: none;
  }
</style>



<?php

if (isset($_GET['edit_user'])) {
  $the_user_id = $_GET['edit_user'];

  // Display all users
  $query = "SELECT * FROM users WHERE user_id = $the_user_id";
  $select_users_query = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
  }

}



// Edit User
if (isset($_POST['edit_user'])) {
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $username = $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $user_role = $_POST['user_role'];


  // Get encrypted password
  $query = "SELECT randSalt FROM users";
  $select_randsalt_query = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($select_randsalt_query);
  $salt = $row['randSalt'];
  $hashed_password = crypt($user_password, $salt);



  // Edit User Query
  $query = "UPDATE users SET ";
  $query .="user_firstname = '{$user_firstname}', ";
  $query .="user_lastname = '{$user_lastname}', ";
  $query .="username = '{$username}', ";
  $query .="user_email = '{$user_email}', ";
  $query .="user_password = '{$hashed_password}', ";
  $query .="user_role = '{$user_role}' ";
  $query .= "WHERE user_id = {$the_user_id} ";

  $edit_user_query = mysqli_query($connection,$query);
  header("Location: users.php");

  /* check for error
  if(!$edit_user_query){
    die("QUERY FAILED" . mysqli_error($connection));
  }
  */

}

?>

<p>Edit user page</p>

<div class="col-lg-6 mt-3">
  
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input type="text" class="form-control" value="<?php echo $user_firstname ?>" name="user_firstname">
    </div>

    <div class="form-group">
      <label for="lastname">Last Name</label>
      <input type="text" class="form-control" value="<?php echo $user_lastname ?>" name="user_lastname">
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" value="<?php echo $username ?>" name="username">
    </div>

    <div class="form-group">
      <label for="tags">Email</label>
      <input type="email" class="form-control" value="<?php echo $user_email ?>" name="user_email">
    </div>

    <div class="form-group">
      <label for="tags">Password</label>
      <input type="password" class="form-control" value="<?php echo $user_password ?>" name="user_password">
    </div>

    <div class="form-group w-50">
      <label for="role">User Role</label>
      <select type="text" class="form-control" name="user_role">
        <option value="admin"><?php echo $user_role ?></option>
        <?php
          if ($user_role == 'admin') {
            echo "<option value='peasant'>Peasant</option>";
          }else{
            echo "<option value='admin'>Admin</option>";
          }
        ?>
      </select>
    </div>

    <!-- submit btn -->
    <button type="submit" name="edit_user" class="btn btn-lg btn-primary mt-3">Update User</button>

  </form>

</div>