<!-- Post Table -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <!-- <th>Password</th> -->
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <!-- <th>RandSalt</th> -->
            <th>Change to Admin</th>
            <th>Change to Subscriber</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $select_users_query = "SELECT * FROM users";

        $select_users = mysqli_query($connection, $select_users_query);

        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $email = $row['email'];
            $user_image = $row['user_image'];
            $role = $row['role'];
            $randSalt = $row['randSalt'];

            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            // echo "<td>{$user_password}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$email}</td>";

            // handle user image
            echo "<td style='text-align:center;'>
                <img src='../images/{$user_image}'
                style='border-radius:5px;
                    width:150px; 
                    height:150px;'
                </td>";

            echo "<td>{$role}</td>";
            // echo "<td>{$randSalt}</td>";

            // Change to Admin
            echo "<td>
                <a href='users.php?change_to_admin={$user_id}'>
                Admin
                </a>
                </td>";
            
            // Change to Subscriber
            echo "<td>
                <a href='users.php?change_to_sub={$user_id}'>
                Subscriber
                </a>
                </td>";
            
            // Edit link
            echo "<td>
                <a href='users.php?source=edit_user&edit={$user_id}'>
                Edit
                </a>
                </td>";
            
            // Delete Link
            echo "<td>
                <a href='users.php?delete={$user_id}'>
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

// Change user role to Admin
if (isset($_GET['change_to_admin']) 
    && strtolower($role) !== 'admin') 
{
    $the_user_id = $_GET['change_to_admin'];

    $update_admin_query = "UPDATE users 
        SET role = 'Admin'
        WHERE user_id = {$the_user_id}";

    $change_to_admin = mysqli_query($connection, $update_admin_query);

    ConfirmQuery($change_to_admin);

    header("Location: users.php");
}

// Change user role to Subscriber
if (isset($_GET['change_to_sub']) 
    && strtolower($role) !== 'subscriber') 
    {
    $the_user_id = $_GET['change_to_sub'];

    $update_sub_query = "UPDATE users 
        SET role = 'Subscriber'
        WHERE user_id = {$the_user_id}";

    $change_to_sub = mysqli_query($connection, $update_sub_query);

    ConfirmQuery($change_to_sub);

    header("Location: users.php");
}
    // Delete User
    if (isset($_GET['delete'])) {
        $the_user_id = $_GET['delete'];

        $delete_query = "DELETE FROM users WHERE user_id = {$user_id}";

        $delete_post = mysqli_query($connection, $delete_query);

        ConfirmQuery($delete_post);

        header("Location: users.php");
    }
?>