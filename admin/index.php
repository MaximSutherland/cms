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

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin

                        <small>
                            <?php 
                            echo $_SESSION['username']; 
                            ?>
                        </small>
                    </h1>
                </div>
            </div>
            <!-- /.Page Heading -->

            <?php include "admin_widgets.php"; ?>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Footer -->
<?php include "includes/admin_footer.php"; ?>