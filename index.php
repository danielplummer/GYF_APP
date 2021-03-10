
<!-- DB Connection -->
<?php include "includes/db.php" ?>

<!-- header -->
<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Homepage Content -->
<div class="container text-center py-5">
    <h1 class="">Suggestions For Grow Young Fitness</h1>
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


<!-- feature request cards -->
<section>
    <div class="container">

        <?php

        $query = "SELECT * FROM posts WHERE post_status = 'published'";
        $select_all_posts_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_all_posts_query)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_status_badge = $row['post_status_badge'];
            // Limit content lenght on homepage
            $post_content = substr($row['post_content'], 0,200);
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];

            if($post_status !== 'published'){
              // this code is further down the page
            }else{
        ?>
        
        <!-- Card content -->
        <div class="card shadow-sm mb-4">
          <div class="row no-gutters bg-light">
            <div class="col-md-2 align-self-center text-center">
                <div class="py-3">
                  <h2 class="p-2">12 votes</h2>
                  <button type="button" class="btn btn-outline-success"><i class="far fa-thumbs-up"></i> Vote</button>
              </div>
            </div>
            <div class="col-md-10">
              <div class="card-body bg-white">
                <h5 class="card-title"><?php echo $post_title ?></h5>
                <!-- descritpion -->
                <p class="card-text text-muted"><?php echo $post_content ?></p>
                <!-- link to post -->
                <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary btn-sm">Keep Reading <span aria-hidden="true">&raquo;</span></a>
                <!-- info -->
                
                <p class="card-text pt-3">
                    <!-- comment count -->
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><small><?php echo $post_comment_count ?> Comments</small></a> | 
                    <small class="text-muted">Suggested on <?php echo $post_date ?> by <?php echo $post_author ?>.</small> 
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

        // If there are no posts set to publish this will display
        if(mysqli_num_rows($select_all_posts_query) == 0){
          echo "There are no posts!";
          }

        ?>


    </div>
</section>


<!-- Pagination -->
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

<!-- Footer -->
<?php include "includes/footer.php" ?>
