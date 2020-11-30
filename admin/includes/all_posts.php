<?php


include("delete_modal.php");

if(isset($_POST['checkBoxArray'])) {


    
    foreach($_POST['checkBoxArray'] as $postValueId ){
        
  $bulk_options = $_POST['bulk_options'];
        
        switch($bulk_options) {
        case 'published':
        
$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";
        
 $update_to_published_status = mysqli_query($connection,$query);       
confirmQuery($update_to_published_status);


            
         break;
            
            
              case 'draft':
        
$query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";
        
 $update_to_draft_status = mysqli_query($connection,$query);
            
confirmQuery($update_to_draft_status);




            
            
         break;
            
  
            
               case 'delete':
        
$query = "DELETE FROM posts WHERE post_id = {$postValueId}  ";
        
 $update_to_delete_status = mysqli_query($connection,$query);
            
confirmQuery($update_to_delete_status);

            
            
         break;


            case 'clone':


            $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
            $select_post_query = mysqli_query($connection, $query);


          
            while ($row = mysqli_fetch_array($select_post_query)) {
            $post_title         = $row['post_title'];
            $post_category_id   = $row['post_category_id'];
            $post_date          = $row['post_date']; 
            $post_author        = $row['post_author'];
            $post_status        = $row['post_status'];
            $post_image         = $row['post_image'] ; 
            $post_tags          = $row['post_tags']; 
            $post_content       = $row['post_content'];

          }

                 
      $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";
             
      $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') "; 

                $copy_query = mysqli_query($connection, $query);   

               if(!$copy_query ) {

                die("QUERY FAILED" . mysqli_error($connection));
               }   
                 
                 break;

  
        
        }
    
    
    } 



}




?>

                         <?php  $query="select * from posts";
                            $select_posts=mysqli_query($connection,$query);
                            ?>
                    <table class='table table-hover'>
                        <thead>
                            <!-- <th>Post id</th> -->
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Image</th>
                            <!-- <th>Post content</th> -->
                            <th>Tags</th>
                            <th>Status</th>
                            <th>Comments</th>

                            <th>Views</th>
                            <th>Delete</th>
                            <th>Edit</th>
                            
                            
                            
                            
                            
                        </thead>
                        <tbody>
                            
                        </tbody>
                        <?php
                                        while($row=mysqli_fetch_assoc($select_posts)){
                                        $post_id=$row['post_id'];
                                        $post_title=$row['post_title']; 
                                        $sec_title=$row['sec_title'];    
                                        $post_author=$row['post_author'];
                                        $post_category_id=$row['post_category_id'];
                                        $post_date=$row['post_date'];
                                        $post_image=$row['post_image'];
                                        $post_content=$row['post_content'];
                                        $post_tags=$row['post_tags'];
                                        $post_status=$row['post_status'];
                                        $post_comment_count=$row['post_comment_count'];
                                        $post_views=$row['post_views'];
                                        $cate_query="SELECT cat_title FROM category WHERE cat_id={$post_category_id}";
                                        $post_category=mysqli_query($connection,$cate_query);

                                        echo "<tr>";
                                        // echo "<td>";
                                        // echo "{$post_id}";
                                        // echo "</td>";
                                        echo "<td>";
                                        echo "<a href=../post.php?p_id={$post_id}>";
                                        echo "{$post_title}";
                                        echo "</a></td>";
                                        echo "<td>";
                                        echo "{$post_author}";
                                         echo "</td>";
                                         echo "<td>";

                
                                        while($row=mysqli_fetch_assoc($post_category)){
                                        echo($row['cat_title']) ;
                                            } 

                                         echo "</td>";
                                         echo "<td>";
                                        echo "{$post_date}";
                                         echo "</td> ";
                                         echo "<td><img class='img-responsive' src='../images/$post_image' alt='' style='width: 100px; height:100px'> </td>";
                                         echo "<td>";
                                        echo "{$post_tags}";
                                         echo "</td>";
                                         echo "<td>";
                                        echo "{$post_status}";
                                         echo "</td>";
                                         echo "<td>";
                                        echo "{$post_comment_count}";
                                         echo "</td>";
                                         
                                         echo "<td>";
                                        echo "{$post_views}";
                                         echo "</td>";

                                          echo "<td>";


                                        echo "<a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='./posts.php?delete={$post_title}' >Delete</a>";
                                     
                                         echo "</td>";
                                         echo "<td>";


                                        echo "<a href='./posts.php?source=edit_post&p_id={$post_id}'>Edit</a>";
                                     
                                         echo "</td>";
                                        echo "</tr>";
                                        }

                                        ?>
                    </table>



<?php 
if(isset($_GET['delete'])){
    $the_post_id=$_GET['delete'];
    $del_query="delete from posts where post_title='{$the_post_id}'";
    $del_post=mysqli_query($connection,$del_query);
    if(!$del_post){
       echo "Failed to delete the post".mysqli_error($connection);}
    
}
?>










