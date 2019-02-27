 <?php 
if(isset($_POST['create_post'])) {
  
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date(d-m-y);
    // $post_comment_count = 4;
  
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";

    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') ";
    
    
    $create_post_query = mysqli_query($connection, $query);
    
    
    confirmPosts($create_post_query);
    
    $get_post_id = mysqli_insert_id($connection);
     echo   "<div class='alert alert-success'>
  <strong>Post Added!</strong><p><a href='/CMS_TEMPLATE/post.php?p_id={$get_post_id}'>View Post</a> or <a href='admin_posts.php'>Edit more posts</a>
</div>";
}


?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="post_title" class="form-control"/>
    </div>
     <div class="form-group">
        <select name="post_category" id="post_category">

<?php
$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection, $query);

confirmPosts($select_categories);
while($row = mysqli_fetch_assoc($select_categories)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];


echo "<option value='$cat_id'>$cat_title</option>";

}

?>        
</select>

    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name="post_author" class="form-control"/>
    </div>
    <div class="form-group">
     <select name="post_status" id="">
         <option value="draft">Select Options</option>
         <option value="published">Published</option>
         <option value="draft">Draft</option>
     </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image"/>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags"/>
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" id="body" cols="30" rows="10" name="post_content"></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
    
    
</form>
