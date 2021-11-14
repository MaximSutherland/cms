<!-- Edit Category form -->
<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>

        <?php // EDIT CATEGORY
        if (isset($_GET['edit'])) {
            $update_cat_id = $_GET['edit'];

            $edit_cat_query = "SELECT * FROM categories ";
            $edit_cat_query .= "WHERE cat_id = {$update_cat_id}";

            $edit_categories = mysqli_query($connection, $edit_cat_query);

            // update categories in the table
            $row = mysqli_fetch_assoc($edit_categories);
            $edit_cat_id = $row['cat_id'];
            $edit_cat_title = $row['cat_title'];

        ?>

            <input 
                value="<?php if (isset($edit_cat_title)) { echo $edit_cat_title; } ?>" 
                type="text" name="cat_title" class="form-control"
                id="update_category_field">

        <?php
            
        }
        ?>

        <?php // UPDATE QUERY
        if (isset($_POST['update_submit'])) {
            $update_cat_title = $_POST['cat_title'];

            $update_query = "UPDATE categories SET cat_title = '{$update_cat_title}' ";
            $update_query .= "WHERE cat_id = {$update_cat_id}";

            $update_category = mysqli_query($connection, $update_query);

            ConfirmQuery($update_category);
        ?>
            <!-- Ensure the Edit Category text field has the updated title -->
            <script type="text/javascript">
                // get the updated title
                var new_title = "<?php echo $update_cat_title; ?>";
                // set the fields value to the new title
                document.getElementById("update_category_field").value = new_title;
            </script>

        <?php
        }
        ?>

    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_submit" value="Edit Category">
    </div>

</form>
<!-- \Edit Category form -->