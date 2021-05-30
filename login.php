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
        $query = "select * from users where nickname = '$username' limit 1";

        $result = mysqli_query($conn, $query);
        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password)
                {
                    $_SESSION['userid'] = $user_data['userid'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo "<script type='text/javascript'>alert('Wrong username or password!');</script>";
    }
    else
    {
        echo "<script type='text/javascript'>alert('Wrong username or password!');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/scrollbar.css">
    <?php  include("php/header.php"); ?>
</head>
<body style="padding-top: 0 !important;">
    <div class="overlay" style="z-index: -1000;">
        <div class="ovui">
            <form action="login.php" method="post" style="display: flex !important; justify-content: center !important; align-items:center !important; flex-flow:column !important;">
                <h2>LogIn</h2><br>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" require><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" require><br>
                <input class="button button__filled" type="submit" value="LogIn"><br>
                <p>Don't have an account? <a href="register.php">Register!</a></p>
            </form>
        </div>
    </div>
</body>
</html>