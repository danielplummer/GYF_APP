<!-- Header -->
<?php include "includes/header.php"?>

<!-- Navigation -->
<?php include "includes/navigation.php"?>

  	
<!-- Main Admin Page Content -->
<div class="container-fluid">
	<h1 class="mt-4">All Posts</h1>

	<?php

	if (isset($_GET['source'])) {
		$source = $_GET['source'];
	} else{
		$source = '';
	}

	switch ($source) {
		
		case 'add_post':
		include "includes/add_post.php";
		break;

		case '100':
		echo "Nice 100";
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