<!-- Post Table -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $select_comments_query = "SELECT * FROM comments";

        $select_comments = mysqli_query($connection, $select_comments_query);

        while ($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];

            echo "<tr>";

            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";

            // post title -----------
            $get_post_title_query = "SELECT post_title FROM posts ";
            $get_post_title_query .= "WHERE post_id = $comment_post_id";

            $get_post_title = mysqli_query($connection, $get_post_title_query);

            ConfirmQuery($get_post_title);

            $post_title_row = mysqli_fetch_assoc($get_post_title);
            $the_post_title = $post_title_row['post_title'];

            echo "<td><a href='../post.php?p_id=$comment_post_id'>{$the_post_title}</a></td>";
            // post title end -------------

            echo "<td>{$comment_date}</td>";
            
            // Approve
            echo "<td>
                <a href='comments.php?approve={$comment_id}'>
                Approve
                </a>
                </td>";
            
            // Unapprove
            echo "<td>
                <a href='comments.php?unapprove={$comment_id}'>
                Unapprove
                </a>
                </td>";

            // Edit link
            echo "<td>
                <a href='comments.php?source=edit_comment&edit={$comment_id}'>
                Edit
                </a>
                </td>";
            
            // Delete Link
            echo "<td>
                <a href='comments.php?delete={$comment_id}'>
                Delete
                </a>
                </td>";

            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<!-- Post Table -->

<?php
    // Approve comment
    if (isset($_GET['approve']) && strtolower($comment_status) !== 'approved') {
        $the_comment_id = $_GET['approve'];

        $update_approve_query = "UPDATE comments 
            SET comment_status = 'Approved'
            WHERE comment_id = {$the_comment_id}";

        $approve_comment = mysqli_query($connection, $update_approve_query);

        ConfirmQuery($approve_comment);

        header("Location: comments.php");
    }

    // Unapprove Comment
    if (isset($_GET['unapprove']) && strtolower($comment_status) !== 'unapproved') {
        $the_comment_id = $_GET['unapprove'];

        $update_unapprove_query = "UPDATE comments 
            SET comment_status = 'Unapproved'
            WHERE comment_id = {$the_comment_id}";

        $unapprove_comment = mysqli_query($connection, $update_unapprove_query);

        ConfirmQuery($unapprove_comment);

        header("Location: comments.php");
    }

    // Delete Comment
    if (isset($_GET['delete'])) {
        $the_comment_id = $_GET['delete'];

        $delete_query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";

        $delete_comment = mysqli_query($connection, $delete_query);

        ConfirmQuery($delete_comment);

        $update_comment_count_query = "UPDATE posts 
            SET post_comment_count = post_comment_count - 1 
            WHERE post_id = {$comment_post_id}";

        $update_comment_count = mysqli_query($connection, $update_comment_count_query);
        
        ConfirmQuery($update_comment_count);

        header("Location: comments.php");
    }
?>