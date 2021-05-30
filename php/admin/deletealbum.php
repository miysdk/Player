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

$query = "DELETE from `songs` where `albumid` = ".$_POST['id'];
mysqli_query($conn, $query);

$query = "DELETE from `albums` where `id` = ".$_POST['id'];
mysqli_query($conn, $query);

header("Location: ../../admin.php");
die();