<?php
// Add a new post

if (isset($_POST['create_post'])) {
  $post_title = $_POST['post_title'];
  $post_author = $_POST['post_author'];
  $post_email = $_POST['post_email'];
  $post_content = $_POST['post_content'];
  $post_date = date('d-m-y');
  //$post_comment_count = 4;

  // Clean Form Data
  $post_title = mysqli_real_escape_string($connection, $post_title);
  $post_author = mysqli_real_escape_string($connection, $post_author);
  $post_email = mysqli_real_escape_string($connection, $post_email);
  $post_content = mysqli_real_escape_string($connection, $post_content);

  $query = "INSERT INTO posts(post_title, post_author, post_email, post_content, post_date)";

  $query .= "VALUES('{$post_title}', '{$post_author}', '{$post_email}', '{$post_content}', now()) ";

  $create_post_query = mysqli_query($connection, $query);
  // reload page after Submit
  header("Location: index.php");
}

?>


<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand pr-4" href="index.php">
      <img src="img/lg-logo-color.png" class="d-inline-block header-logo" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto font-weight-bold">
        <li class="nav-item">
          <a class="nav-link" href="#"><span aria-hidden="true">&laquo;</span> Back to Library</a>
        </li>
      </ul>

      <!-- ADD Post BTN -->
      <button class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target="#postModal"><i class="fas fa-plus"></i> Submit Your Idea</button>
      
    </div>
  </div>
</nav>



<!-- Add Post Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Your Idea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="author">Name</label>
            <input type="text" class="form-control" name="post_author" required>
          </div>

          <div class="form-group">
            <label for="tags">Email</label>
            <p class="text-muted" style="margin-top:-10px; margin-bottom:5px;"><small>We do not share your email.</small></p>
            <input type="text" class="form-control" name="post_email" required>
          </div>

          <div class="form-group">
            <label for="title">Suggestion Title</label>
            <input type="text" class="form-control" name="post_title" required>
          </div>


          <div class="form-group">
            <label for="content">Share Your Idea</label>
            <textarea class="form-control" rows="8" name="post_content" required></textarea>
          </div>

          <button type="submit" name="create_post" class="btn btn-lg btn-primary">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- end modal -->

