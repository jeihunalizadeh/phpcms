<?php 

//DISPLAYING USER FROM DB
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

?>

<?php

// UPDATING USERS
    if(isset($_POST['edit_user'])){

    $username = $_POST['username'];
    $user_firstname =  $_POST['user_firstname'];
    $user_lastname =  $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_role =  $_POST['user_role'];
    

    if(!empty($user_password)){
        $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
        $get_user_query = mysqli_query($connection, $query_password);
        confirmPosts($get_user_query);
        $row = mysqli_fetch_array($get_user_query);
        $db_user_password= $row['user_password'];
    
    
    if($db_user_password != $user_password) {
      $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12) );
    }
    
    $query = "UPDATE users SET ";
    $query.= "username = '{$username}', ";
    $query.= "user_firstname = '{$user_firstname}', ";
    $query.= "user_lastname = '{$user_lastname}', ";
    $query.= "user_email= '{$user_email}', ";
    $query.= "user_password ='{$hashed_password}', ";
    $query.= "user_role ='{$user_role}' ";
    $query.= "WHERE user_id = {$the_user_id} ";
    
    $edit_user_query = mysqli_query($connection, $query);
    confirmPosts($edit_user_query);

    echo "<div class='alert alert-success'><h5>User Updated Succesfully!</h5></div>'";
} 
        
    }
} else {
    header("Location: index.php");
}

?>
<form action="" method="post" enctype="multipart/form-data">
 <div class="form-row">  
    
    <div class="form-group col-md-6">
        <label for="user_firstname">Firstname</label>
        <input type="text" value="<?php echo $user_firstname; ?>" name="user_firstname" class="form-control"/>
    </div>
   
    <div class="form-group col-md-6">
        <label for="user_lastname">Lastname</label>
        <input type="text" value="<?php echo $user_lastname; ?>" name="user_lastname" class="form-control"/>
    </div>
    
    <div class="form-group col-md-6">
        <label for="username">Username</label>
        <input type="text" value="<?php echo $username; ?>" name="username" class="form-control"/>
    </div>
    
    <div class="form-group col-md-6">
        <label for="user_role">User Role</label>
        <select name="user_role" class='form-control' id="post_category">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
<?php
    if($user_role == 'admin') {
         echo  "<option value='subscriber'>subscriber</option>";
    } else {
        echo   "<option value='admin'>admin</option>";

    }

         
?>            
       
        </select>

    </div>
 
    <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email"/>
    </div>
    
    <div class="form-group col-md-6">
        <label for="password">Password</label>
        <input autocomplete="off" type="password" class="form-control" name="user_password"/>
    </div>
    <div class="form-group col-md-3">
        <input class="btn btn-warning" type="submit" name="edit_user" value="Edit User">
    </div>
    
</div>  
</form>
