<!-- Header -->
<?php include "includes/admin_header.php"; ?>

<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    $query = "SELECT * FROM users WHERE username = '{$username}'";

    $select_user_profile_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $email = $row['email'];
        $user_image = $row['user_image'];
        $role = $row['role'];
        $randSalt = $row['randSalt'];
    }
}

// update the users data in the database
if (isset($_POST['update_profile'])) {
    $the_username = $_POST['username'];
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
    $update_query .= "username = '{$the_username}', ";
    $update_query .= "user_password = '{$user_password}', ";
    $update_query .= "user_firstname = '{$user_firstname}', ";
    $update_query .= "user_lastname = '{$user_lastname}', ";
    $update_query .= "email = '{$email}', ";
    $update_query .= "user_image = '{$user_image}', ";
    $update_query .= "role = '{$role}' ";
    //$update_query .= "randSalt = '{$randSalt}' ";
    $update_query .= "WHERE username = '{$username}'";

    $update_user = mysqli_query($connection, $update_query);

    ConfirmQuery($update_user);

    // set to session username to new username
    $_SESSION['username'] = $the_username;

    header("Location: profile.php");
}
?>

<!-- wrapper -->
<div id="wrapper">

    <!-- Top Navigation Bar -->
    <?php include "includes/admin_top_navigation.php"; ?>

    <!-- side Navigation Bar -->
    <?php include "includes/admin_side_navigation.php"; ?>

    <!-- page-wrapper -->
    <div id="page-wrapper">

        <!-- /container-fluid -->
        <div class="container-fluid">

            <!-- row -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Profile
                        <small>
                            <?php 
                            echo $_SESSION['username'];
                            ?>
                        </small>
                    </h1>

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

                        <input type="submit" name="update_profile" value="Update Profile" class="btn btn-primary">

                    </form>
                    <?php

                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Footer -->
<?php include "includes/admin_footer.php"; ?>