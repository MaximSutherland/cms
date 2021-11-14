<!-- Header -->
<?php include "includes/admin_header.php"; ?>

<!-- wrapper -->
<div id="wrapper">

    <!-- Top Navigation Bar -->
    <?php include "includes/admin_top_navigation.php"; ?>

    <!-- side Navigation Bar -->
    <?php include "includes/admin_side_navigation.php"; ?>

    <!-- page-wrapper -->
    <div id="page-wrapper">

        <!-- /container-fluid -->
        <div class="container-fluid">

            <!-- row -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Posts
                        <small id="page_purpose">Author</small>
                    </h1>

                    <!-- Post Table -->
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    
                    switch ($source) {
                        // case adding a new post
                        case 'add_post':
                    ?>
                            <!-- Will now say Posts Create -->
                            <script>Add_Page();</script>
                    <?php
                            include "includes/add_post.php";
                            break;
                        // case editing a post
                        case 'edit_post':
                    ?>
                            <!-- Will now say Posts Edit -->
                            <script>Edit_Page();</script>
                    <?php
                            include "includes/edit_post.php";
                            break;
                        default:
                            include "includes/view_all_posts.php";
                            break;
                    }
                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Footer -->
<?php include "includes/admin_footer.php"; ?>