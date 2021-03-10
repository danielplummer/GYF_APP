
<!-- DB Connection -->
<?php include "includes/db.php" ?>

<!-- header -->
<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
  <div class="container">
    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <?php
        
        if (isset($_GET['p_id'])) {
          $the_post_id = $_GET['p_id'];
        }

        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
        $select_all_posts_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_all_posts_query)){
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_status_badge = $row['post_status_badge'];
            $post_content = $row['post_content'];
            $post_comment_count = $row['post_comment_count'];

        ?>

        <!-- post title -->
        <h1 class="mt-4"><?php echo $post_title ?></h1>
        
        <!-- post author/date -->
        <p class="text-muted">Posted by: <?php echo $post_author ?> on <?php echo $post_date ?> </p>

        <hr>

        <!-- Post Content -->
        <p class="lead py-2"><?php echo $post_content ?></p>


        <?php
        // Insert comment query
        if(isset($_POST['create_comment'])){
          $the_post_id = $_GET['p_id'];

          $comment_author = $_POST['comment_author'];
          $comment_email = $_POST['comment_email'];
          $comment_content = $_POST['comment_content'];

          $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";

          $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

          $create_comment_query = mysqli_query($connection, $query);

          if(!$create_comment_query){
            die('query failed' . mysqli_error($connection));
          }


          // Increment post comment count by 1
          $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id";

          $update_comment_count = mysqli_query($connection,$query);

        }


        ?>


        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header bg-light border-bottom-0">Leave a Comment:</h5>
          <div class="card-body bg-light">
            <form action="" method="post">

              <div class="form-group w-50">
                <input type="text" class="form-control" name="comment_author" placeholder="Name">
              </div>

              <div class="form-group w-50">
                <input type="email" class="form-control" name="comment_email" placeholder="Email">
                <p class="text-muted pl-2 pt-1"><small>We do not share your email.</small></p>
              </div>

              <div class="form-group">
                <textarea class="form-control" name="comment_content" rows="3" placeholder="Leave a comment"></textarea>
              </div>

              <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>

            </form>

          </div>
        </div>


        <?php

        $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
        $query .= "AND comment_status = 'approved' ";
        $query .= "ORDER BY comment_id DESC ";
        $select_comment_query = mysqli_query($connection,$query);

        if(!$select_comment_query){
          die("query failed" . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_array($select_comment_query)) {
          $comment_date = $row['comment_date'];
          $comment_content = $row['comment_content'];
          $comment_author = $row['comment_author'];

          ?>


          <!-- Single Comment -->
          <div class="media mb-4">
            <!-- avatar icon -->
            <i class="fas fa-user-circle fa-3x d-flex mr-3 text-secondary"></i>
            <div class="media-body">
              <!-- comment author / date -->
              <h5 class="mt-0"><?php echo $comment_author ?> <small class="text-muted">on <?php echo $comment_date ?></small></h5>
              <!-- comment content -->
              <p>
                <?php echo $comment_content ?>
              </p>
              <hr>
            </div>
          </div>




        <?php
        }

        ?>



      

        <?php
        // end loop
        }
      ?>
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search Posts</h5>
          <div class="card-body">
            <!-- Search form -->
            <form action="search.php" method="post">
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search for...">
                  <span class="input-group-append">
                    <button class="btn btn-primary font-weight-bold" name="submit" type="submit">Go!</button>
                  </span>
                </div>
            </form>
          </div>
        </div>

        <!-- Top Posts Widget -->
        <div class="card my-4 shadow-sm">
          <h5 class="card-header">Top Posts</h5>
          <div class="card-body">
            <div class="row">
              
              <div class="col-lg-12">
                <ol class="mb-0 pl-3">
                  <li class="py-1">
                    <a href="#">Post Link Title</a>
                  </li>
                  <li class="py-1">
                    <a href="#">Post Link</a>
                  </li>
                  <li class="py-1">
                    <a href="#">Post Link</a>
                  </li>
                  <li class="py-1">
                    <a href="#">Post Link</a>
                  </li>
                  <li class="py-1">
                    <a href="#">Post Link</a>
                  </li>
                </ol>
              </div>

            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


<!-- Footer -->
<?php include "includes/footer.php" ?>
