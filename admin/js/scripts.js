
// Toggle sidebar
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});


// Delete Post Modal
$(document).ready(function(){
	$(".delete_post_link").on('click', function(){
		var id = $(this).attr("rel");
		var delete_url = "posts.php?delete="+ id +" ";
		
		$(".modal_delete_link").attr("href", delete_url);
		$("#deletePostModal").modal('show');
	})
});


// Delete Comment Modal
$(document).ready(function(){
	$(".delete_comment_link").on('click', function(){
		let comment_id = $(this).attr("rel");
		let delete_comment_url = "comments.php?delete="+ comment_id +" ";
		
		$(".modal_delete_comment_link").attr("href", delete_comment_url);
		$("#deleteCommentModal").modal('show');
	})
});
