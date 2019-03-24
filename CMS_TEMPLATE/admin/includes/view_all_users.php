<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        <th>Admin</th>
        <th>Subscriber</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
<?php                   
//SELECTING ALL USERS FROM TABLE AND DISPLAYING THEM
$query = "SELECT * FROM users";
$view_all_users_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($view_all_users_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname =  $row['user_firstname'];
    $user_lastname =  $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
    $user_role =  $row['user_role'];

    echo "<tr>";
    echo "<td>{$user_id}</td>";
    echo "<td>{$username}</td>";
    echo "<td>{$user_firstname}</td>";
    echo "<td>{$user_lastname}</td>";
    echo "<td>{$user_email}</td>";
    echo "<td>{$user_role}</td>";
    echo "<td><a class='btn btn-primary' href='users.php?change_to_admin={$user_id}'><i class='fa fa-user'</a></td>";
    echo "<td><a class='btn btn-success' href='users.php?change_to_sub={$user_id}'><i class='fa fa-user'</td>";
    echo "<td><a class='btn btn-warning 'href='users.php?source=edit_user&edit_user={$user_id}'><i class='fa fa-edit'></i></a></td>";
    echo "<td><a style='margin: auto;' class='btn btn-danger text-center' href='users.php?delete={$user_id}'><i class='fa fa-trash'></i></a></td>";
    echo "</tr>";
}
                             
?>                                
                 
    </tbody>
</table>
                        
<?php

//CHANGING USER_ROLE TO ADMIN
if(isset($_GET['change_to_admin'])){
    $the_user_id = $_GET['change_to_admin'];
    
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id ";
    $admin_query = mysqli_query($connection, $query);
     header("Location: users.php");

}

//CHANGING USER_ROLE TO SUBSCRIBER
if(isset($_GET['change_to_sub'])){
    $the_user_id = $_GET['change_to_sub'];
    
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";
    $sub_query = mysqli_query($connection, $query);
     header("Location: users.php");

}


//DELETING USERS

if(isset($_GET['delete'])){
    if(isset($_SESSION['user_role'])){
    if($_SESSION['user_role'] == 'admin') {    
    
    $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
    
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_user_query = mysqli_query($connection, $query);
    }
    }
 header("Location: users.php");
}
?>