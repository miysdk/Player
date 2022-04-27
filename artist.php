<?php
include("php/connect.php");
include("php/functions.php");
include("html/header.html");

$data = GetFromDB($conn, "SELECT * from `artists` where `id` = ".$_GET['id']);
$albums = GetFromDB($conn, "SELECT * from `albums` where `artistid` = ".$_GET['id']." AND `typeid` = 1 OR `artistid` = ".$_GET['id']." AND `typeid` = 2");
$singles = GetFromDB($conn, "SELECT * from `albums` where `artistid` = ".$_GET['id']." AND `typeid` = 3");

?>
<body>
    <link rel="stylesheet" href="css/artist.css">
    <script>document.title = "<?php echo $data[0][1] ?>";</script>
    <script src="js/nav.js"></script>
    <img class="artistbg" src="images/artists/<?php echo $data[0][2]?>">
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