
<?php include "includes/admin_header.php";?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                            <small>Genre</small>
                        </h1>
                       
                    </div>
                        
                        <div class="col-xs-6">
                        <?php 
                           
                         if(isset($_POST['submit'])){

                                $cat_title = $_POST['cat_title'];

                                            if($cat_title == "" || empty($cat_title)) {
                                            
                                                 echo "This Field should not be empty";
                                        
                                        } else {






                                        $cat_add="INSERT INTO category(cat_title) VALUES('{$cat_title}') ";
                                        $cat_add_res = mysqli_query($connection,$cat_add);


                                        if(!$cat_add_res) {
                                        die('QUERY FAILED'. mysqli_error($connection));
                                        


                                        
                                             }
                                         }}

                        ?>

                        <form  action="" method="post">

                            <div class="form-group">
                            <input type="text" name="cat_title" placeholder="Add category" class="form-control" required></div>
                            <div class="form-group">
                            <input type="submit" name="submit" value="Add Category" class="btn btn-primary"></div>
                        </form>
                        

                        </div>
                        <div class="col-xs-6">


                            <?php  $query="select * from category";
                            $select_cat=mysqli_query($connection,$query);
                            ?>


                            <table class="table table-bordered table-hover">

                                <thead>
                                    <tr><th>Id</th>
                                        <th>Category title</th><tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select_cat)){
                                        $cat_id=$row['cat_id'];   
                                        $cat_title=$row['cat_title'];
                                        
                                        echo "<tr>";
                                        echo "<td>";
                                        echo "{$cat_id}";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "{$cat_title}";
                                         echo "</td>";
                                        echo "</tr>";
                                        }

                                        ?>
                                 

                                </tbody>
                            </table>   
                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php";?> 

