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
                        
                        <div class="col-xs-6">
                            <?php
                         insertCategories();
                            ?>
                            <form method="post">
                                 <div class="form-group">
                                     <label for="cat-title">Add Category</label>
                                     <input class="form-control" type="text" name="cat_title"/>
                                 </div> 
                                 <div class="form-group">
                                     <input class="btn btn-primary" type="submit" name="submit" value="Add Category"/>
                                 </div>
                            </form>
                            <?php ///edit and update query
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                include("includes/admin_edit_category.php");
                            }
                            
                            
                            
                            ?>
                        </div>
                        
                        <div class="col-xs-6">
                            
                    
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Category Title
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                            
                                    <?php
                                    // READ AND CREATE CATEGORY
                                findAllCategories();
                                 ?>
                                 
                                 <?php // DELETE QUERY
                                  deleteCategories();
                                   
                                   ?>
                                </tbody>
                               
                            </table>
                        </div>
                        
                       
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
