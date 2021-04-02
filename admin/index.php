<?php include "includes/header.php"?>

<!-- Navigation -->
<?php include "includes/navigation.php"?>


<section class="pt-5">
	<div class="container text-center">
		<h1>Main Dashboard <i class="fas fa-tachometer-alt"></i></h1>
	</div>
</section>



<!-- Posts Section -->
<section class="mt-5">
	<div class="container">
		<h4 class="pb-2">Manage Posts</h4>
		<div class="row">
		    <?php
		    // Get number of draft posts from db
		    $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
		    $select_draft_posts = mysqli_query($connection, $query);
		    $draft_post_count = mysqli_num_rows($select_draft_posts)
		    ?>
		    <div class="col-md-6">
		        <div class="card mb-4 bg-primary text-white shadow-lg">
		            <div class="card-body d-flex align-items-center justify-content-between">
		            	<h4><i class="fas fa-sticky-note"></i> Pending Posts</h4>
		            	<h1><?php echo $draft_post_count ?></h1>
		        	</div>
		            <div class="card-footer d-flex align-items-center justify-content-between">
		                <a class="small text-white stretched-link" href="pending-posts.php">Manage Pending Posts</a>
		                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
		            </div>
		        </div>
		    </div>

		    <?php
		    // Get number of published posts from db
		    $query = "SELECT * FROM posts WHERE post_status = 'published' ";
		    $select_all_posts = mysqli_query($connection, $query);
		    $posts_count = mysqli_num_rows($select_all_posts)
		    ?>

		    <div class="col-md-6">
		        <div class="card mb-4 shadow-lg">
		            <div class="card-body d-flex align-items-center justify-content-between">
		            	<h4><i class="fas fa-sticky-note text-primary"></i> Published Posts</h4>
		            	<h1><?php echo $posts_count ?></h1>
		        	</div>
		            <div class="card-footer bg-primary d-flex align-items-center justify-content-between">
		                <a class="small text-white stretched-link" href="posts.php">View All Posts</a>
		                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
		            </div>
		        </div>
		    </div>

		</div>
	</div>
</section>


<!-- Comments Section -->
<section class="my-5">
	<div class="container">
		<h4 class="pb-2">Manage Comments</h4>
		<div class="row">
		    <?php
		    // Get number of pending comments from db
		    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
		    $select_pending_comments = mysqli_query($connection, $query);
		    $pending_comment_count = mysqli_num_rows($select_pending_comments)
		    ?>
		    <div class="col-md-6">
		        <div class="card shadow-lg mb-4">
		            <div class="card-body text-white bg-success d-flex align-items-center justify-content-between">
		            	<h4><i class="fas fa-comment-dots"></i> Pending Comments</h4>
		            	<h1><?php echo $pending_comment_count ?></h1>
		        	</div>
		            <div class="card-footer bg-success d-flex align-items-center justify-content-between">
		                <a class="small text-white stretched-link" href="pending-comments.php">Manage Pending Comments</a>
		                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
		            </div>
		        </div>
		    </div>

		    <?php
		    // Get number of all published comments from db
		    $query = "SELECT * FROM comments WHERE comment_status = 'approved'";
		    $select_all_comments = mysqli_query($connection, $query);
		    $comment_count = mysqli_num_rows($select_all_comments)
		    ?>
		    <div class="col-md-6">
		        <div class="card shadow-lg mb-4">
		            <div class="card-body d-flex align-items-center justify-content-between">
		            	<h4><i class="fas fa-comment-dots text-success"></i> Published Comments</h4>
		            	<h1><?php echo $comment_count ?></h1>
		        	</div>
		            <div class="card-footer bg-success d-flex align-items-center justify-content-between">
		                <a class="small text-white stretched-link" href="comments.php">View All Comments</a>
		                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
		            </div>
		        </div>
		    </div>

		</div>
	</div>
</section>



<!-- Footer -->
<?php include "includes/footer.php"?>