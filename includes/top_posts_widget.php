

<!-- Top Posts Widget -->
<div class="card my-4">
  <h5 class="card-header">Most Liked Posts</h5>
  <div class="card-body">
    <div class="row">
      
      <div class="col-lg-12">
        <ol class="mb-0 pl-3">


          <?php

          $query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY likes DESC LIMIT 5";

          $select_all_posts_query = mysqli_query($connection, $query);

          while($row = mysqli_fetch_array($select_all_posts_query)){
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
          ?>

          <li class="py-1">
            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
          </li>

          <?php 

          }

          ?>
        </ol>
      </div>

    </div>
  </div>
</div>