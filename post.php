<!-- Connection -->
<?php include "includes/db.php"; ?>

<!-- Header -->
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- Retrieve post information from database -->
            <?php
            if (isset($_GET['p_id'])) {
                $post_id = $_GET['p_id'];
                $query = "SELECT * FROM posts WHERE post_id = '{$post_id}'";
                $query_select_post = mysqli_query($connection, $query);

                // start while get post data
                $row = mysqli_fetch_assoc($query_select_post);
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
            }


            ?>

            <h1 class="page-header">
                User Post
                <small>Have a nice read</small>
            </h1>

            <!-- Blog Post -->
            <h2>
                <?php echo $post_title; ?>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
            <hr>
            <img class="img-responsive post_image" src="images\<?php echo $post_image; ?>" alt="">
            <hr>
            <p><?php echo $post_content; ?></p>
            <!-- End of Blog Post -->

            <hr>

            <?php

            include "comment_section.php";
            ?>



        </div>

        <!-- Sidebar -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->
    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>