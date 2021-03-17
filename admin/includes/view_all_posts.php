<?php

// ========== Approve Post
  if(isset($_GET['publish'])){
    $the_post_id = $_GET['publish'];

    $query = "UPDATE posts SET post_status = 'published' WHERE post_id = $the_post_id";
    $publish_post_query = mysqli_query($connection, $query);
    // reload page after click
    header("Location: posts.php");
  }


  // ========== Unpublish Post
  if(isset($_GET['unpublish'])){
    $the_post_id = $_GET['unpublish'];

    $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = $the_post_id";
    $unpublish_post_query = mysqli_query($connection, $query);
    // reload page after click
    header("Location: posts.php");
  }



// Delete post - Must be at top of this file to work
if(isset($_GET['delete'])){
  $the_post_id = $_GET['delete'];

  $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
  $delete_query = mysqli_query($connection, $query);
  // reload page after delete
  header("Location: posts.php");
}

?>


<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Author</th>
      <th scope="col">Title</th>
      <th scope="col">Status</th>
      <th scope="col">Tags</th>
      <th scope="col">Comments</th>
      <th scope="col">Date</th>
      <th scope="col">Publish</th>
      <th scope="col">Unpublish</th>
    </tr>
  </thead>
  <tbody>
    
    <?php

    // Deisplay all posts
    $query = "SELECT * FROM POSTS";
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
    	$post_id = $row['post_id'];
    	$post_author = $row['post_author'];
    	$post_title = $row['post_title'];
    	$post_status = $row['post_status'];
    	$post_tags = $row['post_tags'];
    	$post_comment_count = $row['post_comment_count'];
     	$post_date = $row['post_date'];

     	echo "<tr>";
	     	echo "<td>$post_id</td>";
	     	echo "<td>$post_author</td>";
	     	echo "<td>$post_title</td>";
	     	echo "<td>$post_status</td>";
	     	echo "<td>$post_tags</td>";
	     	echo "<td>$post_comment_count</td>";
	     	echo "<td>$post_date</td>";
        echo "<td class='text-center'><a href='posts.php?publish=$post_id'>Publish</a></td>";
        echo "<td class='text-center'><a href='posts.php?unpublish=$post_id'>Unpublish</a></td>";
        echo "<td class='text-center'><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td class='text-center'><a href='posts.php?delete={$post_id}' class='text-danger'>Delete</a></td>";
     	echo "</tr>";

    }
    ?>
  
  </tbody>
</table>