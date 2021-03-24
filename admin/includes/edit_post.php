<style>
  /* hide add post btn */
  .add-post-btn{
    display: none;
  }
</style>

<?php

    if(isset($_GET['p_id'])) {
      $the_post_id = $_GET['p_id'];
    }

    // Display post by post id
    $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
    $select_posts_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts_by_id)){
      $post_id = $row['post_id'];
      $post_author = $row['post_author'];
      $post_title = $row['post_title'];
      $post_status = $row['post_status'];
      $post_tags = $row['post_tags'];
      $post_content = $row['post_content'];
      $post_comment_count = $row['post_comment_count'];
      $post_date = $row['post_date'];
    }



    if(isset($_POST['update_post'])) {
      $post_title = $_POST['post_title'];
      $post_author = $_POST['post_author'];
      $post_status = $_POST['post_status'];
      $post_tags = $_POST['post_tags'];
      $post_content = $_POST['post_content'];

      // Clean Form Data
      $post_title = mysqli_real_escape_string($connection, $post_title);
      $post_author = mysqli_real_escape_string($connection, $post_author);
      $post_status = mysqli_real_escape_string($connection, $post_status);
      $post_tags = mysqli_real_escape_string($connection, $post_tags);
      $post_content = mysqli_real_escape_string($connection, $post_content);

      // Update Post Query
      $query = "UPDATE posts SET ";
      $query .="post_title = '{$post_title}', ";
      $query .="post_author = '{$post_author}', ";
      $query .="post_status = '{$post_status}', ";
      $query .="post_tags = '{$post_tags}', ";
      $query .="post_content = '{$post_content}', ";
      $query .="post_date = now() ";
      $query .= "WHERE post_id = {$the_post_id} ";

      /* Update Post Query
      $query = "UPDATE posts SET
            post_title = '{$post_title}',
            post_date = now(),
            post_author = '{$post_author}',
            post_status = '{$post_status}',
            post_tags = '{$post_tags}',
            post_content = '{$post_content}',
            WHERE post_id = {$the_post_id} ";
      */

      $update_post = mysqli_query($connection,$query);

      if(!$update_post){
        die("QUERY FAILED" . mysqli_error($connection));
      }
    }

?>

<p>edit post page</p>

<div class="col-lg-6 mt-3">
  
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
      <label for="title">Post Title</label>
      <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
      <label for="author">Post Author</label>
      <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>

    <!--
    <div class="form-group">
      <label for="status">Post Status</label>
      <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>
    -->

    <div class="form-group w-50">
      <label for="role">Post Status</label>
      <select type="text" class="form-control" name="post_status">
        <option value="<?php echo $post_status ?>"><?php echo $post_status ?></option>
        <?php
          if ($post_status == 'draft') {
            echo "<option value='published'>Publish</option>";
          }else{
            echo "<option value='draft'>Draft</option>";
          }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="tags">Post Tags</label>
      <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>


    <div class="form-group">
      <label for="content">Post Content</label>
      <textarea class="form-control" rows="5" name="post_content"><?php echo $post_content; ?></textarea>
    </div>

    <button type="submit" name="update_post" class="btn btn-lg btn-primary">Update Post</button>

  </form>

</div>