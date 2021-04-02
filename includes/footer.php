<footer class="py-5 bg-primary">
    <div class="container text-center">
      <img src="img/lg-logo-white.png" class="img-fluid mb-4" width="200">
      <p class="text-white">Copyright &copy; Grow Young Fitness LLC. 2021</p>
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link text-white" href="https://www.growyoungfitness.com/pages/privacy-policy">Privacy Policy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="https://www.growyoungfitness.com/pages/terms">Terms of Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="https://www.growyoungfitness.com/pages/disclaimer">Disclaimer</a>
          </li>
          <?php

          if(isset($_SESSION['user_role'])){
            echo '<li class="nav-item">
                    <a class="nav-link text-white" href="admin/">Admin</a>
                  </li>';
          }else{
            echo '<li class="nav-item">
                    <a class="nav-link text-white" href="login.php">Admin Login</a>
                  </li>';
          };

          ?>
        </ul>
    </div>
  </footer>


    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function(){

        let post_id = <?php echo $the_post_id; ?>

        // Like Post
        $('.like').click(function(){
          $.ajax({
            url: "post.php?p_id=<?php echo $the_post_id; ?>",
            type: 'post',
            data: {
              'liked': 1,
              'post_id': post_id
            }
          })
        });

        // Unlike Post
        $('.unlike').click(function(){
          $.ajax({
            url: "post.php?p_id=<?php echo $the_post_id; ?>",
            type: 'post',
            data: {
              'unliked': 1,
              'post_id': post_id
            }
          })
        });

      });
    </script>

    <script>
      // Toggle Like Btn
      $(document).ready(function(){
        $("#likeBtn").click(function(){
          $("#likeBtn").toggleClass("d-none");
          $("#unlikeBtn").toggleClass("d-none");
        });
        $("#unlikeBtn").click(function(){
          $("#likeBtn").toggleClass("d-none");
          $("#unlikeBtn").toggleClass("d-none");
        });
      });

    </script>




  </body>
</html>