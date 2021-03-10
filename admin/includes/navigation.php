<!-- nav wrapper / closed in footer.php -->
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="img/lg-logo-white.png" class="img-fluid" width="175"></div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-dark text-light"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a>
        <a href="posts.php" class="list-group-item list-group-item-action bg-dark text-light"><i class="fas fa-sticky-note mr-3"></i> Posts</a>
        <a href="comments.php" class="list-group-item list-group-item-action bg-dark text-light"><i class="fas fa-comment-dots mr-3"></i>Comments</a>
        <a href="users.php" class="list-group-item list-group-item-action bg-dark text-light"><i class="fas fa-user mr-3"></i>Users</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content wrapper / closed in footer.php -->
    <div id="page-content-wrapper">

      <!-- Top Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <!-- sidebar toggle -->
        <button class="btn btn-light" id="menu-toggle"><i class="fas fa-ellipsis-h"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Back to App</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-cog mr-n2"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fas fa-power-off"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>