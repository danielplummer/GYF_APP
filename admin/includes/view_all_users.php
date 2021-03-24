<?php
  // Must be at top of this file for header() to work

  // ========== Change user role to Admin ==========
  if(isset($_GET['change_to_admin'])){
    $the_user_id = $_GET['change_to_admin'];

    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
    $change_to_admin_query = mysqli_query($connection, $query);
    // reload page after click
    header("Location: users.php");
  }


  // ========== Change user role to Peasant ==========
  if(isset($_GET['change_to_peasant'])){
    $the_user_id = $_GET['change_to_peasant'];

    $query = "UPDATE users SET user_role = 'peasant' WHERE user_id = $the_user_id";
    $change_to_peasant_query = mysqli_query($connection, $query);
    // reload page after click
    header("Location: users.php");
  }

  // ========== Delete User ==========
  if(isset($_GET['delete'])){

    if(isset($_SESSION['user_role'])){

      if($_SESSION['user_role'] == 'admin'){


        $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);

        $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
        $delete_user_query = mysqli_query($connection, $query);
        // reload page after delete
        header("Location: users.php");

      }
    }
  }

?>


<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Change Role</th>
      <th scope="col">Change Role</th>
    </tr>
  </thead>
  <tbody>
    
    <?php

    // Display all users
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_users)) {
    	$user_id = $row['user_id'];
    	$username = $row['username'];
    	$user_password = $row['user_password'];
    	$user_firstname = $row['user_firstname'];
    	$user_lastname = $row['user_lastname'];
    	$user_email = $row['user_email'];
     	$user_role = $row['user_role'];

     	echo "<tr>";
	     	echo "<td>$user_id</td>";
	     	echo "<td>$username</td>";
	     	echo "<td>$user_firstname</td>";
	     	echo "<td>$user_lastname</td>";
	     	echo "<td>$user_email</td>";
        echo "<td>$user_role</td>";

        echo "<td><a href='users.php?change_to_admin={$user_id}'>Set role to Admin</a></td>";
        echo "<td><a href='users.php?change_to_peasant={$user_id}'>Set role to Peasant</a></td>";
        echo "<td class='text-center'><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
        echo "<td class='text-center'><a href='users.php?delete={$user_id}' class='text-danger'>Delete</a></td>";
     	echo "</tr>";

    }
    ?>


    <?php

    

    ?>
  
  </tbody>
</table>