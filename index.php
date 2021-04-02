<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Homepage Content -->
<section class="bg-grey mb-5">
  <div class="container text-center py-5">
      <h1 class="pb-3">Suggestions For Grow Young Fitness</h1>
      <p class="lead text-muted">Have a great idea for something we can add or improve that will make your memberhsip with Grow Young Fitness that much better? Click the button to submit your idea</p>
      <button class="btn btn-success btn-lg mb-3 font-weight-bold" data-toggle="modal" data-target="#postModal"><i class="fas fa-plus"></i> Submit Your Idea</button>
      <p class="lead text-muted">or search for other peoples ideas.</p>
      <!-- Search Bar -->
      <div class="col-md-8 offset-md-2">
          <form action="search.php" method="post">
              <div class="input-group my-4">
                <input type="text" name="search" class="form-control" placeholder="Search for...">
                <span class="input-group-append">
                  <button class="btn btn-primary search-btn" name="submit" type="submit">Go!</button>
                </span>
              </div>
          </form>
      </div>
  </div>
</section>


<!-- feature request cards / Views found in Includes Folder -->
<?php
  // Switch Statement that displays/filters posts
  if (isset($_GET['sort_page_by'])) {
    $source = $_GET['sort_page_by'];
  } else{
    $source = '';
  }

  switch ($source) {
    
    case 'likes':
    include "includes/sort_by_likes.php";
    break;

    case 'newest':
    include "includes/sort_by_newest.php";
    break;
    
    default:
    include "includes/sort_by_default.php";

    break;
  }
?>



<!-- Footer -->
<?php include "includes/footer.php" ?>
