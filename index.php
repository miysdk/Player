<?php 

session_start();
include("php/connect.php");
include("php/functions.php");

$user_data = checkLogin($conn);

$albums = GetFromDB($conn, "SELECT * FROM `albums` where `typeid` = 1 OR `typeid` = 2");
$singles = GetFromDB($conn, "SELECT * FROM `albums` where `typeid` = 3");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/scrollbar.css">
    <link rel="stylesheet" href="css/list.css">
</head>

<?php
include("php/header.php");
?>

<body>
    
    <div class="content">
        <div class="displayer">
            <div class="displayer__title">Artists</div>
            <div class="displayer__list">
            <?php

            $data = GetFromDB($conn, "SELECT * FROM `artists`");
            foreach ($data as $artist) {
                DisplayerElement("artist.php?id=".$artist[0], $artist[1], "images/artists/".$artist[2], "Artist");
            }

            ?>
            <!-- ELEMENTS -->
            </div>
        <!-- DISPLAYER -->
        </div>


        <div class="displayer">
            <div class="displayer__title">Albums</div>
            <div class="displayer__list">
            <?php

            
            foreach ($albums as $album) {
                $type = GetFromDB($conn, "SELECT * from `albumtypes` where `id` = ".$album[6]);
                $artist = GetFromDB($conn, "SELECT * FROM `artists` where `id` = ".$album[3]);
                DisplayerElement("album.php?id=".$album[0], $album[1], "images/albums/".$album[2], $type[0][1]." by <a href='artist.php?id=".$artist[0][0]."'>".$artist[0][1]."</a>");
            }

            ?>
            <!-- ELEMENTS -->
            </div>
        <!-- DISPLAYER -->
        </div>


        <div class="displayer">
            <div class="displayer__title">Singles</div>
            <div class="displayer__list">
            <?php

            
            foreach ($singles as $single) {
                $type = GetFromDB($conn, "SELECT * from `albumtypes` where `id` = ".$single[6]);
                $artist = GetFromDB($conn, "SELECT * FROM `artists` where `id` = ".$single[3]);
                DisplayerElement("album.php?id=".$single[0], $single[1], "images/albums/".$single[2], $type[0][1]." by ".$artist[0][1]);
            }

            ?>
            <!-- ELEMENTS -->
            </div>
        <!-- DISPLAYER -->
        </div>
    </div>
</body>
</html>