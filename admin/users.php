<!-- Header -->
<?php include "includes/header.php"?>

<!-- Navigation -->
<?php include "includes/navigation.php"?>

  	
<!-- Main Admin Page Content -->
<div class="container-fluid">
	<h1 class="mt-4">All Users</h1>
	<a href="users.php?source=add_user" class="btn btn-outline-primary add-user-btn my-4">Add User +</a>

	<?php
	// Switch Statement that displays posts

	if (isset($_GET['source'])) {
		$source = $_GET['source'];
	} else{
		$source = '';
	}

	switch ($source) {
		
		case 'add_user':
		include "includes/add_user.php";
		break;

		case 'edit_user':
		include "includes/edit_user.php";
		break;
		
		default:
		include "includes/view_all_users.php";

		break;
	}

	?>

</div>
<!-- ./container-fluid -->
    
<!-- Footer -->
<?php include "includes/footer.php"?>