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

if(!isset($_POST['name'])) header("Location: ../../admin.php");

if(isset($_FILES)){
    $name_file = $_FILES['picture']['name'];
    $tmp_name = $_FILES['picture']['tmp_name'];
}

include("../connect.php");

$query = "INSERT INTO `artists`(`id`, `name`, `picture`, `description`) VALUES 
(NULL, "."'".$_POST['name']."'".","."'".$name_file."'".","."'".$_POST['description']."')";

move_uploaded_file($tmp_name, "../../images/artists/".$name_file);
mysqli_query($conn, $query);

header("Location: ../../admin.php");