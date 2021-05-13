<?php

include("../connect.php");
include("../functions.php");

switch ($_POST['db']) {
    case 'artists':
        $albums = GetFromDB($conn, "SELECT * from `albums` where `artistid` = ".$_POST['id']);
        foreach ($albums as $album) {
            $query = "DELETE from `songs` where `albumid` = ".$album[0];
            echo $query."<br>";
            mysqli_query($conn, $query);
        }
        echo "<br><br><br>";

        $query = "DELETE from `albums` where `artistid` = ".$_POST['id'];
        echo $query."<br>";
        mysqli_query($conn, $query);

        $query = "DELETE FROM `artists` WHERE `id` = ".$_POST['id'];
        echo $query."<br>";
        mysqli_query($conn, $query);
        break;

    case 'albums':
        $query = "DELETE FROM `songs` WHERE `albumid` = ".$_POST['id'];
        mysqli_query($conn, $query);

        $query = "DELETE FROM `albums` WHERE `id` = ".$_POST['id'];
        mysqli_query($conn, $query);

        echo $_POST['id'];

        break;

    case 'songs':
        
        $query = "DELETE FROM `songs` where `id` = ".$_POST['id'];
        mysqli_query($conn, $query);

        break;
}

header("Location: ../../admin.php");