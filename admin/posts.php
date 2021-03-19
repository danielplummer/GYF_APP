<!-- Header -->
<?php include "includes/header.php"?>

<!-- Navigation -->
<?php include "includes/navigation.php"?>

  	
<!-- Main Admin Page Content -->
<div class="container-fluid">
	<h1 class="mt-4">All Posts</h1>
	<a href="posts.php?source=add_post" class="btn btn-outline-primary add-post-btn my-4">Add Post +</a>

	<?php
	// Switch Statement that displays posts - views can be found in includes folder

	if (isset($_GET['source'])) {
		$source = $_GET['source'];
	} else{
		$source = '';
	}

	switch ($source) {
		
		case 'add_post':
		include "includes/add_post.php";
		break;

		case 'edit_post':
		include "includes/edit_post.php";
		break;
		
		default:
		include "includes/view_all_posts.php";

		break;
	}

	?>

</div>
<!-- ./container-fluid -->
    
<!-- Footer -->
<?php include "includes/footer.php"?>