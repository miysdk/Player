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

$query = 'UPDATE `songs` SET `name` = "'.$_POST['name'].'", `song` = "'.$_POST['song'].'" WHERE `id` = '.$_POST['id'];
mysqli_query($conn, $query);


echo "<script>window.close();</script>";
die();