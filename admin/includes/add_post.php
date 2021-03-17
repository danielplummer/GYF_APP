<style>
  /* hide add post btn */
  .add-post-btn{
    display: none;
  }
</style>


<?php
// Add a new post

if (isset($_POST['create_post'])) {
  $post_title = $_POST['post_title'];
  $post_author = $_POST['post_author'];
  $post_status = $_POST['post_status'];
  $post_tags = $_POST['post_tags'];
  $post_content = $_POST['post_content'];
  $post_date = date('d-m-y');
  //$post_comment_count = 4;

  $query = "INSERT INTO posts(post_title, post_author, post_status, post_tags, post_content, post_date)";

  $query .= "VALUES('{$post_title}', '{$post_author}', '{$post_status}', '{$post_tags}', '{$post_content}', now()) ";

  $create_post_query = mysqli_query($connection, $query);
  // reload page after Submit
  header("Location: posts.php");

}

?>

<p>add post page</p>

<div class="col-lg-6 mt-3">
  
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
      <label for="title">Post Title</label>
      <input type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
      <label for="author">Post Author</label>
      <input type="text" class="form-control" name="post_author">
    </div>

    <div class="form-group w-50">
      <label for="role">Post Status</label>
      <select type="text" class="form-control" name="post_status">
        <option value="draft">Select Post Status</option>
        <option value="draft">Draft</option>
        <option value="published">Published</option>
      </select>
    </div>

    <div class="form-group">
      <label for="tags">Post Tags</label>
      <input type="text" class="form-control" name="post_tags">
    </div>


    <div class="form-group">
      <label for="content">Post Content</label>
      <textarea class="form-control" rows="5" name="post_content"></textarea>
    </div>

    <button type="submit" name="create_post" class="btn btn-lg btn-primary">Submit</button>

  </form>

</div>