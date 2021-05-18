<?php

if(isset($_FILES)){
    $name_file = $_FILES['song']['name'];
    $tmp_name = $_FILES['song']['tmp_name'];
}

include("../connect.php");

$query = "INSERT into `songs` (`id`, `name`, `number`, `song`, `albumid`) values (NULL, ";
$query = $query."'".$_POST['name']."', 0, ";
$query = $query."'".$name_file."', ";
$query = $query."'".$_POST['albumid']."')";

move_uploaded_file($tmp_name, "../../audio/".$name_file);
mysqli_query($conn, $query);

echo $query;

// echo '<script>window.history.back();</script>';