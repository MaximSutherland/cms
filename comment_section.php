<!-- Blog Comments -->

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    
    <?php 
    if(isset($_POST['create_comment'])) {
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];
        $comment_date = date('Y-m-d');

        $insert_query = "INSERT INTO comments (comment_post_id,
        comment_author, comment_email, comment_content, comment_status,
        comment_date) ";

        $insert_query .= "VALUES ({$post_id}, '{$comment_author}',
        '{$comment_email}', '{$comment_content}', 'Unapproved', 
        '{$comment_date}')";

        $insert_comment = mysqli_query($connection, $insert_query);

        if (!$insert_comment) {
            die("INSERT_COMMENT QUERY FAILED " . mysqli_error($connection));
        }

        $update_comment_count_query = "UPDATE posts 
            SET post_comment_count = post_comment_count + 1 
            WHERE post_id = {$post_id}";

        $update_comment_count = mysqli_query($connection, $update_comment_count_query);
    }
    ?>

    <form role="form" action="post.php?p_id=<?php echo $post_id; ?>" method="post">

        <div class="form-group">
            <label for="comment_author">Username</label>
            <input type="text" name="comment_author" class="form-control">
        </div>

        <div class="form-group">
            <label for="comment_email">Email</label>
            <input type="email" name="comment_email" class="form-control">
        </div>

        <div class="form-group">
            <label for="comment_content">Your Comment</label>
            <textarea class="form-control" name="comment_content" rows="3"></textarea>
        </div>

        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
    </form>

</div>

<hr>

<!-- Posted Comments -->

<?php 


$get_all_post_comments_query = "SELECT * FROM comments 
    WHERE comment_post_id = '{$post_id}'
    AND comment_status = 'Approved'
    ORDER BY comment_id DESC";

$get_all_post_comments = mysqli_query($connection, $get_all_post_comments_query);

if (!$get_all_post_comments) {
    die("GET_ALL_POST_COMMENTS QUERY FAILED " . mysqli_error($connection));
}

// open while
while($row = mysqli_fetch_assoc($get_all_post_comments)) {
    $comment_author = $row['comment_author'];
    // $comment_email = $row['comment_email'];
    $comment_content = $row['comment_content']; 
    $comment_date = $row['comment_date'];
?>

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $comment_author; ?>
            <small><?php echo $comment_date; ?></small>
        </h4>
        <!-- <h5><?php echo $comment_email; ?></h5> -->
        <?php echo $comment_content; ?>
    </div>
</div>

<?php
// close while
}
?>

<!-- Comment -->
<!-- <div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. -->
        <!-- Nested Comment -->
        <!-- <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div> -->
        <!-- End Nested Comment -->
    <!-- </div>
</div> -->