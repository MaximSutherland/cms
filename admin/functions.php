<!-- Helper Functions -->
<script type="text/javascript">
    // Change the small title from Author name to Create
    function Add_Page() {
        document.getElementById("page_purpose").textContent = "CREATE";
    }

    // Change the small title from Author name to Edit
    function Edit_Page() {

        <?php
        // decide what text author should be changed to
        if (isset($_GET['edit'])) {
            $text = "EDIT ID {$_GET['edit']}";
        } else {
            $text = "EDIT UNKNOWN ID?";
        }
        ?>

        // obtain the text
        var new_textContent = "<?php echo $text; ?>";

        // check html elements text content
        document.getElementById("page_purpose").textContent = new_textContent;
    }

    // change dropdown to current option
    function changeDropdown(select_id, current_option) {
        document.getElementById(select_id).value = current_option;
    }
</script>

<?php

function ConfirmQuery($result)
{
    global $connection;

    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}
/* \Helper Functions */

/* Category */
function insert_categories()
{
    global $connection;
    // check data has been submitted
    if (isset($_POST['post_category'])) {
        // get category title
        $post_cat_title = $_POST['cat_title'];

        // check if title is empty if so give warning message
        if ($post_cat_title == "" || empty($post_cat_title)) {
            echo "This field should not be empty";
        } else {
            // query database with an INSERT
            $insert_query = "INSERT INTO categories(cat_title) ";
            $insert_query .= "VALUE('{$post_cat_title}')";

            // insert new category
            $create_category_query = mysqli_query($connection, $insert_query);

            ConfirmQuery($create_category_query);
        }
    }
}


function find_all_categories()
{
    global $connection;
    $select_cat_query = "SELECT * FROM categories";

    $select_categories = mysqli_query($connection, $select_cat_query);

    // display categories in the table
    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function delete_category()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $get_cat_id = $_GET['delete'];

        $delete_query = "DELETE FROM categories ";
        $delete_query .= "WHERE cat_id = {$get_cat_id}";

        $delete_category = mysqli_query($connection, $delete_query);

        ConfirmQuery($delete_category);

        // refresh page
        header("Location: categories.php");
    }
}
/* \Category */
?>