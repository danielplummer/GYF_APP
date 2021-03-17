<!-- Header -->
<?php include "includes/header.php"?>

<!-- Navigation -->
<?php include "includes/navigation.php"?>

  	
<!-- Main Admin Page Content -->
<section id="widgets">
	<div class="container-fluid">
		<h1 class="my-5">Main Dashboard</h1>

		<div class="row">
		    
		    <!-- Posts -->
		    <?php
		    // Get number of posts from db
		    $query = "SELECT * FROM posts";
		    $select_all_posts = mysqli_query($connection, $query);
		    $posts_count = mysqli_num_rows($select_all_posts)
		    ?>

		    <div class="col-md-4">
		        <div class="card bg-primary text-white mb-4">
		            <div class="card-body d-flex align-items-center justify-content-between">
		            	<h4><i class="fas fa-sticky-note"></i> Posts</h4>
		            	<h4><?php echo $posts_count ?></h4>
		        	</div>
		            <div class="card-footer d-flex align-items-center justify-content-between">
		                <a class="small text-white stretched-link" href="posts.php">View All Posts</a>
		                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
		            </div>
		        </div>
		    </div>
		    
		    <!-- Comments -->
		    <?php
		    // Get number of all comments from db
		    $query = "SELECT * FROM comments";
		    $select_all_comments = mysqli_query($connection, $query);
		    $comment_count = mysqli_num_rows($select_all_comments)
		    ?>
		    <div class="col-md-4">
		        <div class="card bg-success text-white mb-4">
		            <div class="card-body d-flex align-items-center justify-content-between">
		            	<h4><i class="fas fa-comment-dots"></i> Comments</h4>
		            	<h4><?php echo $comment_count ?></h4>
		        	</div>
		            <div class="card-footer d-flex align-items-center justify-content-between">
		                <a class="small text-white stretched-link" href="comments.php">View All Comments</a>
		                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
		            </div>
		        </div>
		    </div>
		    
		    <!-- users -->
		    <?php
		    // Get number of all users from db
		    $query = "SELECT * FROM users";
		    $select_all_users = mysqli_query($connection, $query);
		    $user_count = mysqli_num_rows($select_all_users)
		    ?>
		    <div class="col-md-4">
		        <div class="card bg-danger text-white mb-4">
		            <div class="card-body d-flex align-items-center justify-content-between">
		            	<h4><i class="fas fa-user"></i> Users</h4>
		            	<h4><?php echo $user_count ?></h4>
		        	</div>
		            <div class="card-footer d-flex align-items-center justify-content-between">
		                <a class="small text-white stretched-link" href="users.php">View All Users</a>
		                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
		            </div>
		        </div>
		    </div>

		</div>
	<!--/container -->
	</div>
</section>


<section class="my-5">
	<div class="container-fluid">
		
		<script type="text/javascript">
		  google.charts.load('current', {'packages':['bar']});
		  google.charts.setOnLoadCallback(drawChart);

		  function drawChart() {
		    var data = google.visualization.arrayToDataTable([
		      ['Erase Me', 'Total', 'Published', 'Unpublished'],
		      ['Posts', 1000, 400, 200],
		      ['Comments', 1170, 460, 250]
		    ]);

		    var options = {
		      chart: {
		        title: 'This is not finished',
		        subtitle: 'Need to enter dynamic data',
		      }
		    };

		    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

		    chart.draw(data, google.charts.Bar.convertOptions(options));
		  }
		</script>
		<!-- display chart -->
    	<div id="columnchart_material" style="width: auto; height: 500px;"></div>
	</div>
</section>




<!-- Footer -->
<?php include "includes/footer.php"?>