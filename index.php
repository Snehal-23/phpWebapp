<?php 
include "includes/header.php";
?>
<?php 
include "includes/db.php";
?>





    <!-- Navigation -->
    
<?php 
include "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header" style="margin: 20px 0 20px;">
                    Brag About Blog
                    <small>because your words matter.</small>
                </h1>

                <!-- First Blog Post -->
                <?php 
                $query="select * from posts where post_status='published' ";
                $posts=mysqli_query($connection,$query);
                
                while($row=mysqli_fetch_assoc($posts)){
                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_content=substr($row['post_content'],0,320 );
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_category_id=$row['post_category_id'];
                    $post_status=$row['post_status'];


                ?>
                                    <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a>
                </p>
                
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?> Category:  
                <?php 
                $cate_query="SELECT cat_title FROM category WHERE cat_id={$post_category_id}";
                $post_category=mysqli_query($connection,$cate_query);
                while($row=mysqli_fetch_assoc($post_category)){
                    echo($row['cat_title']) ;
                } ?></p>
                <!-- <hr> -->
                <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image ?>" alt="" style="width: 100%; height:300px"></a>
                <hr>
                <p><?php echo $post_content ?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
                    
                   
                <hr>  
                <?php 
                }
                ?>
               

               

                <!-- Pager -->
<!--             
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
-->

            </div>

            <!-- Blog Sidebar Widgets Column -->
           
                <?php 
include "includes/sidebar.php";
?>
        
            
        </div>
        <!-- /.row -->

        <hr>
<?php 
include "includes/footer.php";
?>

