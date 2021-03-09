<?php
  // Must be at top of this file for header() to work

  // ========== Approve Comment
  if(isset($_GET['approve'])){
    $the_comment_id = $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
    $approve_comment_query = mysqli_query($connection, $query);
    // reload page after click
    header("Location: comments.php");
  }


  // ========== Unapprove Comment
  if(isset($_GET['unapprove'])){
    $the_comment_id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
    $unapprove_comment_query = mysqli_query($connection, $query);
    // reload page after click
    header("Location: comments.php");
  }

  // ========== Delete Comment
  if(isset($_GET['delete'])){
    $the_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query($connection, $query);
    // reload page after delete
    header("Location: comments.php");
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
      <th scope="col">Approve</th>
      <th scope="col">Unapprove</th>
    </tr>
  </thead>
  <tbody>
    
    <?php

    // Display all comments
    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_comments)) {
    	$comment_id = $row['comment_id'];
    	$comment_post_id = $row['comment_post_id'];
    	$comment_author = $row['comment_author'];
    	$comment_email = $row['comment_email'];
    	$comment_content = $row['comment_content'];
    	$comment_status = $row['comment_status'];
     	$comment_date = $row['comment_date'];

     	echo "<tr>";
	     	echo "<td>$comment_id</td>";
	     	echo "<td>$comment_author</td>";
	     	echo "<td>$comment_content</td>";
	     	echo "<td>$comment_email</td>";
	     	echo "<td>$comment_status</td>";

        // display post title asscociated with the comment
        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
        $select_post_id_query = mysqli_query($connection,$query);
        
        while ($row = mysqli_fetch_assoc($select_post_id_query)){
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];

          echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        }

	     	echo "<td>$comment_date</td>";
        echo "<td class='text-center'><a href='comments.php?approve=$comment_id'>Approve</a></td>";
        echo "<td class='text-center'><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
        echo "<td class='text-center'><a href='comments.php?delete=$comment_id' class='text-danger'>Delete</a></td>";
     	echo "</tr>";

    }
    ?>


    <?php

    

    ?>
  
  </tbody>
</table>