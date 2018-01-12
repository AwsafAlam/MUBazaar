<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <li><a target="_blank" style="color: white;font-weight: bold;" href="../index.php"><span style="color: red;">MU</span>Bazaar</a></li>
                <li><a target="_blank"  style="color: white;font-weight: bold;" href="../movies/index.php"><span style="color:red;">MU</span>Movies</a></li>
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['admin_name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        
                        <li class="divider"></li>
                        <li>
                            <a href="includes/admin_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
<!--                    <li>-->
<!--                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>-->
<!--                        <ul id="posts_dropdown" class="collapse">-->
<!--                            <li>-->
<!--                                <a href="posts.php">View all posts</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="posts.php?source=add_post">Add posts</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <li class="active">
                        <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> Add Product</a>
                    </li>
                    
<!--                    <li class="active">-->
<!--                        <a href="review.php"><i class="fa fa-fw fa-file"></i> Product Reviews</a>-->
<!--                    </li>-->
                    
                    <li class="active">
                        <a href="view_customers.php"><i class="fa fa-user"></i> Customers</a>
                    </li>


                    <li class="active">
                        <a href="top_customers.php"><i class="fa fa-user"></i> Top Customers</a>
                    </li>

                    <li class="active">
                        <a href="individual_category.php"><i class="fa fa-user"></i> Products Sale</a>
                    </li>

<!--                    <li class="active">-->
<!--                        <a href="view_polls.php"><i class="	fa fa-bar-chart"></i> View Polls</a>-->
<!--                    </li>-->
<!--                    -->
<!--                    <li class="active">-->
<!--                        <a href="view_contacts.php"><i class="fa fa-comment"></i> Contact</a>-->
<!--                    </li>-->

                    <li class="active">
                        <a href="offers.php"><i class="fa fa-shopping-cart"></i> Offers</a>
                    </li>
                    
<!--                    <li>-->
<!--                        <a href="chat/admin_chat_index.php"><i class="fa fa-wechat"></i> Chat</a>-->
<!--                    </li>-->

                    <li class="active">
                        <a href="orders.php"><i class="fa fa-shopping-cart"></i> Orders</a>
                    </li>

                    <li class="active">
                        <a href="subscribers.php"><i class="fa fa-shopping-cart"></i> Movie Subscriber</a>
                    </li>


                    <li class="active">
                        <a href="customer_email.php"><i class="fa fa-shopping-cart"></i> Email Customers</a>
                    </li>

                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>