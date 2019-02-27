<?php include("includes/admin_header.php"); ?>
<?php
                   
if(isset($_SESSION['username'])){
    
$username =  $_SESSION['username'];
$query = "SELECT * FROM users WHERE username  = '{$username}' ";
$select_user_profile_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_user_profile_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname =  $row['user_firstname'];
    $user_lastname =  $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
    $user_role =  $row['user_role'];
}
}
 
 ?>
  

<?php

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
    $query.= "WHERE username = '{$username}' ";
    
    $edit_user_query = mysqli_query($connection, $query);
    confirmPosts($edit_user_query);







}








?>

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
                            <small><?php echo $username; ?></small>
                        </h1>
<?php 
if(isset($_POST['edit_user'])){
echo "<div class='alert alert-success'>
  <h3 class='text-center'>Profile Updated!</h3>
</div>";
}




?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="user_firstname">Firstname</label>
        <input type="text" value="<?php echo $user_firstname; ?>" name="user_firstname" class="form-control"/>
    </div>
    
    
    <div class="form-group col-md-4">
        <label for="user_lastname">Lastname</label>
        <input type="text" value="<?php echo $user_lastname; ?>" name="user_lastname" class="form-control"/>
    </div>
    
    
    <div class="form-group col-md-4">
        <label for="user_role">User Role</label>
        <select name="user_role" class="form-control" id="post_category">
            <option value="subscriber"><?php echo $user_role; ?></option>
<?php
    if($user_role == 'admin') {
         echo  "<option value='subscriber'>subscriber</option>";
    } else {
        echo   "<option value='admin'>admin</option>";

    }
         
?>            

        </select>

    </div>
    
    
     <div class="form-group col-md-4">
        <label for="username">Username</label>
        <input type="text" value="<?php echo $username; ?>" name="username" class="form-control"/>
    </div>
       

   
    <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email"/>
    </div>
    
    <div class="form-group col-md-4">
        <label for="password">Password</label>
        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password"/>
    </div>
    
    <div class="form-group col-md-6">
           <input class="btn btn-warning" type="submit" name="edit_user" value="Update Profile">

    </div>
    </div>
     
</form>

             
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
