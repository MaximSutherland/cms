<?php

if (isset($_POST['create_user'])) {

    $username = $_POST['username'];
    $user_password = $_POST['password'];
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];;

    $role = $_POST['role'];
    
    $randSalt = "";

    move_uploaded_file($user_image_temp, "../images/$user_image");

    $insert_query = "INSERT INTO users(username, user_password, 
        user_firstname, user_lastname, email, user_image, role, 
        randSalt) ";

    $insert_query .= "VALUES('{$username}', '{$user_password}', 
        '{$user_firstname}', '{$user_lastname}', '{$email}', '{$user_image}', 
        '{$role}', '{$randSalt}')";

    $create_user = mysqli_query($connection, $insert_query);

    ConfirmQuery($create_user);

    echo "<h4>User Created: <a href='users.php'>View Users</a></h4>";
}

?>

<!-- create post form -->
<form action="" method="post" enctype="multipart/form-data">

    <!-- Username -->
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
    </div>

    <!-- User Password -->
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control">
    </div>

    <!-- User Firstname -->
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" class="form-control">
    </div>
    
    <!-- User Lastname -->
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" class="form-control">
    </div>

    <!-- User Email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    
    <!-- User Image -->
    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    
    <!-- User Role -->
    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control">
            <option value='Admin'>Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>
    </div>

    <input type="submit" name="create_user" value="Add user" class="btn btn-primary">

</form>