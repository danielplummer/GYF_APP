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
        echo "<td>some title</td>";
	     	echo "<td>$comment_date</td>";
        echo "<td class='text-center'><a href='posts.php?source=edit_post&p_id='>Approve</a></td>";
        echo "<td class='text-center'><a href='posts.php?delete='>Unapprove</a></td>";
        echo "<td class='text-center'><a href='posts.php?source=edit_post&p_id='>Edit</a></td>";
        echo "<td class='text-center'><a href='posts.php?delete=' class='text-danger'>Delete</a></td>";
     	echo "</tr>";

    }
    ?>
  
  </tbody>
</table>


<?php
// Delete post

if(isset($_GET['delete'])){
  $the_post_id = $_GET['delete'];

  $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
  $delete_query = mysqli_query($connection, $query);
}

?>