<?php

session_start();
include("php/connect.php");
include("php/functions.php");
include("html/player.html");
include("html/header.html");



if(isset($_POST['searchinput'])){
    $input = $_POST['searchinput'];
    $artists = GetFromDB($conn, "SELECT * from `artists`");
    $albums = GetFromDB($conn, "SELECT * from `albums`");
    $songs = GetFromDB($conn, "SELECT * from `songs`");

    $artistmatch = [];
    foreach ($artists as $item) {
        if (strpos(strtolower($item[1]), strtolower($input)) !== false) array_push($artistmatch, $item);
    }

    $albummatch = [];
    foreach ($albums as $item) {
        if (strpos(strtolower($item[1]), strtolower($input)) !== false) array_push($albummatch, $item);
    }

    $songmatch = [];
    foreach ($songs as $item) {
        if (strpos(strtolower($item[1]), strtolower($input)) !== false) array_push($songmatch, $item);
    }
}


?>

<body>
    <script src="js/player.js"></script>
    <script>document.title = "Search";</script>
    <script src="js/nav.js"></script>
    s
    <form action="searchpage.php" method="POST">
        <div style="display: flex; justify-content:center;"><input style="width: 50%;" type="text" name="searchinput" placeholder="Search..."><br><br><br></div>
        <!-- <input type="submit" value="Go"> -->
    </form>

    <div class="content">
    <?php
    if(isset($input)){
        if(count($artistmatch) != 0){
        echo '<div class="displayer">
        
            <div class="displayer__title">Artists</div>
            <div class="displayer__list">';
            
            
            
            foreach ($artistmatch as $match) {
                DisplayerElement("artist.php?id=".$match[0], $match[1], "images/artists/".$match[2], "Artist");
            }
            
            
            
            echo '</div>

        </div>';
        }

        if(count($albummatch) != 0){
            echo '<div class="displayer">
            
                <div class="displayer__title">Albums and Singles</div>
                <div class="displayer__list">';
                
                
                
                foreach ($albummatch as $match) {
                    DisplayerElement("artist.php?id=".$match[0], $match[1], "images/albums/".$match[2], "Album");
                }
                
                
                
                echo '</div>
    
            </div>';
        }

        if(count($songmatch) != 0){
            echo '<div class="displayer">
            
                <div class="displayer__title">Songs</div>
                <div class="displayer__list">';
                
                
                
                foreach ($songmatch as $match) {
                    $album = GetFromDB($conn, "SELECT * from `albums` where `id` = ".$match[4]);
                    $div = '<div onclick="setFromUrl(';
                    $div = $div."'".$match[3]."', ";
                    $div = $div."'".$match[1]."', ";
                    $div = $div."'')";
                    $div = $div.'">';
                    echo $div;
                   
                    echo '<div class="displayer__element">
                        <img src="images/albums/'.$album[0][2].'" alt="" class="element__cover">
                        <div class="element__title">'.$match[1].'</div>
                        <div class="element__subtitle">Song</div>
                    </div>';
                    echo '</div>';
                }
                
                
                
                echo '</div>
    
            </div>';
        }

        if(count($artistmatch) == 0 && count($albummatch) == 0 && count($songmatch) == 0){
            echo '<h3 style="text-align:center;">No matches was found, try another search requesr</h3>';
        }
    } else echo '<h3 style="text-align:center;">Type somthing in search bar...</h3>';
    ?>
    </div>
</body>