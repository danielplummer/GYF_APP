<!-- working SORT Form / On Most Votes Page -->
<section>
  <div class="container">
    <form method="get">
      <div class="form-group w-50">
        <label for="sortBy">Sorted By:</label>
        <select name="sort_page_by" class="form-control" onchange='if(this.value != 0) { this.form.submit(); }'>
         <option value='likes'>Most Votes</option>
         <option value='newest'>Newest Posts</option>
        </select>
      </div>
    </form>
  </div>
</section>



<!-- feature request cards -->
<section class="">
    <div class="container">

        <?php

        // posts per page variable
        $per_page = 25;

        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = "";
        }

        if($page == "" || $page == 1){
          $page_1 = 0;
        }else{
          $page_1 = ($page * $per_page) - $per_page;
        }


        // Pagination Query
        $post_query_count = "SELECT * FROM posts";
        $find_count = mysqli_query($connection,$post_query_count);
        $count = mysqli_num_rows($find_count);

        $count = ceil($count / $per_page);


        // Display posts query and pagination limit
        $query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY likes DESC LIMIT $page_1, $per_page";
        $select_all_posts_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_all_posts_query)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_status_badge = $row['post_status_badge'];
            // Limit content lenght on homepage
            $post_content = substr($row['post_content'], 0,200);
            
            // Get approved comments count from DB
            $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status = 'approved' ";
            $send_comment_count_query = mysqli_query($connection, $query);
            // store in this variable
            $count_comments = mysqli_num_rows($send_comment_count_query);

            $post_status = $row['post_status'];
            $likes = $row['likes'];

            if($post_status !== 'published'){
              // this code is further down the page
            }else{
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
                <!-- link to post -->
                <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary btn-sm">Keep Reading <span aria-hidden="true">&raquo;</span></a>
                <!-- info -->
                
                <p class="card-text pt-3">
                    <!-- comment count -->
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><small><?php echo $count_comments ?> Comments</small></a> | 
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
        // Use an include here
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
            <!--
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
          -->
            <?php
              # Loop through number of pages
              for($i =1; $i <= $count; $i++){

                if($i == $page){
                  echo "<li class='page-item active'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                }else{
                  echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                }
              }
            ?>
            <!--
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
            -->
          </ul>
        </nav>
    </div>
</section>