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

if (!isset($_POST['id'])) header("Location: ../../admin.php");

include("../connect.php");

$query = "DELETE from `artists` where `id` = ".$_POST['id'];
mysqli_query($conn, $query);

header("Location: ../../admin.php");