 <div class="col-md-4">
<? php include "./admin/functions.php" ;?>
 

























 
                <!-- Blog Search Well -->
                <div class="well">
                    <form action="search.php" method="post"><h4>Blog Search</h4>
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

     
     
     
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                     <?php 
                    $query="select * from category";
                    $result=mysqli_query($connection,$query);
                   
                    
                    ?>
                    
                    <div class="row">
                        <div class="col-lg-8">
                            <ul class="list-unstyled">
                            <?php
                             while($row=mysqli_fetch_assoc($result)){
                            $cat_title=$row['cat_title'];
                            $cat_id=$row['cat_id'];
                        
                                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
                            ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

               <?php include "widget.php"; ?>

            </div>
