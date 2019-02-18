 <?php 
if(isset($_POST['create_user'])) {
  
    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password =$_POST['user_password'];
    $user_role = $_POST['user_role'];
   
  
    
    $query = "INSERT INTO users(username, user_firstname, user_lastname, user_email, user_password, user_role ) ";

    $query .= "VALUES('{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_password}','{$user_role}' ) ";
    
    
    $create_user_query = mysqli_query($connection, $query);
    
    
    confirmPosts($create_user_query);
    
    echo "User Created: " . "  " . "<a href='users.php'>View Users</a> ";
    
}




?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control"/>
    </div>
     <div class="form-group">
        <select name="user_role" id="post_category">
            <option value="admin">Admin</option>
            <option value="sub">Subscriber</option>

<?php
// $query = "SELECT * FROM categories";
// $select_categories = mysqli_query($connection, $query);

// confirmPosts($select_categories);
// while($row = mysqli_fetch_assoc($select_categories)){
// $cat_id = $row['cat_id'];
// $cat_title = $row['cat_title'];


// echo "<option value='$cat_id'>$cat_title</option>";



// if(isset($_POST['create_post'])) {
//     $post_title = $_POST['post_title'];
//     $post_author = $_POST['post_author'];
//     $post_category_id = $_POST['post_category'];
//     $post_status = $_POST['post_status'];
//     $post_image = $_FILES['image']['name'];
//     $post_image_temp = $_FILES['image']['tmp_name'];
//     $post_tags = $_POST['post_tags'];
//     $post_content = $_POST['post_content'];
 
//     move_uploaded_file($post_image_temp, "..images/$post_image");
    
//     if(empty('$post_image')) {
//         $query = "SELECT * FROM posts WHERE post_id = $get_post_id ";
//         $select_image = mysqli_query($connection, $query);
//         while($row = mysqli_fetch_assoc($select_image)) {
//             $post_image = $row['post_image'];
//         }
//     }
    
//     $query = "UPDATE posts SET ";
//     $query.= "post_title = '{$post_title},";
//     $query.= "post_category_id = {$post_category_id},";
//     $query.= "post_date = now(), ";
//     $query.= "post_author = {$post_author},";
//     $query.= "post_status = {$post_status},";
//     $query.= "post_tags = {$post_tags},";
//     $query.= "post_content = {$post_content},";
//     $query.= "post_image = '{$post_image}' ";
//     $query.= "WHERE post_id = {$get_post_id} ";
    
//     $update_post = mysqli_query($connection, $query);
//     confirmPosts($create_post);
// }






?>
</select>

    </div>
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="user_email"/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="user_password"/>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
    </div>
    
    
</form>
