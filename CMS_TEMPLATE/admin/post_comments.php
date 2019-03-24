 <?php include("includes/admin_header.php"); ?>


    <div id="wrapper">

        <!-- Navigation -->
       <?php include("includes/admin_navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO THE ADMIN PAGE
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
 
 
      <table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Content</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
    
    </tr>
    </thead>
    <tbody>
<?php                                
$query = "SELECT * FROM comments WHERE comment_post_id = " . mysqli_real_escape_string($connection, $_GET['id']) . " ";
$view_all_comments_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($view_all_comments_query)) {
    $comment_id = $row['comment_id'];
    $comment_post_id =  $row['comment_post_id'];
    $comment_author =  $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_content = $row['comment_content'];
    $comment_status =  $row['comment_status'];
    $comment_date = $row['comment_date'];
    
    echo "<tr>";
    echo "<td>{$comment_id}</td>";
    // echo "<td>{$comment_post_id}</td>";
    echo "<td>{$comment_author}</td>";
    echo "<td>{$comment_content}</td>";
    echo "<td>{$comment_email}</td>";
    echo "<td>{$comment_status}</td>";
    
    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
    $select_post_id_query  = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_post_id_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
    }
    

    
 
    echo "<td>{$comment_date}</td>";
    echo "<td><a href='admin_comments.php?approve=$comment_id'>Approved</a></td>";
    echo "<td><a href='admin_comments.php?unapprove=$comment_id'>Unapproved</td>";
    echo "<td><a href='post_comments.php?delete=$comment_id&id=" . $_GET['id'] . "'>Delete</a></td>";
    echo "</tr>";
}
                             
                                
?>                                
                 
                            </tbody>
                        </table>
                        
<?php

if(isset($_GET['approve'])){
    $the_comment_id = $_GET['approve'];
    
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
    $delete_query = mysqli_query($connection, $query);
}

if(isset($_GET['unapprove'])){
    $the_comment_id = $_GET['unapprove'];
    
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
    $delete_query = mysqli_query($connection, $query);
}







if(isset($_GET['delete'])){
    $the_comment_id = $_GET['delete'];
    
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query($connection, $query);

 header("Location: post_comments.php?id=". $_GET['id'] ."");
}
?>

           </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include("includes/admin_footer.php"); ?>