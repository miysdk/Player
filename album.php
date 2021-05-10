<?php
include("php/connect.php");
include("php/functions.php");
include("php/header.php");
include("php/player.php");

$data = GetFromDB($conn, "SELECT * from `albums` where `id` = ".$_GET['id']);
$artist = GetFromDB($conn, "SELECT * from `artists` where `id` = ".$data[0][3]);
$songs = GetFromDB($conn, "SELECT * from `songs` where `albumid` = ".$data[0][0]);
$type = GetFromDB($conn, "SELECT * from `albumtypes` where `id` = ".$data[0][6])
?>

<script>

    var album = [];
    var playlist = [];
    var playingid = null;

</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data[0][1] ?></title>
    <link rel="stylesheet" href="css/album.css">
    <link rel="stylesheet" href="css/scrollbar.css">
</head>
<body>
    <div class="content">
        <div class="album">
            <?php echo '<img src="images/albums/'.$data[0][2].'" alt="" class="album__cover">';?>
            <div class="album__info">
                <div class="album__title"><?php echo $data[0][1] ?></div>
                <div class="album__data"><?php echo $type[0][1].' • <a href="artist.php?id='.$artist[0][0].'">'.$artist[0][1].'</a> • '.$data[0][4] ?></div>
                <div class="album__description"><?php echo $data[0][5] ?></div>
            <!-- INFO -->
            </div>
            
        <!-- ALBUM -->
        </div>
        <div class="content">
            <div class="album__actions">
                <button style="margin-right:15px" class="button button__filled" onclick="AddSongsToQueue(album)">▶ PLAY</button>
                <button class="button button__hollow" onclick="AddSongsToQueue(album)">ADD TO LIBRARY</button>
            </div>
        </div>

        <div class="songlist">
            <?php
            for ($i=0; $i < count($songs); $i++) {
            // foreach ($songs as $song) {
                $songid = "'".$songs[$i][0]."'";
                echo '
                <div class="song" onclick="AddToPlaylist(['."'".$songs[$i][3]."'".','."'".$songs[$i][1]."'".','."'".$artist[0][1]."'".','."'".$data[0][1]."'".']); playingid='.$i.'; Playlist('.$i.');">
                    <div class="song__info">
                        <div class="song__number">'.$songs[$i][2].'</div>
                        <div class="song__title">'.$songs[$i][1].'</div>
                    </div>
                    <div class="song__time">
                        00:00
                    </div>
                </div>
                <script>
                    album.push(["'.$songs[$i][3].'","'.$songs[$i][1].'","'.$artist[0][1].'","'.$data[0][1].'"]);
                </script>';
            }
            ?>
            
    <!-- CONTENT -->
    </div>
</body>
</html>