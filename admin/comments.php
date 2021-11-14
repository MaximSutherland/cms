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
                        Comments
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
                        // case editing a comment
                        case 'edit_comment':
                    ?>
                            <!-- Will now say Comments Edit -->
                            <script>
                                Edit_Page();
                            </script>
                    <?php
                            include "includes/edit_comment.php";
                            break;
                        default:
                            include "includes/view_all_comments.php";
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