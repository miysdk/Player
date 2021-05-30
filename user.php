<?php

session_start();
include("php/connect.php");
include("php/functions.php");

$user_data = checkLogin($conn);
if(!isset($user_data['nickname'])) 
{
    header("Location: index.php");
    die();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user_data['nickname'] ?></title>
    <link rel="stylesheet" href="css/scrollbar.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php include("php/header.php") ?>
<body style="padding-top: 0 !important;">
    <div class="overlay" style="z-index: -10000;">
        <div class="ovui">
            <div>
            <h2>Hello, <?php echo $user_data['nickname'] ?></h2><br>
            <?php if ($user_data['roleid'] == 2) echo '<a href="admin.php" class="button button__filled">Go to admin page</a><br><br>';?>
            <a href="logout.php" class="button button__hollow">Log Out</a>
        </div>
    </div>
</body>
</html>