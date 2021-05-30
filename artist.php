<?php

session_start();
include("php/connect.php");
include("php/functions.php");

$user_data = checkLogin($conn);
include("php/header.php");

$data = GetFromDB($conn, "SELECT * from `artists` where `id` = ".$_GET['id']);
$albums = GetFromDB($conn, "SELECT * from `albums` where `artistid` = ".$_GET['id']." AND `typeid` = 1 OR `artistid` = ".$_GET['id']." AND `typeid` = 2");
$singles = GetFromDB($conn, "SELECT * from `albums` where `artistid` = ".$_GET['id']." AND `typeid` = 3");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data[0][1] ?></title>
    <link rel="stylesheet" href="css/scrollbar.css">
    <link rel="stylesheet" href="css/artist.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php echo '<img class="artistbg" src="images/artists/'.$data[0][2].'" alt="">' ?>
    <div class="artistbg__gradient"></div>
    <div class="content">
        <div class="artist">
        <div class="artist__info">
            <div class="artist__title"><?php echo $data[0][1] ?></div>
            <div class="artist__description"><?php echo $data[0][3] ?></div>
        </div>

        <div class="displayer">
            
            <?php

            if(count($albums) > 0)
            {
                echo '<div class="displayer__title">Albums</div>
                <div class="displayer__list">';

                foreach ($albums as $album) {
                    $type = GetFromDB($conn, "SELECT * from `albumtypes` where `id` = ".$album[6]);
                    $artist = GetFromDB($conn, "SELECT * FROM `artists` where `id` = ".$album[3]);
                    DisplayerElement("album.php?id='".$album[0]."'", $album[1], "images/albums/".$album[2], $type[0][1]);
                }

                echo '<!-- ELEMENTS -->
                </div>';
            }

            if(count($singles) > 0)
            {
                echo '<div class="displayer__title">Singles</div>
                <div class="displayer__list">';

                foreach ($singles as $album) {
                    $type = GetFromDB($conn, "SELECT * from `albumtypes` where `id` = ".$album[6]);
                    $artist = GetFromDB($conn, "SELECT * FROM `artists` where `id` = ".$album[3]);
                    DisplayerElement("album.php?id='".$album[0]."'", $album[1], "images/albums/".$album[2], $type[0][1]);
                }

                echo '<!-- ELEMENTS -->
                </div>';
            }
            ?>
        <!-- DISPLAYER -->
        </div>
        </div>
    </div>
</body>
</html>