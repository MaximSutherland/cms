<?php 
   if (isset($_GET['edit'])) {
    $the_comment_id = $_GET['edit'];

    $select_comment_query = "SELECT * FROM comments 
        WHERE comment_id = $the_comment_id";

    $select_comment = mysqli_query($connection, $select_comment_query);

    $row = mysqli_fetch_assoc($select_comment);
    //$comment_post_id = $row['comment_post_id'];

    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_status = $row['comment_status'];
    $comment_content = $row['comment_content'];

}

// update the post data in the database
if (isset($_POST['update_comment'])) {
    $comment_author = $_POST['comment_author'];
    $comment_email = mysqli_escape_string($connection, $_POST['comment_email']);
    $comment_status = $_POST['comment_status'];
    $comment_content = mysqli_escape_string($connection, $_POST['comment_content']);
    $comment_date =  date('Y-m-d');

    $update_query = "UPDATE comments SET 
        comment_author = '{$comment_author}', 
        comment_email = '{$comment_email}', 
        comment_status = '{$comment_status}', 
        comment_content = '{$comment_content}', 
        comment_date = '{$comment_date} ' 
        WHERE comment_id = {$the_comment_id}";

    $update_post = mysqli_query($connection, $update_query);

    ConfirmQuery($update_post);

    echo "<h4>Comment Edited: <a href='comments.php'>View Comments</a></h4>";
}
?>

<!-- Edit Comment Form -->
<form action="" method="post" enctype="multipart/form-data">

    <!-- Comment Author -->
    <div class="form-group">
        <label for="comment_author">Comment Author</label>
        <input type="text" name="comment_author" class="form-control" value="<?php echo "$comment_author"; ?>">
    </div>

    <!-- Comment Email-->    
    <div class="form-group">
        <label for="comment_email">In Response</label>
        <input type="text" name="comment_email" class="form-control" value="<?php echo "$comment_email"; ?>">
    </div>

    <!-- Comment In Response -->

    <!-- Comment Status -->
    <div class="form-group">
        <label for="comment_status">Post Status</label>
        <select name="comment_status" class="form-control" id="edit_status">
            <option value='Approved'>Approved</option>
            <option value="Unapproved">Unapproved</option>
        </select>
        <script>
            changeDropdown("edit_status", "<?php echo $comment_status; ?>");
        </script>
    </div>

    <!-- Comment Content -->
    <div class="form-group">
        <label for="comment_content">Comment Content</label>
        <textarea name="comment_content" class="form-control" cols="30" rows="10"><?php echo "$comment_content"; ?></textarea>
    </div>

    <input type="submit" name="update_comment" value="Update Comment" class="btn btn-primary">

</form>