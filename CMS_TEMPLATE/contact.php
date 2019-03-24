

<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php

if(isset($_POST['submit'])){
    $to      = "jeyhun.alizadeh@gmail.com";
    $subject = wordwrap($_POST['subject'], 70);
    $body    = $_POST['body'];
    $header  = "FROM: " .$_POST['email'];
    
    mail($to, $subject, $body, $header);
   

}

?>
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                     <h6 class="text-center"><?php echo $message; ?></h6>
                         <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Enter your subject" />
                        </div>
                         <div class="form-group">
                            <textarea name="body" id="body" class="form-control" rows="10" cols="50"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
