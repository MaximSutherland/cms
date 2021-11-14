<?php
// retrieve the data of the post to place in input fields
if (isset($_GET['edit'])) {
    $the_post_id = $_GET['edit'];

    $select_post_query = "SELECT * FROM posts WHERE post_id = $the_post_id";

    $select_post = mysqli_query($connection, $select_post_query);

    $row = mysqli_fetch_assoc($select_post);
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];

}

// update the post data in the database
if (isset($_POST['update_post'])) {
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = intval($_POST['post_category']);
    $post_status = $_POST['status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];;

    $post_tags = $_POST['tags'];
    $post_content = mysqli_escape_string($connection, $_POST['content']);
    $post_date =  date('Y-m-d');

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
        $select_image = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($select_image);
        $post_image = $row['post_image'];
    }

    $update_query = "UPDATE posts SET ";
    $update_query .= "post_title = '{$post_title}', ";
    $update_query .= "post_category_id = {$post_category_id}, ";
    $update_query .= "post_date = '{$post_date}', ";
    $update_query .= "post_author = '{$post_author}', ";
    $update_query .= "post_status = '{$post_status}', ";
    $update_query .= "post_tags = '{$post_tags}', ";
    $update_query .= "post_content = '{$post_content}', ";
    $update_query .= "post_image = '{$post_image}' ";
    $update_query .= "WHERE post_id = {$the_post_id}";

    $update_post = mysqli_query($connection, $update_query);

    ConfirmQuery($update_post);

    echo "<h4>Post Edited: <a href='posts.php'>View Posts</a></h4>";
}
?>

<!-- Edit Form -->
<form action="" method="post" enctype="multipart/form-data">

    <!-- Post Title -->
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo "$post_title"; ?>">
    </div>

    <!-- Post Category Id -->
    <div class="form-group">
        <label for="post_category">Post Category</label>
        <select name="post_category" id="post_category" class="form-control">

            <?php // get all categories
            $select_cats_query = "SELECT * FROM categories";

            $select_categories = mysqli_query($connection, $select_cats_query);

            ConfirmQuery($select_categories);

            // update categories in the table
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
            ?>
        
        </select>
        
        <script>
            // Select the current category for the post
            changeDropdown("post_category", "<?php echo $post_category_id; ?>");
        </script>

    </div>

    <!-- Post Author -->
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" name="author" class="form-control" value="<?php echo "$post_author"; ?>">
    </div>

    <!-- Post Status -->
    <div class="form-group">
        <label for="status">Post Status</label>
        <select name="status" class="form-control" id="edit_status">
            <option value='Draft'>Draft</option>
            <option value="Published">Published</option>
        </select>
        <script>
            changeDropdown("edit_status", "<?php echo $post_status; ?>");
        </script>

        <!-- <input type="text" name="status" class="form-control" value="<?php //echo "$post_status"; ?>"> -->
    </div>

    <!-- Post Image -->
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image" class="form-control">
        <br>
        <img src="../images/<?php echo "$post_image"; ?>" width="100px" height="100px">
    </div>

    <!-- Post Tags -->
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" name="tags" class="form-control" value="<?php echo "$post_tags"; ?>">
    </div>

    <!-- Post Content -->
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea name="content" class="form-control" cols="30" rows="10"><?php echo "$post_content"; ?></textarea>
    </div>

    <input type="submit" name="update_post" value="Update Post" class="btn btn-primary">

</form>