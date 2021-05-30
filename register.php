<?php

session_start();
include("php/connect.php");
include("php/functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password))
    {
        $userid = random_num(20);
        $query = "INSERT into `users` (`userid`, `nickname`, `password`) values ('$userid', '$username', '$password')";
        echo $query;
        mysqli_query($conn, $query);
        header("Location: login.php");
        die;
    }
    else
    {
        echo "Error username or password";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/scrollbar.css">
    <?php  include("php/header.php"); ?>
</head>
<body style="padding-top: 0 !important;">
    <div class="overlay" style="z-index: -1000;">
        <div class="ovui">
            <form action="register.php" method="post" style="display: flex !important; justify-content: center !important; align-items:center !important; flex-flow:column !important;">
                <h2>Register</h2><br>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" require><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" require><br>
                <input class="button button__filled" type="submit" value="Register"><br>
                <p>Already have an account? <a href="login.php">Log In!</a></p>
            </form>
        </div>
    </div>
</body>
</html>