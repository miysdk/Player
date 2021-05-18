<?php

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