
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                
                <ul class="nav navbar-nav">
                <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> categories<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                            <?php 
                            $query="select * from category";
                            $result=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                $cat_title=$row['cat_title'];
                        
                                echo "<li><a href=#>{$cat_title}</a></li>";
                                }
                    
                            ?>
                            </li>
                            
                        </ul>
                    </li>    
                    
                
                    
                    <li>
                        <a href="login.php">login</a>
                    </li>
                    
                    
                    <li>
                        <a href="admin">Admin</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>