<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <!-- Dashboard -->
        <li>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

        <!-- Posts Dropdown -->
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="posts_dropdown" class="collapse">
                <li>
                    <a href="./posts.php">View All Posts</a>
                </li>
                <li>
                    <a href="./posts.php?source=add_post">Add Post</a>
                </li>
            </ul>
        </li>

        <!-- Categories -->
        <li>
            <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
        </li>

        <!-- Comments -->
        <!-- class="active" -->
        <li>
            <a href="./comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
        </li>

        <!-- Categories Dropdown -->
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#users_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="users_dropdown" class="collapse">
                <li>
                    <a href="./users.php">View All Users</a>
                </li>
                <li>
                    <a href="./users.php?source=add_user">Add Users</a>
                </li>
            </ul>
        </li>
        
        <!-- Profile -->
        <li>
            <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
        </li>

    </ul>
</div>
<!-- /.navbar-collapse -->

</nav>
<!-- /.Navigation -->