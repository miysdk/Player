<?php

include("../connect.php");

if(isset($_FILES)){
$name_file = $_FILES['picture']['name'];
$tmp_name = $_FILES['picture']['tmp_name'];
}

switch ($_POST['db']) {
    case 'artists':
        $query = "INSERT INTO `artists`(`id`, `name`, `picture`, `description`) VALUES 
        (NULL, "."'".$_POST['name']."'".","."'".$name_file."'".","."'".$_POST['description']."')";

        move_uploaded_file($tmp_name, "../../images/artists/".$name_file);
        mysqli_query($conn, $query);
        break;

    case 'albums':
        $query = "INSERT INTO `albums`(`id`, `name`, `cover`, `artistid`, `releasedate`, `description`, `typeid`) VALUES 
        (NULL,"."'".$_POST["name"]."',"."'".$name_file."',"."'".$_POST["artistid"]."',"."'".$_POST["releasedate"]."',"."'".$_POST["description"]."',"."'".$_POST["typeid"]."')";

        move_uploaded_file($tmp_name, "../../images/albums/".$name_file);
        mysqli_query($conn, $query);
        break;
}

header("Location:../../admin.php");
