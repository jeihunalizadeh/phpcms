<?php 
if(isset($_GET['edit_user'])){
    $the_user_id = $_GET['edit_user'];

$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
$select_users_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname =  $row['user_firstname'];
    $user_lastname =  $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
    $user_role =  $row['user_role'];
}

}




    if(isset($_POST['edit_user'])){
    // $the_user_id = $_POST['edit_user'];
        
    // $user_id = $row['user_id'];
    $username = $_POST['username'];
    $user_firstname =  $_POST['user_firstname'];
    $user_lastname =  $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_role =  $_POST['user_role'];
    
    
    $query = "UPDATE users SET ";
    $query.= "username = '{$username}', ";
    $query.= "user_firstname = '{$user_firstname}', ";
    $query.= "user_lastname = '{$user_lastname}', ";
    $query.= "user_email= '{$user_email}', ";
    $query.= "user_password ='{$user_password}', ";
    $query.= "user_role ='{$user_role}' ";
    $query.= "WHERE user_id = {$the_user_id} ";
    
    $edit_user_query = mysqli_query($connection, $query);
    confirmPosts($edit_user_query);


}


?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" value="<?php echo $username; ?>" name="username" class="form-control"/>
    </div>
     <div class="form-group">
         
        <select name="user_role" id="post_category">
            <option value="subscriber"><?php echo $user_role; ?></option>
<?php
    if($user_role == 'admin') {
         echo  "<option value='subscriber'>subscriber</option>";
    } else {
        echo   "<option value='admin'>admin</option>";

    }
   
  
  
            
?>            
       


<!--// $query = "SELECT * FROM categories";-->
<!--// $select_categories = mysqli_query($connection, $query);-->

<!--// confirmPosts($select_categories);-->
<!--// while($row = mysqli_fetch_assoc($select_categories)){-->
<!--// $cat_id = $row['cat_id'];-->
<!--// $cat_title = $row['cat_title'];-->


<!--// echo "<option value='$cat_id'>$cat_title</option>";-->



<!--// if(isset($_POST['create_post'])) {-->
<!--//     $post_title = $_POST['post_title'];-->
<!--//     $post_author = $_POST['post_author'];-->
<!--//     $post_category_id = $_POST['post_category'];-->
<!--//     $post_status = $_POST['post_status'];-->
<!--//     $post_image = $_FILES['image']['name'];-->
<!--//     $post_image_temp = $_FILES['image']['tmp_name'];-->
<!--//     $post_tags = $_POST['post_tags'];-->
<!--//     $post_content = $_POST['post_content'];-->
 
<!--//     move_uploaded_file($post_image_temp, "..images/$post_image");-->
    
<!--//     if(empty('$post_image')) {-->
<!--//         $query = "SELECT * FROM posts WHERE post_id = $get_post_id ";-->
<!--//         $select_image = mysqli_query($connection, $query);-->
<!--//         while($row = mysqli_fetch_assoc($select_image)) {-->
<!--//             $post_image = $row['post_image'];-->
<!--//         }-->
<!--//     }-->
    
<!--//     $query = "UPDATE posts SET ";-->
<!--//     $query.= "post_title = '{$post_title},";-->
<!--//     $query.= "post_category_id = {$post_category_id},";-->
<!--//     $query.= "post_date = now(), ";-->
<!--//     $query.= "post_author = {$post_author},";-->
<!--//     $query.= "post_status = {$post_status},";-->
<!--//     $query.= "post_tags = {$post_tags},";-->
<!--//     $query.= "post_content = {$post_content},";-->
<!--//     $query.= "post_image = '{$post_image}' ";-->
<!--//     $query.= "WHERE post_id = {$get_post_id} ";-->
    
<!--//     $update_post = mysqli_query($connection, $query);-->
<!--//     confirmPosts($create_post);-->
<!--// }-->







</select>

    </div>
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" value="<?php echo $user_firstname; ?>" name="user_firstname" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" value="<?php echo $user_lastname; ?>" name="user_lastname" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email"/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password"/>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </div>
    
    
</form>
