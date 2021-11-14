<!-- Row -->
<div class="row">

    <!-- Posts -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php
                        // select all posts
                        $posts_query = "SELECT * FROM posts";
                        $select_all_posts = mysqli_query($connection, $posts_query);
                        // get the count of posts
                        $posts_count = mysqli_num_rows($select_all_posts);
                        // echo count
                        echo "<div class='huge'>{$posts_count}</div>"
                        ?>

                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!-- \.Posts -->

    <!-- Comments -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php
                        // select all comments
                        $comments_query = "SELECT * FROM comments";
                        $select_all_comments = mysqli_query($connection, $comments_query);
                        // get the count of comments
                        $comments_count = mysqli_num_rows($select_all_comments);
                        // echo count
                        echo "<div class='huge'>{$comments_count}</div>"
                        ?>

                        <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!-- \.Comments -->

    <!-- Users -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php
                        // select all users
                        $users_query = "SELECT * FROM users";
                        $select_all_users = mysqli_query($connection, $users_query);
                        // get the count of users
                        $users_count = mysqli_num_rows($select_all_users);
                        // echo count
                        echo "<div class='huge'>{$users_count}</div>"
                        ?>

                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!-- \.Users -->

    <!-- Categories -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php
                        // select all categories
                        $categories_query = "SELECT * FROM categories";
                        $select_all_categories = mysqli_query($connection, $categories_query);
                        // get the count of categories
                        $categories_count = mysqli_num_rows($select_all_categories);
                        // echo count
                        echo "<div class='huge'>{$categories_count}</div>"
                        ?>

                        <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!-- \.Categories -->

</div>
<!-- /.row -->

<?php 
// select all draft posts
$draft_posts_query = "SELECT * FROM posts WHERE post_status = 'Draft'";
$select_all_draft_posts = mysqli_query($connection, $draft_posts_query);
// get the count of draft posts
$draft_posts_count = mysqli_num_rows($select_all_draft_posts);

// select all unapproved comments
$unapproved_comments_query = "SELECT * FROM comments WHERE comment_status = 'Unapproved'";
$select_all_unapproved_comments = mysqli_query($connection, $unapproved_comments_query);
// get the count of unapproved comments
$unapproved_comments_count = mysqli_num_rows($select_all_unapproved_comments);

// select all subscribed users
$sub_users_query = "SELECT * FROM users WHERE role = 'Subscriber'";
$select_all_sub_users = mysqli_query($connection, $sub_users_query);
// get the count of subscribed users
$sub_users_count = mysqli_num_rows($select_all_sub_users);

?>


<div class="row">
    <!-- Scripts for Material Column Charts -->
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['bar']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Data', 'Count'],

                <?php 
                // bar labels
                $element_text = ['Active Posts', 'Draft Posts', 
                    'Comments', 'Pending Comments',
                    'Users', 'Subscribers',
                    'Categories'];
                
                // counts
                $element_count = [$posts_count, $draft_posts_count,
                    $comments_count, $unapproved_comments_count,
                    $users_count, $sub_users_count,
                    $categories_count];

                // number of bars needed
                $count = count($element_text);

                for ($i = 0; $i < $count; ++$i) {
                    // ['Bar label', number]
                    $echo_val = "['{$element_text[$i]}', {$element_count[$i]}]";
                    // if index is not the last concat , at the end
                    if ($i != $count - 1) {
                        $echo_val .= ",";
                    }
                    // echo bar
                    echo $echo_val;
                }
                ?>
            ]);

            var options = {
                chart: {
                    title: '',
                    subtitle: '',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

    <!-- Draw Chart -->
    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
</div>