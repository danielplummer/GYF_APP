<?php include "includes/header.php"?>

<!-- Navigation -->
<?php include "includes/navigation.php"?>

  	
<!-- Main Admin Page Content -->
<div class="container-fluid">
	<h1 class="mt-4">Pending Comments</h1>

	<?php
  // Must be at top of this file for header() to work

  // ========== Approve Comment
  if(isset($_GET['approve'])){
    $the_comment_id = $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
    $approve_comment_query = mysqli_query($connection, $query);
    // reload page after click
    header("Location: pending-comments.php");
  }


  // ========== Unapprove Comment
  if(isset($_GET['unapprove'])){
    $the_comment_id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
    $unapprove_comment_query = mysqli_query($connection, $query);
    // reload page after click
    header("Location: pending-comments.php");
  }

  // ========== Delete Comment
  if(isset($_GET['delete'])){

    if(isset($_SESSION['user_role'])){

      if($_SESSION['user_role'] == 'admin'){

        $the_comment_id = mysqli_real_escape_string($connection, $_GET['delete']);

        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
        $delete_query = mysqli_query($connection, $query);
        // reload page after delete
        header("Location: pending-comments.php");
      }
    }
  }

?>


<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Author</th>
      <th scope="col">Comment</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
      <th scope="col">In Response To</th>
      <th scope="col">Date</th>
      <th colspan="2" scope="col" class="text-center">Update Status</th>
    </tr>
  </thead>
  <tbody>
    
    <?php

    // Display all pending comments
    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ORDER BY comment_id DESC";
    $select_comments = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_comments)) {
    	$comment_id = $row['comment_id'];
    	$comment_post_id = $row['comment_post_id'];
    	$comment_author = $row['comment_author'];
    	$comment_email = $row['comment_email'];
    	$comment_content = $row['comment_content'];
    	$comment_status = $row['comment_status'];
     	$comment_date = $row['comment_date'];
      // Change date fortmat
      $new_comment_date = date("m-d-Y", strtotime($comment_date)); 

     	echo "<tr>";
	     	echo "<td>$comment_id</td>";
	     	echo "<td>$comment_author</td>";
	     	echo "<td>$comment_content</td>";
	     	echo "<td>$comment_email</td>";
        if($comment_status == 'approved'){
            echo "<td><span class='badge badge-pill badge-success'>$comment_status</span></td>";
          }else{
            echo "<td><span class='badge badge-pill badge-warning'>$comment_status</span></td>";
          }
	     	//echo "<td>$comment_status</td>";

        // display post title asscociated with the comment
        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
        $select_post_id_query = mysqli_query($connection,$query);
        
        while ($row = mysqli_fetch_assoc($select_post_id_query)){
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];

          echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        }

	     	echo "<td>$new_comment_date</td>";
        echo "<td class='text-center'><a href='pending-comments.php?approve=$comment_id' class='btn btn-success'>Approve</a></td>";
        echo "<td class='text-center'><a href='pending-comments.php?unapprove=$comment_id' class='btn btn-warning'>Unapprove</a></td>";
        echo "<td class='text-center'><a rel='{$comment_id}' href='javascript:void(0)' class='text-danger delete_comment_link'><i class='far fa-trash-alt'></i> Delete</a></td>";
     	echo "</tr>";

    }
    ?>


    <?php

    

    ?>
  
  </tbody>
</table>


<!-- confirm delete modal -->
<?php include "includes/delete_modal.php" ?>

</div>
<!-- ./container-fluid -->
    
<!-- Footer -->
<?php include "includes/footer.php"?>