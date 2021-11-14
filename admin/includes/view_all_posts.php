<!-- Post Table -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comment Count</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $select_posts_query = "SELECT * FROM posts";

        $select_posts = mysqli_query($connection, $select_posts_query);

        while ($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];

            echo "<tr>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_title}</td>";

            // Display category title rather than the ID
            $cat_query = "SELECT * FROM categories ";
            $cat_query .= "WHERE cat_id = {$post_category_id}";

            $categories = mysqli_query($connection, $cat_query);

            $row = mysqli_fetch_assoc($categories);
           
            $cat_title = $row['cat_title'];

            echo "<td>{$cat_title}</td>";
        
            // category end

            echo "<td>{$post_status}</td>";

            // handle post image
            echo "<td style='text-align:center;'>
                <img src='../images/{$post_image}'
                style='border-radius:5px;
                    width:150px; 
                    height:150px;'
                </td>";

            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_date}</td>";
            
            // Edit link
            echo "<td>
                <a href='posts.php?source=edit_post&edit={$post_id}'>
                Edit
                </a>
                </td>";
            
            // Delete Link
            echo "<td>
                <a href='posts.php?delete={$post_id}'>
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
    if (isset($_GET['delete'])) {
        $the_post_id = $_GET['delete'];

        $delete_query = "DELETE FROM posts WHERE post_id = {$the_post_id}";

        $delete_post = mysqli_query($connection, $delete_query);

        ConfirmQuery($delete_post);

        header("Location: posts.php");
    }
?>