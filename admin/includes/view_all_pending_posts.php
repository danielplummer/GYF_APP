<?php

// ========== Approve Post
  if(isset($_GET['publish'])){
    $the_post_id = $_GET['publish'];

    $query = "UPDATE posts SET post_status = 'published' WHERE post_id = $the_post_id";
    $publish_post_query = mysqli_query($connection, $query);
    // reload page after click
    header("Location: pending-posts.php");
  }


  // ========== Unpublish Post
  if(isset($_GET['unpublish'])){
    $the_post_id = $_GET['unpublish'];

    $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = $the_post_id";
    $unpublish_post_query = mysqli_query($connection, $query);
    // reload page after click
    header("Location: pending-posts.php");
  }



// ========== Delete post - Must be at top of this file to work
if(isset($_GET['delete'])){

  if(isset($_SESSION['user_role'])){

    if($_SESSION['user_role'] == 'admin'){

      $the_post_id = mysqli_real_escape_string($connection, $_GET['delete']);

      $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
      $delete_query = mysqli_query($connection, $query);
      // reload page after delete
      header("Location: pending-posts.php");
    }
  }
}

?>


<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Author</th>
      <th scope="col">Title</th>
      <th scope="col">Status</th>
      <th scope="col">Email</th>
      <th scope="col">Comments</th>
      <th scope="col">Date</th>
      <th scope="col">View Post</th>
      <th colspan="2" scope="col" class="text-center">Update Status</th>
    </tr>
  </thead>
  <tbody>
    
    <?php

    // Deisplay all posts
    $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
    	$post_id = $row['post_id'];
    	$post_author = $row['post_author'];
    	$post_title = $row['post_title'];
    	$post_status = $row['post_status'];
    	$post_email = $row['post_email'];
    	$post_comment_count = $row['post_comment_count'];
     	$post_date = $row['post_date'];
      // Change date fortmat
      $new_date = date("m-d-Y", strtotime($post_date));  

     	echo "<tr>";
	     	echo "<td>$post_id</td>";
	     	echo "<td>$post_author</td>";
	     	echo "<td>$post_title</td>";
        if($post_status == 'published'){
            echo "<td><span class='badge badge-pill badge-success'>$post_status</span></td>";
          }else{
            echo "<td><span class='badge badge-pill badge-warning'>$post_status</span></td>";
          }
	     	echo "<td>$post_email</td>";

        $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
        $send_comment_count_query = mysqli_query($connection, $query);
        $count_comments = mysqli_num_rows($send_comment_count_query);

	     	echo "<td>$count_comments</td>";
	     	echo "<td>$new_date</td>";
        echo "<td class='text-center'><a href='../post.php?p_id=$post_id'>View</a></td>";
        echo "<td class='text-center'><a href='pending-posts.php?publish=$post_id' class='btn btn-success'>Publish</a></td>";
        echo "<td class='text-center'><a href='pending-posts.php?unpublish=$post_id' class='btn btn-warning'>Unpublish</a></td>";
        echo "<td>
                  <div class='dropdown'>
                    <button class='btn btn-secondary' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                      <i class='fas fa-ellipsis-v'></i>
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                      <a class='dropdown-item' href='posts.php?source=edit_post&p_id={$post_id}'><i class='far fa-edit'></i> Edit</a>
                      <a class='dropdown-item text-danger delete_post_link' rel='{$post_id}' href='javascript:void(0)'><i class='far fa-trash-alt'></i> Delete</a>
                    </div>
                  </div>
                </td>";

     	echo "</tr>";

    }
    ?>
  
  </tbody>
</table>

<!-- confirm Delete modal -->
<?php include "delete_modal.php" ?>
