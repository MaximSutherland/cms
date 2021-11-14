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
                        Categories
                        <small>Author</small>
                    </h1>

                    <!-- Forms -->
                    <div class="col-xs-6">

                        <?php // ADD CATEGORY
                        insert_categories();
                        ?>

                        <!-- Add Category form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="post_category" value="Add Category">
                            </div>
                        </form>
                        <!-- \Add Category form -->

                        <!-- Edit Category form -->
                        <?php // UPDATE AND INCLUDE QUERY
                        // check if we are editing a category
                        if (isset($_GET['edit'])) {
                            $update_cat_id = $_GET['edit'];
                            include "includes/update_categories.php"; 
                        }
                        
                        ?>
                        <!-- \.Edit Category form -->

                    </div>
                    <!-- \.Forms -->

                    <!-- Table of Categories -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php // FIND ALL CATEGORIES
                                find_all_categories();
                                ?>

                                <?php //DELETE CATEGORY
                                delete_category();
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- \.Table of Categories -->

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