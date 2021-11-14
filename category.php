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

            <?php
            if (isset($_GET['category'])) {
                $post_category_id = $_GET['category'];

                $get_cat_title_query = "SELECT * FROM categories ";
                $get_cat_title_query .= "WHERE cat_id = $post_category_id";

                $get_cat_title = mysqli_query($connection, $get_cat_title_query);

                if (!$get_cat_title) {
                    die("GET CATEGORY TITLE FAILED " . mysqli_error($connection));
                }

                $row = mysqli_fetch_assoc($get_cat_title);

                $cat_title = $row['cat_title'];
            }
            ?>

            <h1 class="page-header">
                <?php echo $cat_title; ?>
                <small>Category</small>
            </h1>

            <!-- Retrieve post information from database -->
            <?php

            // check how many published posts we have
            $count_published_posts_query = "SELECT COUNT(post_status) 
                FROM posts WHERE post_category_id = $post_category_id 
                AND post_status = 'Published'";

            $count_published_posts = mysqli_query($connection, $count_published_posts_query);

            $count_published_posts = mysqli_fetch_assoc($count_published_posts);

            $count_posts = $count_published_posts["COUNT(post_status)"];

            // if we have no posts
            if ($count_posts <= 0) {
                echo "<h1 style='color:red'>Sorry for the inconvenience</h1>";
                echo "<h2>We have no viewable posts at this time</h2>";
                echo "<h3>There is likely no posts with this category</h3>";
            } else {
                $query = "SELECT * FROM posts 
                    WHERE post_category_id = $post_category_id 
                    AND post_status = 'Published'";

                $query_select_all_posts = mysqli_query($connection, $query);

                // start while get post data
                while ($row = mysqli_fetch_assoc($query_select_all_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 100);
                    if (strlen($post_content) == 100) {
                        $post_content .= "...";
                    }
            ?>

                    <!-- Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?>">
                            <?php echo $post_title; ?>
                        </a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive post_image" src="images\<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <!-- End of Blog Post -->

                    <hr>

            <?php
                }
            }
            // end while get post data
            ?>

        </div>

        <!-- Sidebar -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->
    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>