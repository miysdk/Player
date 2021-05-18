<?php

if(!isset($_POST['name'])) header("Location: ../../admin.php");

if(isset($_FILES)){
    $name_file = $_FILES['picture']['name'];
    $tmp_name = $_FILES['picture']['tmp_name'];
}

include("../connect.php");

$query = "INSERT INTO `albums`(`id`, `name`, `cover`, `artistid`, `releasedate`, `description`, `typeid`) VALUES (NULL, ";
$query = $query."'".$_POST['name']."', ";
$query = $query."'".$name_file."', ";
$query = $query."'".$_POST['artistid']."', ";
$query = $query."'".$_POST['released']."', ";
$query = $query."'".$_POST['description']."', ";
$query = $query."'".$_POST['typeid']."')";

move_uploaded_file($tmp_name, "../../images/artists/".$name_file);
mysqli_query($conn, $query);

echo $query;
var_dump($_POST);


header("Location: ../../admin.php");