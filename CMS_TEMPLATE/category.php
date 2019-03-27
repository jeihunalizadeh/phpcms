<?php include("includes/header.php"); ?>
<?php include("includes/db.php"); ?>

    <!-- Navigation -->
   <?php include("includes/navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
  <?php 
               
    if(isset($_GET['category'])) {
        $post_category_id = $_GET['category'];
            if(session_status() == PHP_SESSION_NONE) session_start();
    
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
          $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id ";
    } else {
   $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id AND post_status = 'published' ";  
   }
            
              
 
    $select_all_posts_query = mysqli_query($connection, $query);
            if(mysqli_num_rows($select_all_posts_query) < 1) {
                echo "<h1 class='text-center'>No posts avalaible</h1>";           
            } else {
                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0,50);
                        $post_tags = $row['post_tags'];
         
                   ?>
                 <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

             <?php } } }  else {
             
                header("Location: index.php");
             
             }
             ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
           
      <?php include("includes/sidebar.php"); ?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      <?php include("includes/footer.php"); ?>