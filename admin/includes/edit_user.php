<?php
// retrieve the data of the post to place in input fields
if (isset($_GET['edit'])) {
    $user_id = $_GET['edit'];

    $select_user_query = "SELECT * FROM users WHERE user_id = $user_id";

    $select_user = mysqli_query($connection, $select_user_query);

    $row = mysqli_fetch_assoc($select_user);
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    
    $email = $row['email'];
    $user_image = $row['user_image'];
    $role = $row['role'];
    $randSalt = $row['randSalt'];

}

// update the post data in the database
if (isset($_POST['update_user'])) {
    $username = $_POST['username'];
    $user_password = $_POST['password'];
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];;

    $role = $_POST['role'];
    //$randSalt =  $_POST['randSalt'];

    move_uploaded_file($user_image_temp, "../images/$user_image");

    if (empty($user_image)) {
        $query = "SELECT * FROM users WHERE user_id = $user_id";
        $select_image = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($select_image);
        $user_image = $row['user_image'];
    }

    $update_query = "UPDATE users SET ";
    $update_query .= "username = '{$username}', ";
    $update_query .= "user_password = '{$user_password}', ";
    $update_query .= "user_firstname = '{$user_firstname}', ";
    $update_query .= "user_lastname = '{$user_lastname}', ";
    $update_query .= "email = '{$email}', ";
    $update_query .= "user_image = '{$user_image}', ";
    $update_query .= "role = '{$role}' ";
    //$update_query .= "randSalt = '{$randSalt}' ";
    $update_query .= "WHERE user_id = {$user_id}";

    $update_user = mysqli_query($connection, $update_query);

    ConfirmQuery($update_user);

    echo "<h4>User Edited: <a href='users.php'>View Users</a></h4>";
}
?>

<!-- Edit Form -->
<form action="" method="post" enctype="multipart/form-data">

    <!-- Username -->
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo "$username"; ?>">
    </div>

    <!-- User Password -->
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" value="<?php echo "$user_password"; ?>">
    </div>

    <!-- User Firstname -->
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" class="form-control" value="<?php echo "$user_firstname"; ?>">
    </div>
    
    <!-- User Lastname -->
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" class="form-control" value="<?php echo "$user_lastname"; ?>">
    </div>

    <!-- User Email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo "$email"; ?>">
    </div>

     <!-- User Image -->
    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" name="image" class="form-control">
        <br>
        <img src="../images/<?php echo "$user_image"; ?>" width="100px" height="100px">
    </div>

    <!-- User Role -->
    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control" id="edit_role">
            <option value='Admin'>Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>
        <script>
            changeDropdown("edit_role", "<?php echo $role; ?>");
        </script>
    </div>

    <input type="submit" name="update_user" value="Update User" class="btn btn-primary">

</form>