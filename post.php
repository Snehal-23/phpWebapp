
 <?php include "includes/header.php";?>
<?php include "includes/db.php";?>





    <!-- Navigation -->
    
<?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

                
                <!-- First Blog Post -->
                <?php 

                if(isset($_GET['p_id'])){

                $the_post_id=$_GET['p_id'];

                $view="UPDATE posts SET post_views=post_views+1 WHERE post_id=$the_post_id";
                $view_query=mysqli_query($connection,$view);
                
                $query="select * from posts where post_id=$the_post_id";
                $posts_select=mysqli_query($connection,$query);
                
                while($row=mysqli_fetch_assoc($posts_select)){
                    $post_title=$row['post_title'];
                    $sec_title=$row['sec_title'];
                    $post_author=$row['post_author'];
                    $post_content=$row['post_content'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_category_id=$row['post_category_id'];
                    
                ?>
                
                <h2 class="text-center">
                    <a href="#" ><?php echo $post_title ?></a>
                </h2>
                <h4 class="text-center">
                    <?php echo $sec_title ?>
                </h4>
                
                
                <!-- <hr> -->
                <div class="container"><img class="img-responsive" src="images/<?php echo $post_image ?>" alt="" style="width: 100%; height:600px"></div>
                <hr>

                <p class="text-center"><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?> Category:  <a href="category.php?category=<?php echo $post_category_id ;?>">
                <?php 
                $cate_query="SELECT cat_title FROM category WHERE cat_id={$post_category_id}";
                $post_category=mysqli_query($connection,$cate_query);
                while($row=mysqli_fetch_assoc($post_category)){
                    echo($row['cat_title']) ;
                } 

                ?></a></p>

                <p><?php echo $post_content ?></p>
                <p class="lead  text-center">
                    <a href="#"><?php echo $post_author ?></a>
                </p>
                                    
                   
                <hr>  
                <?php }
                }
                ?>
               

               

<!-- Blog Comments -->

<?php 

    if(isset($_POST['create_comment'])) {

        $the_post_id = $_GET['p_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];


        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {


            $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status,comment_date)";

            $query .= "VALUES ($the_post_id ,'{$comment_author}', '{$comment_email}', '{$comment_content }', 'approved',now())";

            $create_comment_query = mysqli_query($connection, $query);

            if (!$create_comment_query) {
                die('QUERY FAILED' . mysqli_error($connection));


            }
            $count_query="Update posts set post_comment_count=post_comment_count+1 where post_id=$the_post_id";
            $res=mysqli_query($connection,$count_query);

        }


    }




?> 


                <!-- Posted Comments -->



        <!-- Comments Form -->
        <div class="well">



            <h4>Leave a Comment:</h4>
            <form action="#" method="post" role="form">

                <div class="form-group">
                    <label for="Author">Author</label>
                    <input type="text" name="comment_author" class="form-control" name="comment_author">
                </div>

                <div class="form-group">
                    <label for="Author">Email</label>
                    <input type="email" name="comment_email" class="form-control" name="comment_email">
                </div>

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <hr>
                
                 <?php 


            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($connection, $query);
           
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_author'];
                
                ?>
                
                
                           <!-- Comment -->
                <div class="media">
                     
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;   ?>
                            <small><?php echo $comment_date;   ?></small>
                        </h4>
                        
                        <?php echo $comment_content;   ?>
 
                    </div>
                </div>
     
                
  

           <?php } 
           // else{
           //  header("Location: comments.php");
           // }  
                ?>
           
  

            </div>




















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

                 <!-- Blog Sidebar Widgets Column -->

        
            
        </div>
</div>

<hr>
<?php include "includes/footer.php";?>

               