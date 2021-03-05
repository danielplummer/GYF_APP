
<!-- header -->
<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Homepage Content -->
<div class="container text-center py-5">
    <h1 class="">Suggestions For Grow Young Fitness</h1>
    <!-- Search Bar -->
    <div class="input-group my-4">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-append">
        <button class="btn btn-primary" type="button">Go!</button>
      </span>
    </div>
</div>


<!-- feature request cards -->
<section>
    <div class="container">
        
        <!-- Card content -->
        <div class="card shadow-sm mb-4">
          <div class="row no-gutters bg-light">
            <div class="col-md-2 align-self-center text-center">
                <div class="py-3">
                  <h2 class="p-2">12 votes</h2>
                  <button type="button" class="btn btn-outline-success"><i class="far fa-thumbs-up"></i> Vote</button>
              </div>
            </div>
            <div class="col-md-10">
              <div class="card-body bg-white">
                <h5 class="card-title">Feature Request Title</h5>
                <!-- descritpion -->
                <p class="card-text text-muted">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This text will cut off when it gets too long...</p>
                <a href="#" class="btn btn-primary btn-sm">Keep Reading <span aria-hidden="true">&raquo;</span></a>
                <!-- info -->
                
                <p class="card-text pt-3"><a href="#"><small>17 Comments</small></a> | <small class="text-muted">Suggested on 3/5/21 by Dean P.</small> <span class="badge badge-warning float-right">Under Construction</span></p>
              </div>
            </div>
          </div>
        </div>
        <!-- /card content -->

    </div>
</section>


<!-- Pagination -->
<section class="my-5">
    <div class="container">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </div>
</section>

<!-- Footer -->
<?php include "includes/footer.php" ?>
