<?php include "includes/header.php"?>

<!-- Navigation -->
<?php include "includes/navigation.php"?>

  	
<!-- Main Admin Page Content -->
<div class="container-fluid">
	<h1 class="mt-4">Pending Posts</h1>

	<?php
	// Switch Statement that displays posts

	if (isset($_GET['source'])) {
		$source = $_GET['source'];
	} else{
		$source = '';
	}

	switch ($source) {

		case 'edit_post':
		include "includes/edit_post.php";
		break;
		
		default:
		include "includes/view_all_pending_posts.php";

		break;
	}

	?>

</div>
<!-- ./container-fluid -->
    
<!-- Footer -->
<?php include "includes/footer.php"?>