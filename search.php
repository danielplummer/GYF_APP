<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>


<!-- Navigation -->
<?php include "includes/navigation.php" ?>
<?php include "includes/functions.php" ?>

<!-- page Content -->
<section class="bg-grey mb-5">
  <div class="container text-center py-5">
      <h1 class="pb-3">Share Your Feedback & Recommend New Additions</h1>
      <p class="lead text-muted">Have a great idea for something we can add to improve your Grow Young Fitness membership? Click the button to submit your idea.</p>
      <button class="btn btn-success btn-lg mb-3 font-weight-bold" data-toggle="modal" data-target="#postModal"><i class="fas fa-plus"></i> Submit Your Idea</button>
      <p class="lead text-muted">or search for other peoples ideas.</p>
      <!-- Search Bar -->
      <div class="col-md-8 offset-md-2">
          <form action="search.php" method="post">
              <div class="input-group my-4">
                <input type="text" name="search" class="form-control" placeholder="Search for...">
                <span class="input-group-append">
                  <button class="btn btn-primary search-btn" name="submit" type="submit">Go!</button>
                </span>
              </div>
          </form>
      </div>
  </div>
</section>


<!-- feature request cards -->
<section class="mb-5">
    <div class="container">
    <h5 class="text-muted pb-3">Search results:</h5>



          <?php

          // Search Posts
          if (isset($_POST['submit'])) {
            
            $search = $_POST['search'];
            $search = mysqli_real_escape_string($connection, $search);

            $query = "SELECT * FROM posts WHERE post_status = 'published' AND post_content LIKE '%$search%' ";
            $search_query = mysqli_query($connection, $query);

            if (!$search_query) {
              die("Query failed" . mysqli_error($connection));
            }

            $count = mysqli_num_rows($search_query);

            if ($count == 0) {
              echo "<h3>no results for $search try somethin else.</h3>";
            }else{

              while($row = mysqli_fetch_array($search_query)){
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_status_badge = $row['post_status_badge'];
                  $post_content = $row['post_content'];
                  $post_comment_count = $row['post_comment_count'];
                  $likes = $row['likes'];
                  ?>

              <!-- Card content -->
              <div class="card shadow-sm mb-4">
                <div class="row no-gutters bg-light">
                  <div class="col-md-2 align-self-center text-center">
                      <div class="py-3">
                        <h2 class="p-2"><?php echo $likes ?> votes</h2>
                        <!--
                        <button type="button" class="btn btn-outline-success"><i class="far fa-thumbs-up"></i> Vote</button>
                        -->
                    </div>
                  </div>
                  <div class="col-md-10">
                    <div class="card-body bg-white">
                      <h5 class="card-title"><?php echo $post_title ?></h5>
                      <!-- descritpion -->
                      <p class="card-text text-muted"><?php echo $post_content ?></p>
                      <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary btn-sm">Keep Reading <span aria-hidden="true">&raquo;</span></a>
                      <!-- info -->
                      
                      <p class="card-text pt-3">
                          <a href="post.php?p_id=<?php echo $post_id; ?>"><small><?php echo $post_comment_count ?> Comments</small></a> | 
                          <small class="text-muted"><?php echo time_elapsed_string($post_date); ?> by <?php echo $post_author ?>.</small>  
                          <span class="badge badge-warning float-right"><?php echo $post_status_badge ?></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /card content -->

              <?php
              }
          
            }

          }

          ?>




    </div>
</section>


<!-- Pagination
<section class="my-5">
    <div class="container">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </div>
</section>
-->

<!-- Footer -->
<?php include "includes/footer.php" ?>
