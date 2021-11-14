<?php

if (isset($_POST['create_post'])) {

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = intval($_POST['post_category']);
    $post_status = $_POST['status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];;

    $post_tags = $_POST['tags'];
    $post_content = mysqli_escape_string($connection, $_POST['content']);
    $post_date = date('Y-m-d');
    $post_comment_count = 0;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $insert_query = "INSERT INTO posts(post_category_id, post_title, 
        post_author, post_date, post_image, post_content, post_tags, 
        post_comment_count, post_status) ";

    $insert_query .= "VALUES({$post_category_id}, '{$post_title}', 
        '{$post_author}', '{$post_date}', '{$post_image}', '{$post_content}', 
        '{$post_tags}', {$post_comment_count}, '{$post_status}')";

    $create_post = mysqli_query($connection, $insert_query);

    ConfirmQuery($create_post);

    echo "<h4>Post Created: <a href='posts.php'>View Posts</a></h4>";
}

?>

<!-- create post form -->
<form action="" method="post" enctype="multipart/form-data">

    <!-- Post Title -->
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control">
    </div>

    <!-- Post Category Id -->
    <div class="form-group">
        <label for="category_id">Post Category Id</label>
        <!-- <input type="number" name="category_id" class="form-control"> -->
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
    </div>

    <!-- Post Author -->
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" name="author" class="form-control">
    </div>

    <!-- Post Status -->
    <div class="form-group">
        <label for="status">Post Status</label>
        <select name="status" class="form-control">
            <option value='Draft'>Draft</option>
            <option value="Published">Published</option>
        </select>
        <!-- <input type="text" name="status" class="form-control"> -->
    </div>

    <!-- Post Image -->
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <!-- Post Tags -->
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" name="tags" class="form-control">
    </div>

    <!-- Post Content -->
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <input type="submit" name="create_post" value="Add Post" class="btn btn-primary">

</form>