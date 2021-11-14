<?php 
include "db.php";

session_start();

if(isset($_POST['login'])) {
    // get username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ensure no sq present
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    // get all users with this username
    $query = "SELECT * FROM users WHERE username = '{$username}'";

    // query database
    $select_user_query = mysqli_query($connection, $query);

    // check a result has been returned
    if(!$select_user_query) {
        die("LOGIN SELECT_USER QUERY FAILED " . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_user_query)) {
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        // $db_user_email = $row['email'];
        $db_user_role = $row['role'];
    }
    
    // if username and password does not match values in database return to home
    if ($username !== $db_username && $password !== $db_user_password) {
        header("Location: ../index.php");
    } elseif ($username === $db_username && $password === $db_user_password) {
        // assign sessions
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        // $_SESSION['email'] = $db_user_email;
        $_SESSION['user_role'] = $db_user_role;

        header("Location: ../admin/index.php");
    } else {
        header("Location: ../index.php");
    }
}

?>