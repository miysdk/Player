<?php
include("php/connect.php");
include("php/functions.php");
include("html/header.html");
include("html/player.html");

$data = GetFromDB($conn, "SELECT * from `albums` where `id` = ".$_GET['id']);
$artist = GetFromDB($conn, "SELECT * from `artists` where `id` = ".$data[0][3]);
$songs = GetFromDB($conn, "SELECT * from `songs` where `albumid` = ".$data[0][0]);
$type = GetFromDB($conn, "SELECT * from `albumtypes` where `id` = ".$data[0][6]);
?>
<body>
    <link rel="stylesheet" href="css/album.css">
    <script>
        document.title = "<?php echo $data[0][1] ?>";
        let urls = new Array();
    </script>
    <script src="js/nav.js"></script>
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
                <button class="button button__filled" onclick="setById(0)">▶ PLAY</button>
                <button class="button button__hollow">ADD TO LIBRARY</button>
            </div>
        </div>
        <div class="songlist">
            <?php
            for ($i=0; $i < count($songs); $i++) {
                $songid = "'".$songs[$i][0]."'";
                echo '
                <script>urls.push("'.$songs[$i][3].'")</script>
                <input type="hidden" value="'.$songs[$i][3].'" class="songurl">
                <input type="hidden" value="'.$songs[$i][1].'" class="songname">
                <input type="hidden" value="<a href=artist.php?id='.$artist[0][0].'>'.$artist[0][1].'</a> • <a href=album.php?id='.$data[0][0].'>'.$data[0][1].'</a>" class="songartist">
                <div class="song" onclick="setById('.$i.');">
                    <div class="song__info">
                        <div class="song__number">'.$songs[$i][2].'</div>
                        <div class="song__title">'.$songs[$i][1].'</div>
                    </div>
                    <div class="song__time" id="time'.$i.'">
                        00:00
                    </div>
                </div>';
            }
            ?>
            <script>
                for (let index = 0; index < urls.length; index++) {
                    let tmpa = new Audio();
                    tmpa.src = 'audio/'+urls[index];
                    tmpa.addEventListener('loadedmetadata', function(){
                        tsec = tmpa.duration%60;
                        tmin = tmpa.duration/60%60 - tsec/60;
                        document.getElementById('time'+index).innerHTML = Math.round(tmin)+":"+Math.round(tsec);
                    },false);
                }
            </script>
    <!-- CONTENT -->
    </div>
</body>