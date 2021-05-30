<?php

session_start();
include("../connect.php");
include("../functions.php");

$user_data = checkLogin($conn);
if($user_data['roleid'] != 2) 
{
    header("Location: ../../index.php");
    die();
}

include("../connect.php");

$querry = "DELETE from `songs` where `id` = ".$_POST['id'];
mysqli_query($conn, $querry);

echo '<script>window.history.back();</script>';